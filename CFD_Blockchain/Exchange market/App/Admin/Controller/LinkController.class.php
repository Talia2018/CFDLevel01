<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class LinkController extends AdminController{
	//空操作
	public function _empty(){
		header("HTTP/1.0 404 Not Found");
		$this->display('Public:404');
	}
	public function index(){
		$Link = M('Link'); // 实例化User对象
		$count      = $Link->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Link->order('add_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}
	public function add(){
		$id=I('id');
		if(!empty($id)){
			$list=M("Link")->where("id='$id'")->find();
			$this->assign("list",$list);
		}
		$this->display();
	}
	public function add_link(){
		
		if(empty($_POST['name'])){
			$this->error("Please enter a link name");
		}
		if(empty($_POST['url'])){
			$this->error("Please enter the link address");
		}
		if(!isset($_POST['status'])){
			$this->error("Please select link status");
		}
		$id=I('id');
		
		$data['name']=I('name');
		$data['url']=I('url');
		$data['status']=I('status');
		$data['add_time']=time();
		if(empty($id)){
			$re=M("Link")->add($data);
		}else{
			$re=M("Link")->where("id='$id'")->save($data);
		}
		if($re){
			$this->success("Added successfully",U('Link/index'));
		}else{
			$this->error("Add failed");
		}
		
	}
	
	public function del(){
		$id=I('id');
		if(empty($id)){
			$this->error("Invalid parameter, cannot be deleted");
		}
		$re=M("Link")->where("id='$id'")->delete();
		if($re){
			$this->success("successfully deleted",U("Link/index"));
		}else{
			$this->error("Failed to delete");
		}
	}
}    