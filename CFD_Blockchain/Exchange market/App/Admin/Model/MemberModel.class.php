<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-3-8
 * Time: 下午2:23
 */

namespace Admin\Model;
use Think\Model;

class MemberModel extends Model{

    protected $_validate = array(
//        array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
//        array('agree','1','条款必须同意',1,'equal',1),//同意条款
        array('email','email','email format is incorrect',1,'',1), //验证邮箱
        array('pwd','require','Login password cannot be empty',1,'',1),
        array('pwd','checkPwd','Password format is incorrect',1,'function',1), //函数认证密码(同样要求)
        array('repwd','pwd','Confirm password is incorrect',1,'confirm',1), //二次密码是否一样


        array('pwdtrade','require','Transaction password cannot be empty',1,'',1),
        array('pwdtrade','checkPwd','Transaction password is incorrect',1,'function',1), // 函数认证支付密码(同样要求)
        array('repwdtrade','pwdtrade','Confirm Transaction password is incorrect',1,'confirm',1), // 二次密码是否一样

        //modify验证

        array('nick','require','Nickname should be filled',1,'',2),
        array('name','require','Do not leave blank for real name',1,'',2),
        array('idcard','require','ID card number must be filled in',1,'',2),
        array('phone','require','Mobile number must be filled in',1,'',2),
    );

    protected $_auto = array(
//       array(完成字段1,完成规则,[完成条件,附加规则]),
        array('pwd','md5',1,'function'), //加密登录密码
        array('pwdtrade','md5',1,'function'), // 加密支付密码
    );

    /**
     * 验证密码长度在6-20个字符之间
     * @param $pwd
     * @return bool
     */
    public function checkPwd($pwd){
        $pattern="/^[\\w-\\.]{6,20}$/";
        if(preg_match($pattern, $pwd)){
            return true;
        }else{
            return false;
        }
    }

    public function logCheckEmail($email){
        $where['email'] = $email;
        $info = $this->where($where)->find();
        if($info){
            return $info;
        }else{
            return false;
        }
    }

    public function logCheckMo($mo){
        $where['phone'] = $mo;
        $info = $this->where($where)->find();
        if($info){
            return $info;
        }else{
            return false;
        }
    }

}