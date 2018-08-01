<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-3-8
 * Time: 下午2:23
 */

namespace Admin\Model;
use Think\Model;

class MessageModel extends Model{

    protected $_validate = array(
//        array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array('title','require','The title can not be blank',1,'',1),
        array('type','require','Type cannot be empty',1,'',1),
        array('content','require','the content can not be blank',1,'',1),
    );
}