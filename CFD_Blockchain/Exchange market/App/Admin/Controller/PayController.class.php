<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
use Think\Page;

class PayController extends AdminController {
	//空操作
	public function _empty(){
		header("HTTP/1.0 404 Not Found");
		$this->display('Public:404');
	}
	
     //人工充值审核页面
    public function payByMan(){
    
    		$status=I('status');
    		$member_name=I('member_name');
    		if(!empty($status)||$status==="0"){
    			$where[C("DB_PREFIX")."pay.status"]=$status;
    		}
    		if(!empty($member_name)){
    			$where[C("DB_PREFIX")."pay.member_name"]=array('like',"%".$member_name."%");
    		}
    	$count =  M('Pay')->where($where)->count();// 查询满足要求的总记录数
    	$Page  = new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	//给分页传参数
    	setPageParameter($Page, array('status'=>$status,'member_name'=>$member_name));
    	
    	$show       = $Page->show();// 分页显示输出

    	$list= M('Pay')
    	->field(C("DB_PREFIX")."pay.*,".C("DB_PREFIX")."member.email")
    	->join("left join ".C("DB_PREFIX")."member on ".C("DB_PREFIX")."member.name=".C("DB_PREFIX")."pay.member_name")

    	->where($where)
    	->limit($Page->firstRow.','.$Page->listRows)
    	->order('add_time desc')
    	->select();
//     	echo M("Pay")->getLastSql();die;
    	foreach ($list as $k=>$v){
    		$list[$k]['status']=payStatus($v['status']);
    		$list[$k]['pay_reward']=$v['money']*$this->config['pay_reward']/100;
    	}
    	$this->assign('page',$show);
    	$this->assign('list',$list);
    	$this->assign('empty','no data');
     	$this->display();
     }
     //人工充值审核处理
     public function payUpdate(){
     	$pay=M('Pay');
     	$where['pay_id']=$_POST['pay_id'];
     	$list=$pay->where($where)->find();
     	if($list['status']!=0){
     		$data['status'] = -1;
     		$data['info'] = "Please do not repeat";
     		$this->ajaxReturn($data);
     	}
     	$member_id=M('Member')->where("member_id='".$list['member_id']."'")->find();
     	if($_POST['status']==1){
     		$pay->where($where)->setField('status',1);
     		if($list['money']>=$this->congif['pay_reward_limit']){
     			$list['count']=$list['count']+$list['money']*$this->config['pay_reward']/100;
     		}
     		//修改member表钱数
     		$rs=M('Member')->where("member_id='".$list['member_id']."'")->setInc('rmb',$list['count']);
     		//添加财务日志
     		$this->addFinance($member_id['member_id'],6,"Offline recharge".$list['count']."。",$list['count'],1,0);
     		//添加信息表
     		$this->addMessage_all($member_id['member_id'], -2, 'Manual recharge successfully ', 'The manual recharge you applied has been successful, the recharge amount is'.$xnb);
     	}elseif($_POST['status']==2){
     		$rs=$pay->where($where)->setField('status',2);
     		//添加信息表
      		$this->addMessage_all($member_id['member_id'], -2, 'Manual recharge review failed ', 'The manual recharge review you applied failed, please re-process');
     	}else{
     		$data['status'] = 0;
     		$data['info'] = "Incorrect operation";
     		$this->ajaxReturn($data);
     	}
     	if($rs){
     		$data['status'] = 1;
     		$data['info'] = "Successfully modified";
     		$this->ajaxReturn($data);
     	}else{
     		$data['status'] = 2;
     		$data['info'] = "Fail to edit";
     		$this->ajaxReturn($data);
     	}
     }
     /**
      * 添加Administrator recharge
      */
     public function admRecharge(){
     	if(IS_POST){
     		$admin=M("Admin")->where("admin_id='{$_SESSION['admin_userid']}'")->find();
     		if(empty($_POST['password'])){
     			$this->error("Please enter the administrator password");
     		}
     		if(md5($_POST['password'])!=$admin['password']){
     			$this->error("The administrator password you entered is incorrect.");
     		}
     		if(empty($_POST['member_id'])){
     			$this->error('Please enter the recharge staff');
     		}
     		if(!isset($_POST['currency_id'])){
     			$this->error('Please enter the currency');
     		}
     		if(empty($_POST['money'])){
     			$this->error('Please enter the recharge amount');
     		}
     		$data['member_id'] = I('member_id','','intval');
     		$member=M('Member')->where('member_id='.$data['member_id'])->find();
     		if(!$member){
     			$this->error('User does not exist');
     		}
     		$data['member_name'] = $member['name'];
     		$data['currency_id'] = I('currency_id','','intval');
     		$data['money'] = I('money');
     		$data['status'] = 1;
     		$data['add_time']  = time();
     		$data['type'] = 3;//Administrator recharge类型
     		M()->startTrans();//开启事务
     		$r[] = M('Pay')->add($data);
     		if($data['currency_id']==0){
     			$r[] = M('Member')->where(array('member_id'=>$data['member_id']))->setInc('rmb',$data['money']);
     		}else{
     			$r[] = M('Currency_user')->where(array('member_id'=>$data['member_id'],array('currency_id'=>$data['currency_id'])))->setInc('num',$data['money']);
     		}
     		$r[] = $this->addFinance($data['member_id'], 3, "Administrator recharge", $data['money'], 1, $data['currency_id']);
     		$r[] = $this->addMessage_all($data['member_id'], -2, "Administrator recharge", "Administrator recharge".getCurrencynameByCurrency($data['currency_id']).":".$data['money']);
     		if(!in_array(false,$r)){
     			M()->commit();
     			$this->success('Added successfully');
     			
     		}else{
     			M()->rollback();
     			$this->error('Add failed');
     		}
     	}else{
	     	$type_id=I('type_id');
			$email=I('email');
			$member_id=I('member_id');
			if(!empty($type_id)){
				$where['currency_id']=$type_id;
			}
			if(!empty($email)){
				$uid=M('Member')->where("email like '%{$email}%'")->find();
				$where["member_id"]=$uid['member_id'];
			}
	        if(!empty($member_id)){
	            $where["member_id"]=$member_id;
	        }
	        $where['type']=3;
     		$count =  M('pay')->where($where)->count();// 查询满足要求的总记录数
     		$Page  = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
     		//给分页传参数
     		setPageParameter($Page, array('type_id'=>$type_id,'email'=>$email,'member_id'=>$member_id));
     		
     		$show       = $Page->show();// 分页显示输出
     		
     		$list= M('Pay')->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('add_time desc')->select();
     		//筛选
     		$type=M('Currency')->select();
     		$this->assign('type',$type);
     		$this->assign('page',$show);
     		$this->assign('list',$list);
     		$this->display();
     	}
     }
	  /**
      * 导出excel文件
      */
     public function derivedExcel(){

     	//时间筛选
     	$add_time=I('get.add_time');
     	$end_time=I('get.end_time');
     	$add_time=empty($add_time)?0:strtotime($add_time);
     	$end_time=empty($end_time)?0:strtotime($end_time);

     	$where[C("DB_PREFIX").'pay.add_time'] = array('lt',$end_time);
     	$list= M('Pay')
    	->field(C("DB_PREFIX")."pay.pay_id,"
		.C("DB_PREFIX")."member.email,"
		.C("DB_PREFIX")."member.name,"
		.C("DB_PREFIX")."pay.account,"
		.C("DB_PREFIX")."pay.money,"
		.C("DB_PREFIX")."pay.status,"
		.C("DB_PREFIX")."pay.add_time")
    	->join("left join ".C("DB_PREFIX")."member on ".C("DB_PREFIX")."member.name=".C("DB_PREFIX")."pay.member_name")

    	->where($where)
    	->where(C("DB_PREFIX").'pay.add_time>'.$add_time)
    	->order('add_time desc')
    	->select();
//     	echo M("Pay")->getLastSql();die;
    	foreach ($list as $k=>$v){
    		$list[$k]['status']=payStatus($v['status']);
    		$list[$k]['add_time']=date('Y-m-d H:i:s',$list[$k]['add_time']);
    	}
     	$title = array(
              'order number',
              'Remittance account number',
              'Remittance',
              'Bank card number',
              'Recharge the amount of money',
              'actual money',
              'Status',
              'Time',
     	);
     	$filename= $this->config['name']."Manual recharge log-".date('Y-m-d',time());
     	$r = exportexcel($list,$title,$filename);
     }
	  //人工充值审核页面
    public function fill(){
     		$count =  M('Fill')->count();// 查询满足要求的总记录数
     		$Page  = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
     		$show       = $Page->show();// 分页显示输出
     		$list= M('Fill')->where()->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
     		$this->assign('page',$show);
     		$this->assign('list',$list);
     		$this->display();
     }
}