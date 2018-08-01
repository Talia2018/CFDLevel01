<?php

namespace Admin\Controller;

use Admin\Controller\AdminController;
use Think\Controller;

/**
 * 修改配置文件类
 */
class FileconfigoperationController extends AdminController {
	public function _initialize() {
		parent::_initialize ();
	}
	public function _empty() {
		header ( "HTTP/1.0 404 Not Found" );
		$this->display ( 'Public:404' );
	}
	
	/**
	 * 展示修改界面
	 */
	public function saveDb() {
		$this->display ();
	}
	/**
	 * 修改表前缀并且修改MySql表前缀
	 */
	public function saveDbPrefix() {
		$this->success('This feature is not yet open...');
		return;
		if (empty ( $_POST ['DB_PREFIX'] )) {
			$this->error ( 'Please enter the modification table prefix' );
			return;
		}
		$r = $this->setDbPrefix ( $_POST ['DB_PREFIX'] );
		if ($r) {
			// 写入配置项
			$this->setConfigByFileName ( 'Common', 'db', array (
					'DB_PREFIX' => $_POST ['DB_PREFIX'] 
			) );
			$this->success ( 'Successfully modified' );
		} else {
			$this->error ( 'Server is busy, please try again later' );
		}
	}
	/**
	 * 修改配置项数据库密码(需手动修改数据库密码,这里只提供修改配置项)
	 */
	public function saveDbPwd() {
		if (empty ( $_POST ['DB_PWD'] )) {
			$this->error ( 'Please enter your password to change' );
			return;
		}
		$new_pwd = trim ( $_POST ['DB_PWD'] );
		$r = $this->setConfigByFileName ( 'Common', 'db', array (
				'DB_PWD' => $new_pwd 
		) );
		if ($r) {
			$this->success ( 'Modify the configuration item password successfully.' );
			return;
		} else {
			$this->error ( 'Failed to modify configuration item password' );
			return;
		}
	}
	/**
	 * 修改后台入口地址
	 */
	public function saveEntrance() {
		if (IS_POST) {
			if (empty ( $_POST ['URL_MODULE_MAP'] )) {
				$this->error ( 'Please enter the background entry path settings' );
				return;
			}
			$URL_MODULE_MAP = trim ( $_POST ['URL_MODULE_MAP'] );
			// 删除文件
			$r = $this->setConfigByFileName ( 'Common', 'adminEntrance', array (
					'URL_MODULE_MAP' => array (
							$URL_MODULE_MAP => 'admin' 
					) 
			) );
			if ($r) {
				$this->success ( 'Successfully modified', U ( 'Home/Index/index' ) );
				return;
			} else {
				$this->error ( 'fail to edit' );
				return;
			}
		} else {
			$this->display ();
		}
	}
	/**
	 * 修改配置的值
	 *
	 * @param [type] $fileName
	 *        	[ 配置文件名 ]
	 * @param [type] $arrData
	 *        	[ 保存的数值 数组 ]
	 * @param [type] $model
	 *        	[ 需要修改的模块 ]
	 */
	private function setConfigByFileName($model, $fileName, $arrData) {
		$model or $model = MODULE_NAME;
		$fileName or die ( 'No file name' );
		$savePath = str_replace ( 'Common', $model, CONF_PATH . $fileName . '.php' );
		if (file_exists ( $savePath )) {
			$return = require $savePath;
		}
		// 数据为空的时候,则读取文件信息
		if (empty ( $arrData )) {
			return $return;
		}
		$return = array_merge ( ( array ) $return, $arrData );
		$str = var_export ( $return, true );
		$str = '<?php return ' . $str . ';';
		return file_put_contents ( $savePath, $str );
	}
	/**
	 * 修改表前缀
	 * @param String $new_prefix 新的表前缀
	 * @return boolean 执行结果
	 */
	private function setDbPrefix($new_prefix) {
		// 设置好相关信息
		$dbserver = C ( 'DB_HOST' ); // 连接的服务器
		$dbname = C ( 'DB_NAME' ); // 数据库名
		$dbuser = C ( 'DB_USER' ); // 数据库用户名
		$dbpassword = C ( 'DB_PWD' ); // 数据库密码
		$old_prefix = C ( 'DB_PREFIX' ); // 数据库的前缀
		if (! is_string ( $dbname ) || ! is_string ( $old_prefix ) || ! is_string ( $new_prefix )) {
			return false;
		}
		if (! mysql_connect ( $dbserver, $dbuser, $dbpassword )) {
			print 'Could not connect to mysql';
			exit ();
		}
		// 取得数据库内所有的表名
		$result = mysql_list_tables ( $dbname );
		if (! $result) {
			print "DB Error, could not list tablesn";
			print 'MySQL Error: ' . mysql_error ();
			exit ();
		}
		// 把表名存进$data
		while ( $row = mysql_fetch_row ( $result ) ) {
			$data [] = $row [0];
		}
		// 过滤要修改前缀的表名
		foreach ( $data as $k => $v ) {
			$preg = preg_match ( "/^($old_prefix{1})([a-zA-Z0-9_-]+)/i", $v, $v1 );
			if ($preg) {
				$tab_name [$k] = $v1 [2];
				// $tab_name[$k] = str_replace($old_prefix, '', $v);
			}
		}
		if ($preg) {
			// echo '<pre>';
			// print_r($tab_name);
			// exit();
			// 批量重命名
			foreach ( $tab_name as $k => $v ) {
				$sql = 'RENAME TABLE `' . $old_prefix . $v . '` TO `' . $new_prefix . $v . '`';
				mysql_query ( $sql );
			}
			mysql_free_result ( $result );
			mysql_close ( $result );
			return true;
			// print "数据表前缀：" . $old_prefix . "<br>" . "已经修改为：" . $new_prefix . "<br>";
		} else {
			mysql_free_result ( $result );
			mysql_close ( $result );
			return false;
		}
	}
}