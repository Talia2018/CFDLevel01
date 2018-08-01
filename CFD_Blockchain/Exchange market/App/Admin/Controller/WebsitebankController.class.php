<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-3-8
 * Time: 下午12:28
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;

class WebsitebankController extends AdminController {
    public function _initialize(){
        parent::_initialize();
    }
    /**
     * 会员列表
     */
    public function index(){
       
      	//$where['status'] = 1;
      	$where=array();
        $Website_bank = M('Website_bank');
        $count      = $Website_bank->where($where)->count();// 查询满足要求的总记录数
        $Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Website_bank
            ->where($where)
            ->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    /**
     * 添加银行卡
     */
    public function addBank(){
        if(IS_POST){
        	
            $Website_bank= D('Website_bank');
          
            if($r = $Website_bank->create()){
            	
                if($Website_bank->add($r)){
                    $this->success('Added successfully',U('Websitebank/index'));
                    return;
                }else{
                    $this->error('The server is busy, please try again later');
                    return;
                }
            }else{
                $this->error($Website_bank->getError());
                return;
            }
        }else{
            $this->display();
        }
    }
    
    /**
     * 修改银行卡
     */
    public function saveBank(){
        $bank_id = I('get.bank_id','','intval');
        $Website_bank = D('Website_bank');
        if(IS_POST){
            $bank_id = I('post.bank_id','','intval');
            $where['bank_id'] = $bank_id;
            
            if($r = $Website_bank->create()){
            	 
            	if($Website_bank->save($r)){
            		$this->success('Successfully modified',U('Websitebank/index'));
            		return;
            	}else{
            		$this->error('The server is busy, please try again later');
            		return;
            	}
            }else{
            	$this->error($Website_bank->getError());
            	return;
            }
        }else{
            if($bank_id){
                $where['bank_id'] = $bank_id;
                $list = $Website_bank->where($where)->find();
                $this->assign('list',$list);
                $this->display();
            }else{
                $this->error('Parameter error');
                return;
            }
        }
    }
    /**
     * 删除银行卡
     */
    public function delBank(){
    	
    	if(empty($_POST['bank_id'])){
    		$info['status'] = -1;
    		$info['info'] ='Incorrect parameters passed in';
    		$this->ajaxReturn($info);
    	}
    	
        $bank_id = I('post.bank_id','','intval');
        $r = M('Website_bank')->delete($bank_id);

        if(!$r){
          	$info['status'] = 0;
        	$info['info'] ='Failed to delete';
        	$this->ajaxReturn($info);
        }
        
        $info['status'] = 1;
        $info['info'] ='Successfully deleted';
        $this->ajaxReturn($info);
    }

    
}