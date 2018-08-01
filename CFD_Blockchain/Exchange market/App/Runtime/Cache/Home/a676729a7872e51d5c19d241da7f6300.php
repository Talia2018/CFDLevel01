<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<meta name="renderer" content="webkit">
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta property="wb:webmaster" content="8af72a3a7309f0ee">
    <title><?php if(!empty($article)): echo ($article["title"]); ?>-<?php endif; echo ((isset($config["title"]) && ($config["title"] !== ""))?($config["title"]):"虚拟币交易网站"); ?></title>
	<link rel="Shortcut Icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/base.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/subpage.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/user.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/coin.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/zcpc.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/iconfont/demo.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/iconfont/iconfont.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/jb_style.css">
    <script src="/Public/Home/js/hm.js">
    </script><script type="text/javascript" src="/Public/Home/js/jquery-1.js"></script>
    <script type="text/javascript" src="/Public/Home/js/downList.js"></script>


    <script type="text/javascript" src="/Public/js/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="/Public/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/js/bootstrap.min.js?v=3.4.0"></script>
    <script type="text/javascript" src="/Public/js/layer/layer.js"></script>
    <script src="/Public/js/jquery.validate.min.js"></script>
    <script src="/Public/js/messages_zh.min.js"></script>
    <script src="/Public/js/base.js"></script>

</head>
<body>
<!--<div class="clearfix phone_top" id="phone_top_div" style="display:none;">
	<div class="left">
		<p class="left phone_logo"><img src="/images/phone_logo01.png"/></p>
		<p class="left phone_title">第一数字货币众筹交易平台</p>
	</div>
	<a href="javascript:hidephone();" class="phone_x">X</a>
</div>-->
<!--top start-->
<div style="background:#f9f9f9; height:30px;">
    <div style="width:1000px; margin:0 auto;">
        <ul class="qqkf left" style="line-height:30px; color:#999;">
            <li class="phone"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($config['qq1']); ?>&site=qq&menu=yes" class="qq_qq"></a><?php echo ((isset($config["qq1"]) && ($config["qq1"] !== ""))?($config["qq1"]):"暂无"); ?></li>
            <li class="phone400"><?php echo ((isset($config["tel"]) && ($config["tel"] !== ""))?($config["tel"]):"暂无"); ?></li>
            <li class="phone_email"><a href="mailto:<?php echo ($config['email']); ?>"><?php echo ((isset($config["email"]) && ($config["email"] !== ""))?($config["email"]):"暂无"); ?></a></li>
            <li>&nbsp;&nbsp;工作日:9-19时 节假日:9-18时</li>
        </ul>
            <?php if(!empty($_SESSION['USER_KEY_ID'])): ?><div class="person right">
                    <a class="left myhome" href="<?php echo U('ModifyMember/modify');?>" style=" height:30px; line-height:30px; margin-right:5px;">
                        <?php echo ($username); ?> </a>
                        
                    <div style="display: none;" class="mywallet_list"><div class="clear"><ul class="balance_list"><h4>可用余额</h4><li><a href="javascript:void(0)"><em style="margin-top: 5px;" class="deal_list_pic_cny"></em><strong>人民币：</strong><span><?php echo ($member["rmb"]); ?></span></a></li></ul><ul class="freeze_list"><h4>委托冻结</h4><li><a href="javascript:void(0)"><em style="margin-top: 5px;" class="deal_list_pic_cny"></em><strong>人民币：</strong><span><?php echo ($member["forzen_rmb"]); ?></span></a></li></ul></div><div class="mywallet_btn_box"><a href="<?php echo U('User/pay');?>">充值</a><a href="<?php echo U('User/draw');?>">提现</a><a href="<?php echo U('User/index');?>">转入</a><a href="<?php echo U('User/index');?>">转出</a><a href="<?php echo U('Entrust/manage');?>">委托管理</a><a href="<?php echo U('Trade/myDeal');?>">成交查询</a></div></div>
                    <span class="left" style="height:30px; line-height:30px; color:#999; margin-right:5px;">(UID: <?php echo (session('USER_KEY_ID')); ?> )</span>
                    <a class="left" href="<?php echo U('Login/loginOut');?>" style="height:30px; line-height:30px; margin:0 5px;">退出</a>
                    <div id="my" class="account left" href="javascript:void(0)" style="z-index:9997; margin-right:5px;">
                        <a class="user_me" href="<?php echo U('User/index');?>">我的账户</a>
                        <ul class="accountList" style="padding: 6px 0px; background: rgb(85, 85, 85) none repeat scroll 0% 0%; border-radius: 5px 0px 5px 5px; display: none;">
                            <!--<li class="accountico no"></li>-->
                            <li><a href="<?php echo U('User/index');?>">我的资产</a></li>
                            <li><a href="<?php echo U('Entrust/manage');?>">我的交易</a></li>
                            <li><a href="<?php echo U('User/zhongchou');?>">我的众筹</a></li>
                            <li style="border-top:1px solid #666;"><a href="<?php echo U('User/pay');?>">人民币充值</a></li>
                            <li><a href="<?php echo U('User/draw');?>">人民币提现</a></li>
                            <li style="border-bottom:1px solid #444;"><a href="<?php echo U('User/index');?>">充币提币</a></li>
                            <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                            <li><a href="<?php echo U('User/sysMassage');?>">系统消息<?php if($newMessageCount): ?><span class="messagenum"><?php echo ($newMessageCount); ?></span><?php endif; ?></a></li>
                        </ul>
                    </div>
                </div><?php endif; ?>
        </if>
		<?php if(empty($_SESSION['USER_KEY_ID'])): ?><div class="loginArea right" style=" margin-right:5px;">
            	<a href="<?php echo U('Login/index');?>" style="color:#f60; font-size:14px;">登录</a>
            	<span class="sep">&nbsp;|&nbsp;</span>
            	<a href="<?php echo U('Reg/reg');?>" style="color:#f60; font-size:14px;">注册</a>
        		</div><?php endif; ?>
    </div>
</div>
<div class="top">
    <div class="wapper clearfix">
        <h1 class="left"><a href="<?php echo U('Index/index');?>"><img style=" width:280px; height:70px;" src="<?php echo ($config["logo"]); ?>" alt="虚拟币" title="虚拟币"></a></h1>
        <ul class="nav right" style="z-index:9995;">
            <li><a href="<?php echo U('Index/index');?>">首页</a></li>
            <li><a href="<?php echo U('Orders/currency_trade');?>">交易大厅</a></li>
            <li><a href="<?php echo U('Zhongchou/index');?>">认购中心<!--hr--></a></li>
            <li><a href="<?php echo U('Safe/index');?>">用户中心</a></li>
            <li><a href="<?php echo U('Help/index',array('id'=>60));?>">帮助中心</a></li>
            <li><a href="<?php echo U('Art/index',array('ramdon_id'=>'1'));?>">最新动态</a></li>
            <li><a href="<?php echo U('Market/index');?>">行情中心</a></li>
            <li><a href="<?php echo U('Dow/index');?>">下载中心</a></li>
        </ul>
    </div>
</div>
<div class="pclxfsbox"> 
		<ul> 
			<li id="opensq">
				<i class="pcicon1 iscion6" ></i>
				<div class="pcicon1box">
					<div class="iscionbox" >
						<p>在线咨询</p>
						<p><?php echo ((isset($config['worktime']) && ($config['worktime'] !== ""))?($config['worktime']):"暂无"); ?></p>
					</div>
					<i></i>
				</div>
			</li>
			<li> 
				<i class="pcicon1 iscion1"></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p><img src="<?php echo ($config['weixin']); ?>" alt="投筹网微信公众号" width="108"></p>
						<p><?php echo ((isset($config["name"]) && ($config["name"] !== ""))?($config["name"]):"虚拟网"); ?>微信群</p>
					</div>
					<i></i>
				</div>
			</li>
			<li>
				<i class="pcicon1 iscion2"></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p><?php echo ((isset($config['tel']) && ($config['tel'] !== ""))?($config['tel']):"暂无"); ?></p>
						<p><?php echo ((isset($config["name"]) && ($config["name"] !== ""))?($config["name"]):"虚拟网"); ?></p>
					</div>
					<i></i>
				</div>
			</li>
           <li>
				<i class="pcicon1 iscion3"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($config['qq1']); ?>&site=qq&menu=yes"></a></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p><?php echo ((isset($config["qq1"]) && ($config["qq1"] !== ""))?($config["qq1"]):"暂无"); ?></p>
						<p><?php echo ((isset($config["name"]) && ($config["name"] !== ""))?($config["name"]):"虚拟网"); ?>QQ在线客服1</p>
					</div>
					<i></i>
				</div>
			</li>
            <li>
				<i class="pcicon1 iscion3" style="background:url(/Public/Home/images/kefu2.png) no-repeat #9b9b9b;background-position:-144px 11px;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($config['qq2']); ?>&site=qq&menu=yes"></a></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p><?php echo ((isset($config["qq2"]) && ($config["qq2"] !== ""))?($config["qq2"]):"暂无"); ?></p>
						<p><?php echo ((isset($config["name"]) && ($config["name"] !== ""))?($config["name"]):"虚拟网"); ?>QQ在线客服2</p>
					</div>
					<i></i>
				</div>
			</li>
            <li>
				<i class="pcicon1 iscion3" style="background:url(/Public/Home/images/kefu3.png) no-repeat #9b9b9b;background-position:-144px 11px;"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($config['qq3']); ?>&site=qq&menu=yes"></a></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p><?php echo ((isset($config["qq3"]) && ($config["qq3"] !== ""))?($config["qq3"]):"暂无"); ?></p>
						<p><?php echo ((isset($config["name"]) && ($config["name"] !== ""))?($config["name"]):"虚拟网"); ?>QQ在线客服3</p>
					</div>
					<i></i>
				</div>
			</li>
			
			<li>
				<i class="pcicon1 iscion4"></i>
				<div class="pcicon1box">
					<div class="iscionbox">
						<p>返回顶部</p>
					</div>
					<i></i>
				</div>
			</li>
		</ul>
	</div>
    <script type="text/javascript"> 
		$(function(){
			$(".pcicon1").on("mouseover",function(){
				$(this).addClass("lbnora").next(".pcicon1box").css({"width":"148px"});
			}).on("mouseout",function(){
				$(this).removeClass("lbnora").next(".pcicon1box").css("width","0px");
			});
			$(".iscion4").on("click",function(){
				$("html, body").animate({
					scrollTop: 0
				})
			});

			var objWin;
			$("#opensq").on("click",function(){
				var top = window.screen.height/2 - 250;
				var left = window.screen.width/2 - 390;
				var target = "http://p.qiao.baidu.com//im/index?siteid=8050707&ucid=18622305"; 
				var cans = 'width=780,height=550,left='+left+',top='+top+',toolbar=no, status=no, menubar=no, resizable=yes, scrollbars=yes' ;

				if((navigator.userAgent.indexOf('MSIE') >= 0)&&(navigator.userAgent.indexOf('Opera') < 0)){
						//objWin = window.open ('','baidubridge',cans) ; 
						if (objWin === undefined || objWin === null || objWin.closed) { 
							objWin = window.open (target,'baidubridge',cans) ; 
						}else { 
							objWin.focus();
						}
				}else{
					var win = window.open('','baidubridge',cans );
					if (win.location.href == "about:blank") {
					    //窗口不存在
					    win = window.open(target,'baidubridge',cans);
					} else {
					    win.focus();
					}
				}
				return false;

			})
		})
		
	</script>
<!--top end-->

<script>
$(".myhome").hover(function(){
	$(".mywallet_list").show();	
},function(){
	$(".mywallet_list").hover(function(){
		$(".mywallet_list").show();	
	},function(){
		$(".mywallet_list").hide();	
	});
	$(".mywallet_list").hide();
});
</script>
<style type="text/css">
.user {
	width: 97%;
	margin: 0px auto;
}
.user-nav {
}
.user-nav a {
	display: inline-block;
	float: left;
	padding: 7px 20px;
	margin-left: 10px;
	color: #0B72A4;
}
.user-nav a.cur {
	background: #fff;
	border: 1px solid #ddd;
	border-bottom: 0px;
}
.user-info {
	padding: 20px 0px;
	font-size: 14px;
	border: 1px solid #ddd;
}
.user-info dl {
	display: block;
	width: 99%;
	margin: 0px auto;
	zoom: 1;
	overflow: hidden;
}
.user-info dl dt, .user-info dl dd {
	float: left;
	padding: 15px 10px;
}
.user-info dl dt {
	clear: both;
	width: 10%;
}
.user-info dl dd {
	width: 70%;
}
.user-info dl dd input[type='radio'] {
	margin-left: 20px;
}
.user-info input[type='text'], .user-info input[type='password'] {
	width: 100px;
	height: 30px;
	line-height: 30px;
	border: 1px solid #ccc;
	padding-top: 0px;
	padding-right: 10px;
	padding-bottom: 0px;
	padding-left: 10px;
}
.user-info table {
	width: 100%;
	border: 1px solid #ccc;
	border-bottom: 0px;
}
.user-info th, .user-info td {
	padding: 10px 10px;
	border-bottom: 1px solid #ccc;
	text-align: right;
}
.user-info h3 {
	text-indent: 15px;
	padding: 15px 0px;
}
.sub {
	display: inline-block;
	font-weight: 700;
	font-size: 14px;
	color: white;
	text-align: center;
	width: 170px;
	height: 32px;
	line-height: 32px;
	background: #FF8C19;
	margin-top: 10px;
}
.sub:hover {
	color: #fff;
	text-decoration: none;
}
.banktable td {
	padding: 0px;
}
.onlineRecharge .onlineRechargeContent .numberBlock{ width:350px}
.mainBox2 h3 {
  font-size: 20px;
  font-weight: bold;
  color:#E32222;
  padding-left:0px;
}
.content {
  padding: 10px;
}
.input {
  border: 1px solid #DDD;
  padding: 2px;
  font: 12px/150% Arial,"Lucida Grande",Verdana,Helvetica,sans-serif;
  color: #333;
}
.content #button_10:hover{ background-color:#286090 !important;}
.selecttabboxNew li{float:none;line-height: 19px;}
</style>
<script src="js/index.js"></script>

<div id="main">
	
	<div class="main_box">
	
  <div class="rightArea">
    <div class="onlineRecharge">
	
      <div class="selecttabNew1">
	  
        <ul class="selecttabboxNew">
		<div id="my_menu" class="sdmenu left">
		<div>
			<p><i class="iconfont">&#xe61e;</i>&nbsp;我的资产</p>
						<a href="<?php echo U('User/index');?>" class="menu"><b class="ic-uc"></b><i class="iconfont">&#xe6f6;</i>&nbsp;&nbsp;账户资产</a>
                        <a href="<?php echo U('Finance/index');?>" class="menu13"><b class="ic-uc"></b><i class="iconfont">&#xe93e;</i>&nbsp;&nbsp;财务日志</a>
						<a href="<?php echo U('FillByBank/index');?>" class="menu15"><b class="ic-uc"></b><i class="iconfont">&#xe602;</i>&nbsp;&nbsp;在线网银支付</a>
                        <a href="<?php echo U('Fill/index');?>" class="menu138"><b class="ic-uc"></b><i class="iconfont">&#xe93e;</i>&nbsp;&nbsp;网银支付日志</a>
					</div>
		<div style="position:relative;">
			<p><i class="iconfont">&#xe643;</i>&nbsp;我的交易</p>
						<a href="<?php echo U('Entrust/manage');?>" class="menu2"><b class="ic-uc"></b><i class="iconfont">&#xe616;</i>&nbsp;&nbsp;委托管理</a>
						<a href="<?php echo U('Trade/myDeal');?>" class="menu3"><b class="ic-uc"></b><i class="iconfont">&#xe65b;</i>&nbsp;&nbsp;我的成交</a>
						<a href="<?php echo U('Entrust/history');?>" class="menu4"><b class="ic-uc"></b><i class="iconfont">&#xe62d;</i>&nbsp;&nbsp;委托历史</a>
						
						<a href="<?php echo U('User/zhongchou');?>" class="menu6"><b class="ic-uc"></b><i class="iconfont">&#xe60b;</i>&nbsp;&nbsp;我的众筹</a>
					</div>
                    <div>
			<p><i class="iconfont">&#xe60e;</i>&nbsp;安全中心</p>
            		
						<!--<a href="<?php echo U('Safe/index');?>" class="menu11"><b class="ic-uc"></b><i class="iconfont">&#xe649;</i>&nbsp;&nbsp;安全中心</a>-->
                        <a href="<?php echo U('User/updatePassword');?>" class="menu8"><b class="ic-uc"></b><i class="iconfont">&#xe638;</i>&nbsp;&nbsp;修改密码</a>
                        <a href="<?php echo U('User/updateMassage');?>" class="menu7"><b class="ic-uc"></b><i class="iconfont">&#xe649;</i>&nbsp;&nbsp;个人信息</a>
						<!--<a href="<?php echo U('Safe/mobilebind');?>" class="menu12"><b class="ic-uc"></b><i class="iconfont">&#xe609;</i>&nbsp;&nbsp;手机绑定</a>-->
					  </div>
				  <div>
			<p><i class="iconfont">&#xe611;</i>&nbsp;账户中心</p>
			            <a href="<?php echo U('User/pay');?>" class="menu12"><b class="ic-uc"></b><i class="iconfont">&#xe620;</i>&nbsp;&nbsp;人民币充值</a>
			            <a href="<?php echo U('User/draw');?>" class="menu14"><b class="ic-uc"></b><i class="iconfont">&#xe6f0;</i>&nbsp;&nbsp;人民币提现</a>
            		    <a href="<?php echo U('Safe/index');?>" class="menu11"><b class="ic-uc"></b><i class="iconfont">&#xe660;</i>&nbsp;&nbsp;用户中心</a>
						<a href="<?php echo U('User/invit');?>" class="menu9"><b class="ic-uc"></b><i class="iconfont">&#xe602;</i>&nbsp;&nbsp;邀请好友</a>
						<a href="<?php echo U('User/sysMassage');?>" class="menu10"><b class="ic-uc"></b><i class="iconfont">&#xe664;</i>&nbsp;&nbsp;系统消息<?php if($newMessageCount): ?><span class="messagenum"><?php echo ($newMessageCount); ?></span><?php endif; ?></a>



					  </div>
		</div>
                 <!--<li class=""> <a class="otherBoxTitle" href="/Home/Fill/index">线下手动汇款<img src="/Public/Home/nofee.png"></a> </li>-->
            
                <!--  <li class=""> <a class="otherBoxTitle" href="/Home/Fill/zhifu_add">支付宝手动汇款<img src="/Public/Home/nofee.png"></a> </li>
                 <li class="cur"> <a class="otherBoxTitle" href="/Home/Fill/bank">银行汇款<img src="/Public/Home/nofee.png"></a> </li>
           -->
        </ul>
      </div>
      
      <div class="rightArea3">
				<div class="riskArea">
					<span class="icon"></span> <span class="hinttext"> <span class="define"><?php echo ($art["title"]); ?></span><span> <?php echo ($art["content"]); ?>
 </span> </span>
				</div>
			</div>
            
            <div class="mainBox2">
          
         
			
		  <div class="content">
          <style>
		  #tips2bank { margin-left:40px;}
          		#tips2bank li{ line-height:45px;}
          </style>
          <!--<ul id="tips2bank">
							<li><span class="c1">充值方式： </span><span class="c2" id="fownerName1">支付宝</span><span class="c3"></span></li> 
							<li><span class="c1">收款帐号：</span><span class="c2" id="fownerName2"><?php echo ($sys["alipay"]); ?>  </span></li> 
							<li><span class="c1">收款人名：</span><span class="c2" id="fownerName3"><?php echo ($sys["alipay_name"]); ?></span></li> 
					<li><span class="c1">附言内容：</span><span class="c2" id="fownerName"><?php echo ($auth["id"]); ?></span></li> 
						
            <div>
		  </div>
		  <input name="optEmail" value="<?php echo ($sys["alipay"]); ?>" type="hidden">
		  <input name="title" value="<?php echo ($num); ?>" type="hidden">
          <li><span class="c1">充值金额：</span>
            <input style="margin-left:55px;" name="money" onkeyup="javascript:buyTurnoverValue();" class="input" id="payAmount" value="100" size="20" type="text">
            元</span></li>
          			<input id="button_10" type="submit" value="确认充值" style="width:130px; height:45px; border-radius:5px; margin-top:8px; background:#337ab7; color:#fff; font-size:16px; border:0px;"> 
</ul>-->
<!--新加-->
<form id="form1" name="form1" action="<?php echo U('FillByBank/bank');?>" method="post" onsubmit="return VerifyData();" target="_blank">
          <table width="60%" style="border-collapse:collapse;border:1px solid #000000; margin-left:200px; position:absolute;" border="0" cellpadding="1" cellspacing="1" >
            <tr>
              <td height="30" align="right" class="tdwp"><span class="STYLE12">*</span> 充值金额:</td>
              <td align="left">&nbsp;&nbsp;&nbsp;
                <input name="p3_Amt" type="text" id="p3_Amt" style="border:1px solid #CCCCCC;height:18px;line-height:20px; width:118px;" onkeyup="clearNoNum(this);" size="15"/>
                <span style="color:#FF0000">&nbsp;&nbsp;&nbsp;*&nbsp;充值金额不能低于<?php echo ($config["pay_min_money"]); ?>元</span></td>
            </tr>
            <!--<tr>
              <td height="30" align="right" class="tdwp"><span class="STYLE12">*</span> 兑换美元:</td>
              <td align="left">&nbsp;&nbsp;&nbsp;
                <input  type="text" id="p3_my" style="border:1px solid #CCCCCC;height:18px;line-height:20px; width:118px;"  size="15" disabled="disabled"/></td>
            </tr>-->
            <tr>
              <td align="right" height="60"><span class="STYLE12">*</span> 选择银行:</td>
              <td align="left"><div style="padding-left:20px;">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="left:0; line-height:40px;">
                    <tr class="b_rig">
                      <td>
                      <input type="radio" name="pd_FrpId" value="1101" checked />
                        &nbsp;<img src="/Public/Home/images/bank/nongye.gif"/></td>
                      <td><input name="pd_FrpId" type="radio" value="1100" />
                        &nbsp;<img src="/Public/Home/images/bank/gongshang.gif" /></td>
                      <td><input name="pd_FrpId" type="radio" value="1106">
                        &nbsp;<img src="/Public/Home/images/bank/jianshe.gif" /></td>
                    </tr>
                    <tr>
                      <td><input name="pd_FrpId" type="radio" value="1108"/>
                        &nbsp;<img src="/Public/Home/images/bank/jiaotong.gif" /></td>
                      <td><input name="pd_FrpId" type="radio" value="1107">
                        &nbsp;<img src="/Public/Home/images/bank/zhongguo.gif" /></td>
                      <td><input name="pd_FrpId" type="radio" value="1102">
                        &nbsp;<img src="/Public/Home/images/bank/zhaohang.gif" /></td>
                    </tr>
                    <tr class="b_rig">
                      <td><input name="pd_FrpId" type="radio" value="1110">
                        &nbsp;<img src="/Public/Home/images/bank/minsheng.gif" /></td>
                      <td><input name="pd_FrpId" type="radio" value="1112">
                        &nbsp;<img src="/Public/Home/images/bank/guangda.gif" /></td>
                      <td><input name="pd_FrpId" type="radio" value="1103" >
                        &nbsp;<img src="/Public/Home/images/bank/xingye.gif" /></td>
                    </tr>
                    <tr class="b_rig">
                      <td><input name="pd_FrpId" type="radio" value="1104">
                        &nbsp;<img src="/Public/Home/images/bank/zhongxin.gif" /></td>
                      <td><input name="pd_FrpId" type="radio" value="1121"/>
                        &nbsp;<img src="/Public/Home/images/bank/pingan.gif" /></td>
                      <td><input name="pd_FrpId" type="radio" value="1111">
                        &nbsp;<img src="/Public/Home/images/bank/huaxia.gif" /></td>
                    </tr>
                    <tr class="b_rig">
                      <td><input name="pd_FrpId" type="radio" value="1109">
                        &nbsp;<img src="/Public/Home/images/bank/shangpufa.gif" /></td>
                      <td><input name="pd_FrpId" type="radio" value="1114">
                        &nbsp;<img src="/Public/Home/images/bank/gdb.gif" /></td>
                      <td><input name="pd_FrpId" type="radio" value="1119">
                        &nbsp;<img src="/Public/Home/images/bank/youzheng.gif" /></td>
                    </tr>
                  </table>
                </div></td>
            </tr>
            <tr>
              <td height="40" colspan="2" align="right"><div align="center"><span style="color:#FF0000">注意：付款后请等待系统自动跳转到提示交易成功的页面。</span></div></td>
            </tr>
            <tr>
              <td height="35" align="right">&nbsp;</td>
              <td height="40" align="left" valign="middle">&nbsp;&nbsp;
                <input type="submit" value="马上冲值" name="SubTran" class=" btn btn-default anniu_01" id="SubTran" />
                </td>
            </tr>
						<table width="96%" border="0" cellpadding="0" cellspacing="5" style="position:absolute; margin-left:200px ; margin-top:380px;">
          <tr >
            <td align="left" style="padding-top:10px;"><strong class="STYLE1">在线冲值说明：</strong></td>
          </tr>
          <tr>
            <td align="left"><span class="font-hblack"><span >
              <div style=" line-height:22px; font-size:12px;"> (1).请按表格填写准确的在线冲值信息,确认提交后会进入选择的银行进行在线付款! </div>
              <div style=" line-height:22px;font-size:12px;"> (2).交易成功后请点击返回支付网站可以查看您的订单信息! </div>
              <div style=" line-height:22px;font-size:12px;"> (3).如有任何疑问,您可以联系 在线客服,<?php echo ($config['name']); ?>为您提供365天×24小时不间断的友善和专业客户咨询服务! </div>
              <div style=" line-height:22px;font-size:12px;"> (4).注意：充值成功后，请不要急着关闭支付成功的跳转页面，否则有可能不会到帐。 </div>
              <div style=" line-height:22px;font-size:12px;"> (5).如需网银汇款/ATM转账或支付宝存款，请联系在线客服索取存款账号！ </div>
              </span> </span></td>
          </tr>
        </table>

          </table>
          <input type="hidden" name="pa_MP" id="pa_MP" value="<?=$rows['username']?>" />
          <input size="50" type="hidden" name="pr_NeedResponse" id="pr_NeedResponse" value="1" />
        </form>
        <!--<table width="96%" border="0" cellpadding="0" cellspacing="5">
          <tr >
            <td align="left" style="padding-top:10px;"><strong class="STYLE1">在线冲值说明：</strong></td>
          </tr>
          <tr>
            <td align="left"><span class="font-hblack"><span >
              <div style=" line-height:22px; font-size:12px;"> (1).请按表格填写准确的在线冲值信息,确认提交后会进入选择的银行进行在线付款! </div>
              <div style=" line-height:22px;font-size:12px;"> (2).交易成功后请点击返回支付网站可以查看您的订单信息! </div>
              <div style=" line-height:22px;font-size:12px;"> (3).如有任何疑问,您可以联系 在线客服,皇冠现金网为您提供365天×24小时不间断的友善和专业客户咨询服务! </div>
              <div style=" line-height:22px;font-size:12px;"> (4).注意：充值成功后，请不要急着关闭支付成功的跳转页面，否则有可能不会到帐。 </div>
              <div style=" line-height:22px;font-size:12px;"> (5).如需网银汇款/ATM转账或支付宝存款，请联系在线客服索取存款账号！ </div>
              </span> </span></td>
          </tr>
        </table>-->


<!--新加-->
        </div>
        <!--    <img src="/Public/Home/2h.jpg" />-->
</div>
  <!--<div style="margin-top: 3px;" class="entrustTen lasttenorder">
		<div class="Tentitle">

			<span class="lightblue4">充值记录</span>
		</div>
		<div class="coinBoxBody">
			<table width="100%">
				<tbody>
					<tr>	
							<th width="190">订单号</th>
							<th width="190">时间</th>
							<th width="180">充值方式</th>
							<th width="180">金额</th>
							<th width="180">状态</th>
						
						</tr>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					  <td><?php echo ($vo["tradeno"]); ?> </td>
                    <td><?php echo (date("Y-m-d H:i:s",$vo["ctime"])); ?></td>
                     <td>支付宝手动充值</td>
                     <td><?php echo ($vo['num']); ?></td>
                    <td><?php echo ($vo["status_fill"]); ?></td>
					
					</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
				</tbody>
			</table>
		</div>

		<div class="page">
			<ul>
			<li><a href="<?php echo ($path); ?>/Fill/zhifu_add/page/1">首页</a></li>
			<li><a href="<?php echo ($path); ?>/Fill/zhifu_add/page/<?php echo ($page-1); ?>">上一页</a></li>
			<li><a href="<?php echo ($path); ?>/Fill/zhifu_add/page/<?php echo ($page+1); ?>">下一页</a></li>
			<li><a href="<?php echo ($path); ?>/Fill/zhifu_add/page/<?php echo ($page_num); ?>">尾页</a></li>
			</ul>
		</div>
	</div>-->
</div>
</div>
<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>


<script>
		/*var $ = function(Id){
            return document.getElementById(Id);
        }*/
    
       
        //数字验证 过滤非法字符
        function clearNoNum(obj){
	        //先把非数字的都替换掉，除了数字和.
	        obj.value = obj.value.replace(/[^\d.]/g,"");
	        //必须保证第一个为数字而不是.
	        obj.value = obj.value.replace(/^\./g,"");
	        //保证只有出现一个.而没有多个.
	        obj.value = obj.value.replace(/\.{2,}/g,".");
	        //保证.只出现一次，而不能出现两次以上
	        obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
	        if(obj.value != ''){
	        var re=/^\d+\.{0,1}\d{0,2}$/;
                  if(!re.test(obj.value))   
                  {   
			          obj.value = obj.value.substring(0,obj.value.length-1);
			          return false;
                  }else{
					  $("#p3_my").val($("#p3_Amt").val()/6.5);
				  }
	        }
        }
<!--
//去掉空格
function check_null(string) { 
var i=string.length;
var j = 0; 
var k = 0; 
var flag = true;
while (k<i){ 
if (string.charAt(k)!= " ") 
j = j+1; 
k = k+1; 
} 
if (j==0){ 
flag = false;
} 
return flag; 
}
function VerifyData() {
alert();
var min_num=<?php echo ($config["pay_min_money"]); ?>;
if (document.form1.p3_Amt.value == "") {
			alert("请输入存款金额！")
			document.form1.p3_Amt.focus();
			return false;
}
if (document.form1.p3_Amt.value !="") {
		  if(document.form1.p3_Amt.value <min_num )
		  {
			alert("充值不能小于".min_num."元！")
			document.form1.p3_Amt.focus();
			return false;
		  }
}
}
function url(s){
location.href="<?=substr($_SERVER['HTTP_REFERER'],0,strlen($_SERVER['HTTP_REFERER'])-12) ?>/"+s;
}

</script>
<style>
.rightwidth{ width:340px;}
</style>
<!--footer start-->

<div class="coin_footer" style="position:relative;">
	<div class="coin_hint">

		<h2><?php echo ((isset($info_one4["title"]) && ($info_one4["title"] !== ""))?($info_one4["title"]):"风险提示"); ?></h2>
		<p><?php echo ($config["risk_warning"]); ?></p>
	</div>
	<div class="coin_footerbar">
		<div class="coin_footer_nav clearfix">
			<div class="coin_nav coin_copy left">
				<p><a href="<?php echo U('Index/index');?>"><img style=" height:55px;" src="<?php echo ($config["logo"]); ?>"></a></p>
			</div>
			<div class="coin_nav left">
				<h2><?php echo ((isset($config["name"]) && ($config["name"] !== ""))?($config["name"]):"虚拟币"); ?>团队</h2>
				<ul>
					<li><a href="<?php echo U('Index/index');?>"><?php echo ((isset($config["name"]) && ($config["name"] !== ""))?($config["name"]):"虚拟币"); ?></a></li>
				<?php if(is_array($team)): $i = 0; $__LIST__ = $team;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Art/details',array('team_id'=>$vo['article_id']));?>" target="_blank" class="left"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="coin_nav left">
				<h2>帮助中心</h2>
				<ul>
                <?php if(is_array($help)): $i = 0; $__LIST__ = $help;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Help/index',array('id'=>$vo['id']));?>" target="_blank" class="left"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="coin_nav coin_nav02 left">
				<h2 class="clearfix"><span class="left">联系我们</span><a href="http://weibo.com/<?php echo ($config["weibo"]); ?>" target="_blank" class="coin_sina left"></a><!--<a href="#" id="coin_weixin" class="coin_wei left"></a>--></h2>
				<ul>
					<li>客服电话：<?php echo ((isset($config["tel"]) && ($config["tel"] !== ""))?($config["tel"]):"暂无"); ?></li>
					<li>客服QQ：<?php echo ((isset($config["qq1"]) && ($config["qq1"] !== ""))?($config["qq1"]):"暂无"); ?></li>
					<li><a href="mailto:<?php echo ($config['email']); ?>">客服邮箱：<?php echo ((isset($config["email"]) && ($config["email"] !== ""))?($config["email"]):"暂无"); ?></a></li>
					<li><a href="mailto:<?php echo ($config['business_email']); ?>">业务合作：<?php echo ((isset($config["business_email"]) && ($config["business_email"] !== ""))?($config["business_email"]):"暂无"); ?></a></li>
				</ul>
			</div>
			<div class="coin_nav coin_nav02 left rightwidth" style="position:relative;">
              <div style="float:left; padding-top:25px; padding-left:10px;"><img style=" width:100px;" src="<?php echo ($config['weixin']); ?>"/></div>
              <div style=" float:left; padding-left:10px;">
				<p class="coin_phone400"><?php echo ((isset($config["tel"]) && ($config["tel"] !== ""))?($config["tel"]):"暂无"); ?></p>
				<p class="coin_phoneqq"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($config['qq1']); ?>&site=qq&menu=yes" target="_blank">在线客服</a></p>
				<p>工作日:9-19时 节假日:9-18时</p>
               </div>
				<div class="group" style="left:12px;margin-top: 40px">
					<ul class="qq_all" style="    margin-left: 10px;">
						<li><a style="flont:left; " href="javascript:void(0)"><?php echo ((isset($config["name"]) && ($config["name"] !== ""))?($config["name"]):"虚拟币"); ?>官方群<img style="margin-top:5px;" src="/Public/Home/images/xiala.png"></a>
							<ul style="margin-left: 105px;">
								<li><?php echo ((isset($config["name"]) && ($config["name"] !== ""))?($config["name"]):"虚拟币"); ?>官方1群 <?php echo ((isset($config["qqqun1"]) && ($config["qqqun1"] !== ""))?($config["qqqun1"]):"暂无"); ?></li>
								<li><?php echo ((isset($config["name"]) && ($config["name"] !== ""))?($config["name"]):"虚拟币"); ?>官方2群 <?php echo ((isset($config["qqqun2"]) && ($config["qqqun2"] !== ""))?($config["qqqun2"]):"暂无"); ?></li>
								<li><?php echo ((isset($config["name"]) && ($config["name"] !== ""))?($config["name"]):"虚拟币"); ?>官方3群 <?php echo ((isset($config["qqqun3"]) && ($config["qqqun3"] !== ""))?($config["qqqun3"]):"暂无"); ?></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<div class="footer_aq">
	<p><?php echo ((isset($config["copyright"]) && ($config["copyright"] !== ""))?($config["copyright"]):"暂无"); ?></p>
	<p><?php echo ((isset($config["record"]) && ($config["record"] !== ""))?($config["record"]):"暂无"); ?></p>
	<ul class="footerSafety clearfix">
        <li class="safety02"><a href="http://net.china.com.cn/" target="_blank"></a></li>
        <li class="safety03"><a href="http://webscan.360.cn/index/checkwebsite/?url=<?php echo ($config['localhost']); ?>" target="_blank"></a></li>
        <li class="safety04"><a href="http://www.cyberpolice.cn/wfjb/" target="_blank"></a></li>
    </ul>
</div>
<div id="weixin" style="position:absolute; bottom:88px; left:50%; margin-left:170px; display:block;"><!--<img src="<?php echo ($config["logo"]); ?>">--></div>
<script>
	$('#coin_weixin').mouseover(function(){
		$('#weixin').show();
	}).mouseout(function(){
		$('#weixin').hide();
	});
</script>
<!--footer end-->
<script type="text/javascript" src="/Public/Home/js/gotop.js"></script>
<script type="text/javascript" src="/Public/Home/js/link.js"></script>
<script type="text/javascript" src="/Public/Home/js/slides.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?0ab4db557b96d841137861e0740d1e0a";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>



</div></body></html>