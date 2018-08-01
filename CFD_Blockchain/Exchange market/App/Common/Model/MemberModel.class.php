<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-3-8
 * Time: 下午2:23
 */

namespace Common\Model;
use Think\Model;

class MemberModel extends Model{

    protected $_validate = array(
//        array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array('agree', '1', 'Terms must agree', 1, 'equal', 1), / / ​​agree to the terms
        array('email', 'email', 'email format is incorrect', 1, '', 1), // verify mailbox
        array('pwd','require', 'The login password cannot be empty',1,'',1),
        array('pwd', 'checkPwd', 'password format is incorrect', 1, 'function', 1), // function authentication password (also required)
        array('repwd', 'pwd', 'confirm password is incorrect', 1, 'confirm', 1), // is the second password the same?


        array('pwdtrade','require', 'Transaction password cannot be empty',1,'',1),
        array('pwdtrade','checkPwd', 'transaction password is incorrect', 1, 'function', 1), // function authentication payment password (also required)
        array('repwdtrade', 'pwdtrade', 'Confirm that the transaction password is incorrect', 1, 'confirm', 1), // Is the secondary password the same?

        //modify verification

        array('nick','require', 'nickname cannot be empty',1,'',2),
        array('name','require', 'The real name cannot be empty',1,'',2),
        array('idcard','require', 'Identity number must be filled in ',1,'',2),
        array('mo','require','Mobile number must be filled in ',1,'',2),
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
        $pattern="/^[\\w-\\.]{6,16}$/";
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
        $where['mo'] = $mo;
        $info = $this->where($where)->find();
        if($info){
            return $info;
        }else{
            return false;
        }
    }

}