<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
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
 <style>
 .pass_ybc{ min-height:400px !important;}
 .my_add{ margin-bottom:0px !important;}
 </style>
<div id="main">
  <div class="main_box"> <div id="my_menu" class="sdmenu left">
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
    <div class="raise right clearfix"> 
      <script type="text/javascript" src="js/ajax.js"></script> 
      <script type="text/javascript" src="js/Fnc.js"></script> 
      <script type="text/javascript" src="js/inputFormat.js"></script>
      <div class="ybc_list">
        <div class="ybcoin">
          <h2 class="left">CNY提现</h2>
          <!-- <p class="right" style=" margin-top:10px; color:#333;">您可以设置多个提款地址，这样您提款到不同的银行卡、钱包或其它平台时就会更方便。</p> -->
          <div class="clear"></div>
        </div>
      </div>
      <div class="support_ybc pass_ybc" id="verifyon"> 
        <!--<ul id="pass_change">
		<li class="selectTag"><a onClick="selectTag('tagContent0',this)" href="javascript:void(0)">提现到银行卡</a> </li>
		<li class="note"><a onClick="selectTag('tagContent1',this)" href="javascript:void(0)">提现到元宝理财</a></li>
		<div class="clear"></div>
        </ul>-->
        <div id="tagContent" class="passContent">
          <div class="tagContent selectTag" id="tagContent0">
            <h2 class="choose_one">选择一个提款地址 
              <!-- <a href="/news/detail/?id=736" style="float: right;margin-right:30px; color: red;" target="_blank">提现银行卡暂不支持邮政储蓄银行</a> --> 
            </h2>
            <table class="my_add" border="0" cellpadding="0" cellspacing="0">
              <thead>
                <tr align="center">
                  <th>选择</th>
                  <th>地址标签</th>
                  <th>提款地址</th>
                  <th>操作</th>
                </tr>
              </thead>
              <?php if(is_array($bank_info)): $i = 0; $__LIST__ = $bank_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><thead>
              	  <th><input type="radio" value="<?php echo ($vo["id"]); ?>" id="bank_id" name="redios" onclick="bank_id()"></th>
                  <th><?php echo ($vo["bname"]); ?></th>
                  <th><?php echo ($vo["bankname"]); ?>|<?php echo ($vo["cardnum"]); ?>|<?php echo ((isset($vo["cardname"]) && ($vo["cardname"] !== ""))?($vo["cardname"]):"无"); ?>|<?php echo ($vo["barea_name"]); ?>|<?php echo ($vo["aarea_name"]); ?></th>
                  <th><a class="link-del" href="javascript:void(0);" onclick="checkSuccess(<?php echo ($vo["id"]); ?>)">删除</a></th>
                 
              </thead><?php endforeach; endif; else: echo "" ;endif; ?>
              
              <script>
			  function checkSuccess(_this){
					layer.confirm(
					'确定删除', 
					{btn:['确定','取消']},
						function(){
							$.post("<?php echo U('User/delete');?>",{'id':_this},function(data){
									if(data.status>0){
										layer.msg(data.info);
										window.location.reload();
									}else{
										layer.msg(data.info);
										window.location.reload();
									}
							});	 
						}
					),
					function(){
						layer.msg('已取消');
					}
					
			}
			  
					function bank_id(){
						var list= $('input:radio[name="redios"]:checked').val();
						$("#select_bank").val(list);
					}
              </script>
             </table>
           <table id="addNewAddr" class="add_list" border="0" cellpadding="0" cellspacing="0" style="display:none"> 
              <tbody>
                <tr>
                 <form action="<?php echo U('User/insert');?>" method="post" id="bankform" jump-url="<?php echo U('User/draw');?>">
                  <td colspan="4" id="newAddress" style="">
                  <div id="rmb_out_ok">
                      <ul class="ybc_con" id="rollout" style="margin-top:10px;">
                        <li>
                          <label>新标签：</label>
                          <input name="new_label" id="new_label" placeholder="例：提现卡01" type="text">
                          <span class="note">个人备注信息</span></li>
                        <li>
                          <label>开户姓名：</label>
                          <input name="name" id="name" value="<?php echo ($auth); ?>" class="loginValue" disabled="disabled" type="text">				
                          
                          <span class="false" id="accountmsg">与实名认证信息一致不可修改</span> </li>
                        <li>
                          <label>银行名称：</label>
                          <select name="bank" id="bank" class="loginValue" style="width:264px; border:1px solid #e1e1df;">
                            <option selected="selected" value="">请选择银行</option>
                            <option value="支付宝">支付宝</option>
                            <option value="工商银行">工商银行</option>
                            <option value="建设银行">建设银行</option>
                            <option value="农业银行">农业银行</option>
                            <option value="中国邮政储蓄银行">中国邮政储蓄银行</option>
                            <option value="交通银行">交通银行</option>
                            <option value="中国银行">中国银行</option>
                            <option value="光大银行">光大银行</option>
                            <option value="中信银行">中信银行</option>
                            <option value="招商银行">招商银行</option>
                            <option value="民生银行">民生银行</option>
                            <option value="兴业银行">兴业银行</option>
                            <option value="平安银行">平安银行</option>
                            <option value="广发银行">广发银行</option>
                            <option value="北京银行">北京银行</option>
                            <option value="华夏银行">华夏银行</option>
                            <option value="上海浦东发展银行">上海浦东发展银行</option>
                            <option value="渤海银行">渤海银行</option>
                            <option value="浙商银行">浙商银行</option>
                            <option value="宁波银行">宁波银行</option>
                            <option value="恒丰银行">恒丰银行</option>
                            <option value="中国农业发展银行">中国农业发展银行</option>
                          </select>
                          <span class="rePWB" id="bankmsg"></span> 
                          </li>
                        <li>
                          <label>银行卡所在地：</label>
                          <select  id="p1" style="width:130px; border:1px solid #e1e1df;">
                            <option selected="selected" value="">省份</option>
                            <?php if(is_array($areas)): $i = 0; $__LIST__ = $areas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><option value="<?php echo ($row['area_id']); ?>" 
                              <?php if(($row["area_id"]) == $list["province"]): ?>selected="selected"<?php endif; ?>>
                              <?php echo ($row['area_name']); ?>
                              </option><?php endforeach; endif; else: echo "" ;endif; ?>
                          </select>
                          <select id="c1" style="width:130px; border:1px solid #e1e1df;" onchange="city();">
                            <option selected="selected" value="">城市</option>
                          </select>
                      		<input type="hidden" name="shi" id="shi">
                        </li>
                        <li><label>开户支行：</label>
                          <input name="bank_branch" id="bank_branch" class="loginValue" style="font-size:14px;font-weight:bold;color:#f60;background:#fff7f2;" type="text">
                         <span class="false" style="color:#f00;">不能为空,如果没有请填"无"</span> </li>
                        <li>
                          <label id="kh">银行卡号：</label>
                          <input onkeyup="value=value.replace(/[^\d]/g,'')" name="account" id="account" class="loginValue" style="font-size:14px;font-weight:bold;color:#f60;background:#fff7f2;" type="text">
                          <span class="false" id="accountmsg" style="color:#f00;">银行卡号和开户姓名必须一致，否则无法到账。</span> </li>
                        <li id="yes_add">
                          <label>&nbsp;</label>
                          <input class="addition"  value="确认添加" type="submit">
                       
<script>
	function city(){
		$("#shi").val($("#c1").val());
	}
	$("#p1").change(function(){
	$.post("<?php echo U('User/getCity');?>",{'id':$("#p1").val()},function(data){
	  $("#c1").empty();
		var area=new Option("请选择","");
		$("#c1").append(area);
		if(data.length>0){
			for(var i=0;i<data.length;i++){
				var option = new Option(data[i]["area_name"], data[i]["area_id"]);	
				$("#c1").append(option);		
		}
		}else{
			$("#c1").append("<option value='0'>没有相应城市信息</option>");
		}
		});	 	  	  
	});

</script> 
<script>
function zfb(){
	if($('#bank').val()=="支付宝"){
		$('#kh').html('支付宝卡号：');
		$('#accountmsgs').html('支付宝卡号和姓名必须一致，否则无法到账。');
	}else{
		$('#kh').html('银行卡号：');
		$('#accountmsgs').html('银行卡号和开户姓名必须一致，否则无法到账。');
	}
}
</script>
                          
<script>
	  $("#bankform").validate({
        rules: {
			new_label:"required",
			
			bank:"required",
			
			province:"required",
			
			city:"required",
			bank_branch:"required",
			account:{required:true,
					 rangelength:[16,19]
					 }
        },
        messages: {
			
			new_label:"请填写标签",
			
			bank:"请选择银行",
			
			province:"请选择有效省份",
			
			city:"请选择有效城市/区",
			bank_branch:"请填写开户支行",
			account:{required:"请输入银行卡号",
					 rangelength:"请输入有效卡号"}
        },
	    submitHandler:function(form){
            ajax_submit_form(form)
            return false;
        },
        invalidHandler: function() {  //不通过回调
            return false;
        }
    });
</script>
                          
                          <span id="showMsg_address" style="color:red;">最多添加10条提款地址</span> </li>
                      </ul>
                      
                  </div>
                  </td>
                  </form>
                </tr>
                <tr style="display:none;" id="phone_alert" align="right">
                  <td colspan="4"><span style="color:#f00;">系统已拨打您的手机告知验证码，请输入验证码</span>
                    <input class="verify_text" id="phone_code_bank" type="text">
                    <input class="verify" id="add_bankcards" onclick="cnyOut.finaddAddress()" value="确认" type="button"></td>
                </tr>
                </tbody>
            </table>
           
           
            <center>
            <table>
                <tr id="addAddress_tr" align="center">
                  <td colspan="4" class="list" align="center">
                  <?php if(($num) == "1"): ?><a href="javascript:void(0);" id="addNewAddress" onclick="addNewAddr();">点击绑定银行卡</a>
                  <?php else: ?>
                  <td style="color:red;">最多添加10条提款地址</td><?php endif; ?></td>
                </tr>
            </table>
            </center>
            <script>
				function addNewAddr(){
					document.getElementById("addNewAddr").style.display="";//显示
					document.getElementById("addAddress_tr").style.display="none";//隐藏
				}
			</script>
            <h2 class="choose_one">输入要提款的金额<span>(可用余额：<strong>￥<?php echo ($rmb["rmb"]); ?></strong>)</span><span style="float:right;margin-right:20px;"><strong id="rmbout_showtips"></strong></span></h2>
           
           <form action="<?php echo U('User/withdraw');?>" method="post" id="drawform" jump-url="<?php echo U('User/draw');?>">
           <table class="my_add" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td style="position:relative; padding-left:90px;">提款金额
                  	<input name="select_bank" id="select_bank" type="hidden">
                    <input style="display:none">
                    <!-- for disable autocomplete on chrome -->
                    <input class="sum" name="money" id="money"  autocomplete="off" type="text" onkeyup="value=value.replace(/[^\d]/g,'');sjdz();">
                    </td>
                  <td>实际到帐
                    <input class="sum" id="true_daozhang" disabled="disabled" type="text">
                    <span style="color:#f60;">手续费<?php echo ($config["fee"]); ?>%</span></td> 
                  
                  
                </tr> 
                <tr>
                  <td style=" padding-left:90px;">交易密码
                    <input style="display:none" type="password">
                    <!-- for disable autocomplete on chrome -->
                    <input class="sum" name="pwdtrade" id="pwdtrade" autocomplete="off" type="password"></td>
                  <td>验证码
                    <input style="display:none" type="password">
                    <!-- for disable autocomplete on chrome -->
                    <input class="sum" name="code" id="code" autocomplete="off" type="password">
                    <input class="confirm"  value="点击发送" type="button" id="msgt" data-key='off' onclick="sandPhone()"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input style=" float:right; margin-right:103px;" class="confirm"  value="确认提交" type="submit"></td>
                </tr>
              </tbody>
            </table>
            </form>
            <script>
				$("#drawform").validate({
				rules: {
					money:{
						required: true,
						min: 100,
						max: 50000,
					  }, 
					pwdtrade:"required", 
					code:"required", 
				},
				messages: {
					money:{
						required: "请填写提现金额",
						min: "提现金额最小100",
						max: "提现金额最大50000",
						},
					
					pwdtrade:"请填写交易密码",
					code:"请填写验证码",
				},
				submitHandler:function(form){
					ajax_submit_form(form)
					return false;
				},
				invalidHandler: function() {  //不通过回调
					return false;
				}
			});
			function sjdz(){
				var fee = <?php echo ($config["fee"]); ?>;
				var m ;
				
					m = $("#money").val()-$("#money").val()*fee*0.01;
				
				$("#true_daozhang").val(m);
			}
			</script>

            <h2 class="choose_one"><?php echo ($art["title"]); ?></h2>
            <div class="turns Font14"> 
              <input id="cny_outfee" value="0.003" type="hidden">
            <?php echo ($config["withdraw_warning"]); ?>
            </div>
          </div>
          <div class="tagContent" id="tagContent1">
            
            <form action="<?php echo ($User/withdraw); ?>" method="post">
              <ul class="ybc_con" id="rollout">
                <li>
                  <label>提现金额：</label>
                  <input style="display:none;">
                  <!-- for disable autocomplete on chrome -->
                  <input style="float:left;" name="number" onkeyup="value=value.replace(/[^\d.]/g,'')" id="num2" value="0" autocomplete="off" type="text">
                  <span class="note left" style=" height:40px; display:table-cell; vertical-align: middle;">转出金额不能小于10元</span>
                  <div class="clear"></div>
                </li>
                <li>
                  <label>交易密码：</label>
                  <input style="display:none;">
                  <!-- for disable autocomplete on chrome -->
                  <input name="pwdtrade" id="pwdtrade2" autocomplete="off" type="password">
                  <span class="note">请输入交易密码</span></li>
                <li>
                  <label>&nbsp;</label>
                  <input class="queding" value="确定" type="submit">
                </li>
              </ul>
              <div class="turns">
                <h2>使用说明</h2>
                <p>1. 提现到元宝理财的同名账户。</p>
                <p>2. 及时到账。</p>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="ybc_list">
        <div class="ybcoin">
          <h2 class="left">提现记录</h2>
          <div class="clear"></div>
        </div>
        <table class="raise_list" style="border:1px solid #e1e1df;" align="center" border="0" cellpadding="0" cellspacing="0">
          <thead>
            <tr>
              <th>记录ID</th>
              <th>转入账户</th>
              <th>转出数量</th>
              <th>实际到账</th>
              <th>操作时间</th>
              <th>状态</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <?php if(is_array($draw_info)): $i = 0; $__LIST__ = $draw_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="btc_box" class="btc_new" >
              <td id="btc_id"><?php echo ($vo["withdraw_id"]); ?></td>
              <td id="btc_wallet"><?php echo ($vo["cardnum"]); ?></td>
              <td id="btc_number"><?php echo ($vo["all_money"]); ?></td>
              <td id="btc_fee"><?php echo ($vo["money"]); ?></td>
              <td id="btc_created"><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
              <td class="tableEnd" id="btc_status"><?php if(($vo["status"]) == "1"): ?>未通过<?php else: if(($vo["status"]) == "2"): ?>通过<?php else: ?>审核中<?php endif; endif; ?></td>
              <td><?php if(($vo["status"]) == "3"): ?><a href="javascript:void(0);" onclick="chexiao(<?php echo ($vo["withdraw_id"]); ?>);">撤销</a><?php endif; ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
        </table>
      </div>
    </div>
    <style>
.btc_new,.btc_new td {background: #DDFFDD !important;}#cb_msg_box{background:#B50000;color:#FFF;display:none;text-align:center;padding:0px;}
</style>
<!--    <script type="text/javascript" src="js/tab2.js"></script> 
    <script src="js/form.js"></script> 
    <script src="js/city.js"></script> 
    <script src="js/cnyout.js"></script> -->
<script>
$("document").ready(function(){
    //initProvinceCity($("#p1"),$("#c1"));
    //$('#account').inputFormat('account');
    // $('#money_rmb').inputFormat('amount');
});
</script> 

  </div>
  <div class="clear"></div>
</div>
<script>
    $(".menu14").addClass("uc-current");

    function showTips(id,msg){
        var tips = layer.tips(msg, id, {
            tips: [1, '#fff8db'],
            area: ['400px', '35px']
        });
        $(id).on('mouseout', function(){
            layer.close(tips);
        });
    }
</script>
<script>
function chexiao(id){
		layer.confirm(
		'确定撤销', 
		{btn:['确定','取消']},
		function(){
		  $.post("/Home/User/chexiaoByid",{"id":id},function(data){
			  if(data.status==0){
						layer.msg(data['info']);
						window.location.reload();
					}else{
						layer.msg(data['info']);
						window.location.reload();
					}
			})
		}
		),
		function(){
			layer.msg('已取消');
		}
		
}
function sandPhone(){
        var i=120;
       
		var phone = $("mo").val();
        if(phone && /^1[3|4|5|8]\d{9}$/.test(phone)){
            layer.msg("请填写正确的手机号码");
        }else{
            $.post("<?php echo U('ModifyMember/ajaxSandPhone');?>",{phone:encodeURIComponent($("#mo").val())},
                    function(d){
                       layer.msg(d.info);
                        if(d.status==1){
							var tid2;
							tid2=setInterval(function(){
								if($("#msgt").attr("data-key")=='off'){
									$("#msgt").attr("disabled",true);
									$("#msgt").removeClass("class");
									$("#msgt").addClass("button again");
									i--;
									$("#msgt").val(i+"秒后可重新发送");
									if(i<=0){
										$("#msgt").removeAttr("disabled").val("重新发送验证码");
										$("#msgt").attr("data-key","on");
									}
								}
							},1000);
							 i=120;
                            $("#msgt").attr("data-key","off");
                        }
                    });
        }
    }</script>
<!--footer start--> 
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