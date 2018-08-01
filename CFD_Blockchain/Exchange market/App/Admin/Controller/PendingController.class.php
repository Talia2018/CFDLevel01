<?php
/*
 * 后台审核withdraw
 */
namespace Admin\Controller;
use Admin\Controller\AdminController;
class PendingController extends AdminController {
	// 空操作
	public function _empty() {
		header ( "HTTP/1.0 404 Not Found" );
		$this->display ( 'Public:404' );
	}
	public function index() {
		$withdraw = M('withdraw');
		$bank = M ('bank');
		$cardname = I('get.cardname', '');
		$keyname = I('get.keyname', '');
		$status = I('get.status', '');

		$where = array();
		if (!empty($cardname))
			$where['b.cardname'] = array('LIKE', "%{$cardname}%");
		if (!empty($cardname))
			$where['b.cardname'] = array('LIKE', "%{$keyname}%");
		if (!empty($status))
			$where['w.status'] = $status;

		$count = $withdraw
						->table('__WITHDRAW__ w')
						->join('__BANK__ b ON w.bank_id=b.id', 'LEFT')
						->where($where)
						->count();
		$Page = new \Think\Page ($count, 20);
		// 分页显示输出
		$show = $Page->show(); 
		$info = $withdraw
					->table('__WITHDRAW__ w')
					->field('w.*,b.cardname,b.bank_branch,b.cardnum,b.bankname,ab.area_name barea_name,ab.parent_id,a.area_name aarea_name,m.nick,m.email')
					->join('__BANK__ b ON w.bank_id=b.id', 'LEFT')
					->join('__AREAS__ ab ON ab.area_id=b.address', 'LEFT')
					->join('__AREAS__ a ON a.area_id=ab.parent_id', 'LEFT')
					->join('__MEMBER__ m ON m.member_id=w.uid', 'LEFT')
					->where($where)
					->group('w.withdraw_id')
					->order('w.status desc,w.add_time desc')
					->limit($Page->firstRow . ',' . $Page->listRows)
					->select();


		$this->assign ( 'info', $info ); // 赋值数据集
		$this->assign ( 'page', $show ); // 赋值分页输出
		$this->assign ( 'inquire', $keyname );
		$this->display ();
	}

	/**
	 * 通过withdraw请求
	 * @param unknown $id
	 */
	public function successByid(){		
		$id = intval ( I ( 'post.id' ) );
			//判断是否$id为空
			if (empty ( $id ) ) {
				$datas['status'] = 3;
			    $datas['info'] = "Parameter error";
			    $this->ajaxReturn($datas);
			}
		//查询用户可用金额等信息
		$info = $this->getMoneyByid($id);
		if($info['status']!=3){
			$datas['status'] = -1;
			$datas['info'] = "Please do not repeat";
			$this->ajaxReturn($datas);
		}
		//通过状态为2
		$data ['status'] = 2;
		$data ['check_time'] = time();
		$data ['admin_uid'] =$_SESSION['admin_userid'];
		//更新数据库
		$re = M ( 'Withdraw' )->where ( "withdraw_id = '{$id}'" )->save ( $data );	
		$num= M ( 'Withdraw' )->where ( "withdraw_id = '{$id}'" )->find ();
		M('Member')->where("member_id={$num['uid']}")->setDec('forzen_rmb',$num['all_money']);	
		if($re == false){
			$datas['status'] = 0;
			$datas['info'] = "Withdrawal operation failed";
			$this->ajaxReturn($datas);
		}
		$this->addMessage_all($info['member_id'],-2,'Withdraw for success', "Congratulations on your withdrawal of {$info['all_money']}!");
		$this->addFinance($info['member_id'],23,"withdraw{$info['all_money']}",$info['all_money']-$info['withdraw_fee'],2,0);
		$datas['status'] = 1;
		$datas['info'] = "Withdraw, the operation is successful";
		$this->ajaxReturn($datas);
	}

	/**
	 * 不通过withdraw请求
	 * @param unknown $id
	 */
	public function falseByid(){
		$id = intval ( I ( 'post.id' ) );
			//判断是否$id为空
			if (empty ( $id ) ) {
				$this->error ( "Parameter error" );
				return;
			}
		//查询用户可用金额等信息
		$info = $this->getMoneyByid($id);
		if($info['status']!=3){
			$datas['status'] = -1;
			$datas['info'] = "Please do not repeat";
			$this->ajaxReturn($datas);
		}
		//将withdraw的钱加回可用金额
		$money['rmb'] = floatval($info['rmb']) + floatval($info['all_money']);
		//将冻结的钱减掉
		$money['forzen_rmb'] = floatval($info['forzen_rmb']) - floatval($info['all_money']);
		
		//不通过状态为1
		$data ['status'] = 1;
		$data ['check_time'] = time();
		$data ['admin_uid'] =$_SESSION['admin_userid'];
		//更新数据库,member修改金额
		$res = M( 'Member' )->where("member_id = {$info['member_id']}")->save($money);
		//withdraw修改状态
		$re = M ( 'Withdraw' )->where ( "withdraw_id = '{$id}'" )->save ( $data );
		if($res == false){
			$datas['status'] = 0;
			$datas['info'] = "Withdrawal does not pass, the operation fails.";
			$this->ajaxReturn($datas);
		}
		if($re == false){
			$datas['status'] = 2;
			$datas['info'] = "Withdrawal does not pass, the operation fails.";
			$this->ajaxReturn($datas);
		}
		$this->addMessage_all($info['member_id'],-2,'Withdraw failed','Sorry, your withdrawal failed, please re-operate or contact customer service!');
		$datas['status'] = 1;
		$datas['info'] = "The withdrawal does not pass and the operation is successful.";
		$this->ajaxReturn($datas);
	}
	
	/**
	 * 获取withdraw金额信息
	 * @param unknown $id
	 * @return boolean|unknown $rmb 会员号，可用金额，冻结金额，手续费，withdraw金额
	 */
	public function getMoneyByid($id){

		$field = C("DB_PREFIX")."member.member_id,".C("DB_PREFIX")."member.rmb,".C("DB_PREFIX")."member.forzen_rmb,".C("DB_PREFIX")."withdraw.status,".C("DB_PREFIX")."withdraw.all_money,".C("DB_PREFIX")."withdraw.withdraw_fee";
		$rmb = M('Withdraw')
				->field($field)
				->join(C("DB_PREFIX")."member ON ".C("DB_PREFIX")."withdraw.uid = ".C("DB_PREFIX")."member.member_id")
				->where("withdraw_id = '{$id}'")
				->find();
		if(empty($rmb)){
			return false;
		}
		return $rmb;
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
		$where[C("DB_PREFIX").'withdraw.add_time'] = array('lt',$end_time);
		$withdraw = M('withdraw');
		$list = $withdraw
		->table('__WITHDRAW__ w')
		->field('
				w.withdraw_id,
				b.cardname,
				w.uid,
				b.bankname,
				b.cardnum,
				a.area_name aarea_name,
				ab.area_name barea_name,
				b.bank_branch,
				w.all_money,
				w.withdraw_fee,
				w.money,
				w.order_num,
				w.add_time,
				w.status')
		->join('__BANK__ b ON w.bank_id=b.id', 'LEFT')
		->join('__AREAS__ ab ON ab.area_id=b.address', 'LEFT')
		->join('__AREAS__ a ON a.area_id=ab.parent_id', 'LEFT')
		->join('__MEMBER__ m ON m.member_id=w.uid', 'LEFT')
		->where('w.add_time >'.$add_time)
		->select();
		foreach ($list as $k=>$v){
			$list[$k]['status']=drawStatus($v['status']);
			$list[$k]['add_time']=date('Y-m-d H:i:s',$v['add_time']);
			$list[$k]['cardnum']='`'.$list[$k]['cardnum'].'`';
		}
		$title = array(
				'Id',
				'Withdraw person',
				'Member ID',
				'Bank',
				'Bank Account',
				'Bank opening place',
				'Bank opening place',
				'Opening branch',
				'withdraw amount',
				'Handling fee',
				'The actual amount',
				'order number',
				'Submission time',
				'Status',
		);
		$filename= $this->config['name']."Withdraw log-".date('Y-m-d',time());
		$r = exportexcel($list,$title,$filename);
	}
}
?>