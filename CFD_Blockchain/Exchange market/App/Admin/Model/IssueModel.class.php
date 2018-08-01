<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-3-8
 * Time: 下午2:23
 */

namespace Admin\Model;
use Think\Model;

class IssueModel extends Model{

    protected $_validate = array(
//        array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
//        array('agree','1','条款必须同意',1,'equal',1),//同意条款
    		
        array('title','require','Crowdfunding title cannot be empty'),
        array('num','require','Crowdfunding volume cannot be empty'),

        array('num_nosell','require','Crowdfunding reservation cannot be empty'),
    	array('deal','require','The crowdfunding surplus cannot be empty'),


        array('price','require','Crowdfunding price cannot be empty'),
        array('limit','require','Crowdfunding per person can not be empty'),
    		
    	array('remove_forzen_bili',array(0,100),'Unfreeze ratio must be within 100%',0,'between'),

        array('min_limit','require','Crowdfunding minimum purchase cannot be empty'),
        array('limit_count','require','Crowdfunding limit can not be empty'),

        array('zhongchou_success_bili','require','The crowdfunding success rate cannot be empty'),
    );

}