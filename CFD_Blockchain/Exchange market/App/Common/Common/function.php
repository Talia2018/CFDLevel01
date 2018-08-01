<?php
/**
 * Created by PhpStorm.
 * User: "姜鹏"
 * Date: 16-3-8
 * Time: 下午4:57
 */
/**
 * 格式化信息类型
 * @param $type 参数(信息类型的参数）
 * @return string 返回值 把数字类型的参数 转换成汉字类型
 *
 */
function message_format_type($type){
    switch($type){
        case 1:$name="";break;
    }
    return $name;
}


/**
 * 验证邮箱
 * @param $email
 * @return bool
 */
function checkEmail($email){
    $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
    if(preg_match($pattern, $email)){
        return true;
    }else{
        return false;
    }
}
/**
 * 验证手机号支持以下号段
 *      移动：134、135、136、137、138、139、150、151、152、157、158、159、182、183、184、187、188、178(4G)、147(上网卡)；
联通：130、131、132、155、156、185、186、176(4G)、145(上网卡)；
电信：133、153、180、181、189 、177(4G)；
卫星通信：1349
虚拟运营商：170
 * @param $mobile
 * @return bool
 */
function checkMobile($mobile) {
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
}

/**
 * 截取字符串
 * @param $str
 * @param int $start
 * @param $length
 * @param string $charset
 * @param bool $suffix
 * @return string
 */

function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){
    if(function_exists("mb_substr")){
        $slice= mb_substr($str, $start, $length, $charset);
    }elseif(function_exists('iconv_substr')) {
        $slice= iconv_substr($str,$start,$length,$charset);
    }else{
        $re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
        $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
        $re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
        $re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }
    $fix='';
    if(strlen($slice) < strlen($str)){
        $fix='';
    }
    return $suffix ? $slice.$fix : $slice;
}
//委托状态格式化
function enstrustStatus($num){
    switch ($num){
        case 0:$data="not sold";break;
        case 1:$data="partial deal";break;
        case 2:$data="has been sold";break;
        case 3:$data="has been revoked";break;
        case 4:$data="all";break;
        default:$data="nothing";
    }
    return $data;
}
//充值状态格式化
function payStatus($num){
    switch ($num){
        case 0:$data="Please pay";break;
        case 1:$data="successful refill";break;
        case 2:$data="recharge failed";break;
        case 3:$data="has expired";break;
        default:$data="nothing";
    }
    return $data;
}
//提现状态格式化
function drawStatus($num){
    switch ($num){
        case 0:$data="failed";break;
        case 1:$data="failed";break;
        case 2:$data="pass";break;
        case 3:$data="in review";break;
        default:$data="no data";
    }
    return $data;
}
//充值状态格式化
function zhongchouStatus($num){
    switch ($num){
        case 0:$data="New crowdfunding";break;
        case 1:$data="Crowdfunding begin";break;
        case 2:$data="Crowdfunding end";break;
        case 3:$data="Crowdfunding end";break;
        default:$data="no data";
    }
    return $data;
}

/**委托记录状态
 * @param $status  状态
 * @return string
 */
function getOrdersStatus($status){
    switch($status){
        case 0 : $data =  "Pending order";
            break;
        case 1 : $data =  "Partial deal";
            break;
        case 2 : $data =  "Deal";
            break;
        case -1 : $data =  "Cancelled";
            break;
        default: $data="unknown";
    }
    return $data;
}

/**委托记录type
 * @param $type
 * @return string
 */
function getOrdersType($type){
    switch($type){
        case "buy": $data="Buy";
            break;
        case "sell" : $data="Sell";
            break;
        default: $data="unknown";
    }
    return $data;
}

/**
 * 验证密码长度在6-20个字符之间
 * @param $pwd
 * @return bool
 */
function checkPwd($pwd){
    $pattern="/^[\\w-\\.]{6,20}$/";
    if(preg_match($pattern, $pwd)){
        return true;
    }else{
        return false;
    }
}


/**
 *  发送邮箱
 * @param String $emailHost 您的企业邮局域名
 * @param String $emailUserName 邮局用户名(请填写完整的email地址)
 * @param String $emailPassWord 邮局密码
 * @param String $formName 邮件发送者名称
 * @param String $email  收件人邮箱，收件人姓名
 * @param String $title	发送标题
 * @param String $body	发送内容
 * @return boolean
 */
function setPostEmail($emailHost,$emailUserName,$emailPassWord,$formName,$email,$title,$body) {
    // 以下内容为发送邮件
    require_once('class.phpmailer.php');//下载的文件必须放在该文件所在目录
    $mail=new PHPMailer();//建立邮件发送类
    $mail->IsSMTP();//使用SMTP方式发送 设置设置邮件的字符编码，若不指定，则为'UTF-8
    $mail->Host=$emailHost;//'smtp.qq.com';//您的企业邮局域名
    $mail->SMTPAuth=true;//启用SMTP验证功能   设置用户名和密码。
    $mail->Username=$emailUserName;//'mail@koumang.com'//邮局用户名(请填写完整的email地址)
//    $mail->Username='admin@shikeh.com';//邮局用户名(请填写完整的email地址)
//    $mail->Password='WWW15988999998com';//邮局密码
    $mail->Password=$emailPassWord;//'xiaowei7758258'//邮局密码
    $mail->From=$emailUserName;//'mail@koumang.com'//邮件发送者email地址
    $mail->FromName=$formName;//邮件发送者名称
    $mail->AddAddress($email);// 收件人邮箱，收件人姓名
    //$mail->AddBCC('chnsos@126.com',$_SESSION['clean']['name']);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
    $mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
    $mail->Subject="=?UTF-8?B?".base64_encode($title)."?=";
    $mail->Body=$body; //邮件内容
    $mail->AltBody = "This is an email in HTML format."; //附加信息，可以省略
    $mail->Send();
    return $mail->ErrorInfo;
}

/**
 * USDT格式化
 * @param $num
 * @return array|bool|string
 */
function num_format($num){
    if(!is_numeric($num)){
        return false;
    }
    $rvalue='';
    $num = explode('.',$num);//把整数和小数分开
    $rl = !isset($num['1']) ? '' : $num['1'];//小数部分的值
    $j = strlen($num[0]) % 3;//整数有多少位
    $sl = substr($num[0], 0, $j);//前面不满三位的数取出来
    $sr = substr($num[0], $j);//后面的满三位的数取出来
    $i = 0;
    while($i <= strlen($sr)){
        $rvalue = $rvalue.','.substr($sr, $i, 3);//三位三位取出再合并，按逗号隔开
        $i = $i + 3;
    }
    $rvalue = $sl.$rvalue;
    $rvalue = substr($rvalue,0,strlen($rvalue)-1);//去掉最后一个逗号
    $rvalue = explode(',',$rvalue);//分解成数组
    if($rvalue[0]==0){
        array_shift($rvalue);//如果第一个元素为0，删除第一个元素
    }
    $rv = $rvalue[0];//前面不满三位的数
    for($i = 1; $i < count($rvalue); $i++){
        $rv = $rv.','.$rvalue[$i];
    }
    if(!empty($rl)){
        $rvalue = $rv.'.'.$rl;//小数不为空，整数和小数合并
    }else{
        $rvalue = $rv;//小数为空，只有整数
    }
    return $rvalue;
}
//******************************
/**
 * 发送短信
*
* @param string $mobile 手机号码
* @param string $name 短信头
* @param string $user_name 短信账户
* @param string $user_password 短息密码
* @param string $needstatus 是否需要状态报告
* @param string $product 产品id，可选
* @param string $extno   扩展码，可选
*/
function sandPhone( $mobile, $name, $user_name, $user_password, $needstatus = 'true', $product = '', $extno = '') {
	$PORT=80;//端口号默认80
	$IP="222.73.117.156";
	$chuanglan_config['api_account']=iconv('UTF-8', 'UTF-8',$user_name);
	$chuanglan_config['api_password']=iconv('UTF-8', 'UTF-8', $user_password);
	$chuanglan_config['api_send_url']="http://".$IP.":".$PORT."/msg/HttpBatchSendSM";
	$code = rand(100000,999999);
	session(array('name'=>'code','expire'=>600));
	session('code',$code);  //设置session
	session('num',session('num')+1);  //设置session
	session('time',time());
	
	/*if (session('num')>3){	
			$arr[1]="121";
			return $arr;
 	}*/
	
	$data="Hello, your verification code is".$code;//要发送的短信内容
	$content=mb_convert_encoding("$data",'UTF-8', 'UTF-8');
	//创蓝接口参数
	$postArr = array (
			'account' => $chuanglan_config['api_account'],
			'pswd' => $chuanglan_config['api_password'],
			'msg' => $content,
			'mobile' => $mobile,
			'needstatus' => $needstatus,
			'product' => $product,
			'extno' => $extno
	);

	$result = curlPost( $chuanglan_config['api_send_url'] , $postArr);
	$result=execResult($result);
	return $result;
}

/**
 * 处理返回值
 *
 */
function execResult($result){
	$result=preg_split("/[,\r\n]/",$result);
	return $result;
}


/**
 * passCURL发送HTTP请求
 * @param string $url  //请求URL
 * @param array $postFields //请求参数
 * @return mixed
 */
function curlPost($url,$postFields){
	$postFields = http_build_query($postFields);
	$ch = curl_init ();
	curl_setopt ( $ch, CURLOPT_POST, 1 );
	curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $ch, CURLOPT_URL, $url );
	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $postFields );
	$result = curl_exec ( $ch );
	curl_close ( $ch );

	return $result;
}

function chuanglan_status($num){
	switch ($num){
		case 0;$name="Short message sent successfully";break;
        case 101;$name="no such user";break;
        case 102;$name="password error";break;
        case 103;$name="Submit too fast (submission speed exceeds flow rate limit)";break;
        case 104;$name="The system is busy (for the platform side reason, the submitted SMS can not be processed temporarily)";break;
        case 105;$name="sensitive SMS (sms containing sensitive words)";break;
        case 106;$name="message length error (>536 or <=0)";break;
        case 107;$name="contains the wrong mobile number";break;
        case 108;$name="The number of mobile phone numbers is wrong (group >50000 or <=0; single shot >200 or <=0)";break;
        case 109:$name="no send quota (the number of available SMS messages for this user has been used)";break;
        case 110:$name="not in the sending time";break;
        case 111:$name="Exceeded the account limit for the month of the account";break;
        case 112:$name="There is no such product, the user has not ordered the product";break;
        case 113:$name="extno format is wrong (not a number or the length is wrong)";break;
        case 115:$name="automatic review rejection";break;
        case 116:$name="Signature is not legal, without signature (user must be signed) ";break;
        case 117:$name="IP address authentication error, the IP address requested to be called is not the system registered IP address";break;
        case 118:$name="user does not have the corresponding send permission";break;
        case 119:$name="user has expired";break;
        case 120:$name="The content of the SMS is not in the whitelist";break;
        case 121:$name="You have exceeded the SMS delivery limit";break;
        default:$name="System error, please contact the administrator in time";break;
	}
	return $name;

}
//********************

/** 短信宝短信认证
 * @param $phone 电话号码
 * @param $name  发送标题
 * @param $user  短息接口用户名
 * @param $pass  短信接口密码
 * @return mixed 错误信息
 */
function sandPhone1 ($phone,$name,$user,$pass){
    $statusStr = array(
        "0" => "SMS is sent successfully",
        "-1" => "Parameter is not complete",
        "-2" => "Server space is not supported, please confirm support for curl or fsocket, contact your space provider to solve or replace space!",
        "30" => "Password error",
        "40" => "Account does not exist",
        "41" => "Insufficient balance",
        "42" => "Account has expired",
        "43" => "IP address limit",
        "50" => "Content contains sensitive words",
        "100"=> 'You are operating too often, please try again later',
        "101"=> 'You have exceeded the SMS delivery limit'
    );
    if (session('num')>3){
        return $statusStr['101'];
    }
    $smsapi = "http://api.smsbao.com/";
    $pass = md5($pass); //短信平台密码
    $time=session('time');
    if (time()-$time<180&&!empty($time)){
        return $statusStr['100'];
    }
    $code=rand(1000, 9999);
    session(array('name'=>'code','expire'=>600));
    session('code',$code);  //设置session
    session('num',session('num')+1);  //设置session
    session('time',time());
    $content="【".$name."】Your verification code is ".$code.", please don't leak it to others.";//要发送的短信内容
    $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
    $result =file_get_contents($sendurl) ;
//     dump($user);dump($pass);dump($phone);dump($content);die;
    return $statusStr[$result];
}
/**
 * 验证手机
 * @param $code
 * @return bool
 */
function checkPhoneCode($code){
    if (session('code')!=$code){
        return  false;
    }else {
        return true;
    }
}

/**
 * 随机数字英文字符
 * @param $param 长度
 * @return string 随机数
 */
function getRandom($param){
    $str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $key = "";
    for($i=0;$i<$param;$i++)
    {
        $key .= $str{mt_rand(0,32)};    //生成php随机数
    }
    return $key;
}
/**
 * 财务日志添加
 * @param unknown $member_id 用户id
 * @param unknown $type	   类型
 * @param unknown $content 说明
 * @param unknown $money	变动资金
 * @param unknown $money_type	支出=2/收入=1
 * @param unknown $currency_id	币种 默认为0 为USDT
 * @return boolean
 */
function  addFinanceLog($member_id,$type,$content,$money,$money_type,$currency_id=0){
	$finance=M('Finance');
	$data['money_type']=$money_type;//收入或者支出
	$data['member_id']=$member_id;//用户id
	$data['type']=$type;//类型
	$data['content']=$content;//变动说明
	$data['money']=$money;//变动资金数量
	$data['add_time']=time();//添加时间
	$data['currency_id']=$currency_id;//币种
	$data['ip']=get_client_ip();//ip
	$data['status']=0;
	$r=$finance->data($data)->add();
	if($r){
		return true;
	}else {
		return false;
	}
}
/**
 * 格式化Pending order记录status状态
 * @param unknown $status   状态
 * @return unknown
 */
 function formatOrdersStatus($status){
	switch($status){
		case 0: $status = 'No Deal' ;break;
		case 1: $status = 'Partial deal' ;break;
		case 2: $status = 'Deal' ;break;
		case -1: $status = 'Cancelled' ;break;
		default: $status = 'No Deal' ;break;
	}
	return  $status;
}
/**
 * 格式化用户名
 * @param unknown $currency_id   币种id
 * @return unknown
 */
 function getCurrencynameByCurrency($currency_id){
     if(isset($currency_id)){
     	if($currency_id==0){
             return "USDT";
         }
     	return  M('Currency')->field('currency_name')->where("currency_id='{$currency_id}'")->find()['currency_name'];
	}else{
         return "Unkonwn currency";
     }
}

/**
 * 格式化用户名
 * @param unknown $member_id
 */
 function getMemberNameByMemberid($member_id){
 	$where['member_id']= $member_id;
 	$list = M('Member')->field('name')->where($where)->find();
 	return !empty($list)?$list['name']:'no';
 }

function getMemberEmailByMember_id($member_id){
    $where['member_id']= $member_id;
    $list = M('Member')->field('email')->where($where)->find();
    return !empty($list)?$list['email']:'no';
}

//格式化Pending orderbuy单还是sell单
function fomatOrdersType($type){
    switch ($type){
        case 'buy':$type='buy';break;
        case 'sell':$type='sell';break;
        default:$type='no';
    }
    return $type;
}

//计算Sell比例
function setOrdersTradeNum($num,$trade_num){
   return 100-($trade_num/$num*100);
}

/**委托记录状态
 * @param $status  状态
 * @return string
 */
function formatMemberStatus($status){
    switch($status){
        case 0 : $status =  "Pending order";
            break;
        case 1 : $status =  "Partial deal";
            break;
        case 2 : $status =  "Deal";
            break;
        default: $status="unknown";
    }
    return $status;
}

/**
 * 根据众筹id号查找一共众筹次数
 * @param $id 用户ID
 * @return mixed 次数
 */
function getIssueMemberCountByIssueId($id){
    $re = M('Issue_log')->where("iid = '{$id}'")->count("DISTINCT uid");
    if($re){
        return $re;
    }else{
        return 0;
    }
}


/**
 *  给分页传参数
 * @param  mixed $Page 分页对象
 * @param array $parameter 传参数组
 */
function setPageParameter($Page,$parameter){
    foreach ($parameter as $k=> $v){
        if (isset($v)){
            $Page->parameter[$k]=$v;
        }
    }
}
/**
 * 获取用户状态
 * @param string $status 状态
 * @return boolean|string 状态
 */
function getMemberStatus($status){
	if(empty($status)){
		return false;
	}
	switch($status){
		case 0 : $status =  "No personal information";
		break;
		case 1 : $status =  "Normal";
		break;
		case 2 : $status =  "Disable";
		break;
		default: $status="unknown";
	}
	return $status;
}
       /**
 * 导出数据为excel表格
 * 
 * @param $data 一个二维数组,结构如同从数据库查出来的数组        	
 * @param $title excel的第一行标题,一个数组,如果为空则没有标题        	
 * @param $filename 下载的文件名
 *        	@examlpe
 *        	$stu = M ('User');
 *        	$arr = $stu -> select();
 *        	exportexcel($arr,array('id','账户','密码','昵称'),'文件名!');
 */
function exportexcel($data = array(), $title = array(), $filename = 'report') {
	header ( "Content-type:application/octet-stream" );
	header ( "Accept-Ranges:bytes" );
	header ( "Content-type:application/vnd.ms-excel" );
	header ( "Content-Disposition:attachment;filename=" . $filename . ".xls" );
	header ( "Pragma: no-cache" );
	header ( "Expires: 0" );
	// 导出xls 开始
	if (! empty ( $title )) {
		foreach ( $title as $k => $v ) {
			$title [$k] = iconv ( "UTF-8", "GB2312", $v );
		}
		$title = implode ( "\t", $title );
		echo "$title\n";
	}
	if (! empty ( $data )) {
		foreach ( $data as $key => $val ) {
			foreach ( $val as $ck => $cv ) {
				$data [$key] [$ck] = iconv ( "UTF-8", "GB2312", $cv );
			}
			$data [$key] = implode ( "\t", $data [$key] );
		}
		echo implode ( "\n", $data );
	}
}
 
/**
 * 检测sql
 * @param unknown $sql_str 语句
 * @return unknown 
 */
function inject_check($sql_str) {
	$check= eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
	if($check){
		return true;
	}else{
		return false;
	}
}

