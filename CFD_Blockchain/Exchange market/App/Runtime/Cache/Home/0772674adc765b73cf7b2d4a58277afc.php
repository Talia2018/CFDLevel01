<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
<link rel="stylesheet" type="text/css" href="/Public/Home/css/reset.css">
<link rel="stylesheet" type="text/css" href="/Public/Home/css/zcpc.css">
<script src="/Public/Home/js/zc_hm.js">
</script><script type="text/javascript" src="/Public/Home/js/zc_jquery.js"></script>
<script type="text/javascript" src="/Public/Home/js/zc_common.js"></script>
<script type="text/javascript" src="/Public/plugin/Js/layer/layer.min.js"></script>
<style type="text/css">
.jinduline{z-index: 3;}
 .vip_header1 {
        background: #fafafa;
    }
    .vip_user1 {
        position: relative;
        font-size:16px;
        padding:10px 0px 10px 20px;
    }
    .vip_stop1{
        line-height:41px;
    }
    .vip_upgrade ul li{
        line-height:40px;
    }
    .vip_upgrade .left {
        text-align: right;
        width: 405px;
    }
    .vip_upgrade .right {
        width: 575px;
    }
    .vip_upgrade .right a {
        color:#F60;
    }
    .vip_upgrade .right a:hover {
        color:#F90;
    }
    input{ height:25px;}
    .jilu table td{ text-align:center;}
    .pay-m-2 a:hover{ color:#fff !important;}

</style>
<!--top end-->
<div class="acountbd">
    <div class="main clearfix">
        <h1 class="programheadtitle">[认购]<?php echo ((isset($list["title"]) && ($list["title"] !== ""))?($list["title"]):'认购项目'); ?></h1>
        <div class="pcdeleft">
            <div class="pcdetpic">
                <img style=" width:830px; height:445px;" src="<?php echo ((isset($list["url2"]) && ($list["url2"] !== ""))?($list["url2"]):''); ?>" id="sim229784" class="main_img">
            </div>
            <div class="pcdetinfotxt">
                <ul class="pcinfotxtnav">
                    <li data-id="1" class="current">项目详情</li>
                    <li data-id="3">项目进展</li>
                    <li data-id="2">文件下载</li>
                </ul>
                <div id="info_1" class="infodata" style="display:block;">
                    <?php echo ((isset($list["info"]) && ($list["info"] !== ""))?($list["info"]):'此项目暂无详情简介'); ?>
                </div>
                <div id="info_2" class="infodata" style="display:none;height:100px;">
                   <?php if(!empty($list["wenjian_url"])): ?><a  href="<?php echo ($list["wenjian_url"]); ?>"><input type="button"  value="文件下载"  style="border:1px solid #999;text-align:center;padding:5px 10px 5px 10px;height: 30px;margin-left:100px; margin-top:30px; background:#f70; color: #fff; border-radius: 5px;
"  /></a><?php endif; ?>
                </div>
                <div id="info_3" class="infodata">
                    <div style="height: 540px;" class="jindubox">

                        <div class="jinduline"></div>
                        <div class="jindustate"><span><?php if(($list["status"]) == "0"): ?>项目未开始<?php endif; if(($list["status"]) == "1"): ?>项目进行中...<?php endif; if(($list["status"]) == "2"): ?>项目完成<?php endif; ?></span></div>
                        <div class="jinduitem">
                            <?php if(($list["status"]) > "1"): ?><div style="right: 50%; bottom: 305px; margin-right: 1px; padding-right: 50px;" class="jditem jditem4" data-item="4">
                                    <i style="right: 0px; background-image: url(&quot;https://imgm.touchouwang.net/public/p_image/jingdu_2.png&quot;);" class="danshu">04</i>
                                    <h6 style="padding-top:10px;">认购成功</h6>
                                    <p><?php echo (date('Y-m-d',$list["end_time"])); ?></p>
                                </div><?php endif; ?>
                            <?php if(($list["status"]) > "1"): ?><div style="left: 50%; bottom: 245px; margin-left: 1px; padding-left: 50px;" class="jditem jditem3" data-item="3">
                                    <i style="left: 0px;" class="danshu">03</i>
                                    <h6 style="padding-top:10px;">认购结束</h6>
                                    <p><?php echo (date('Y-m-d',$list["end_time"])); ?></p>
                                </div><?php endif; ?>
                            <?php if(($list["status"]) > "0"): ?><div style="right: 50%; bottom: 185px; margin-right: 1px; padding-right: 50px;" class="jditem jditem2" data-item="2">
                                    <i style="right: 0px; background-image: url(&quot;https://imgm.touchouwang.net/public/p_image/jingdu_2.png&quot;);" class="danshu">02</i>
                                    <h6 style="padding-top:10px;">认购进行中</h6>
                                    <p><?php echo (date('Y-m-d',$list["end_time"])); ?>----</p>
                                </div><?php endif; ?>
                            <div style="left: 50%; bottom: 125px; margin-left: 1px; padding-left: 50px;" class="jditem jditem1" data-item="1">
                                <i style="left: 0px;" class="danshu">01</i>
                                <h6 style="padding-top:10px;">认购开启</h6>
                                <p><?php echo (date('Y-m-d',$list["add_time"])); ?></p>
                            </div>
                            <div class="jindustate" style="top: 450px;"><span>初创项目<p style="text-align:center"><?php echo (date('Y-m-d',$list["ctime"])); ?></p></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pcderight">

            <div class="programinfo">
                <h2>项目基本资料<i></i></h2>
                <table class="actab5">
                    <tbody>
                    <tr>
                        <td>总量：<span><?php echo ((isset($list["num"]) && ($list["num"] !== ""))?($list["num"]):'0.00'); ?>个</span></td>
                        <td>剩余：<span><?php echo ((isset($list["deal"]) && ($list["deal"] !== ""))?($list["deal"]):'0.00'); ?>个</span></td>
                    </tr>
                    <?php if(!empty($_SESSION['USER_KEY_ID'])): ?><tr>
                            <td>限购：<span><?php echo ((isset($list["limit_count"]) && ($list["limit_count"] !== ""))?($list["limit_count"]):'0.00'); ?>次</span></td>
                            <td>已购：<span><?php echo ((isset($list["buy_count"]) && ($list["buy_count"] !== ""))?($list["buy_count"]):'0'); ?>次</span></td>
                        </tr>
                        <tr>
                            <td>限购：<span><?php echo ((isset($list["limit"]) && ($list["limit"] !== ""))?($list["limit"]):'0.00'); ?>个</span></td>
                            <td>已购：<span><?php echo ((isset($num_buy) && ($num_buy !== ""))?($num_buy):'0.00'); ?>个</span></td>
                        </tr><?php endif; ?>
                    <tr>
                        <td>购买币种：<span><?php echo ($list["buy_name"]); ?></span></td>
                        <td>价格：<span><?php echo ((isset($list["price"]) && ($list["price"] !== ""))?($list["price"]):'0.00'); ?></span></td>
                    </tr>
                    <tr>
                        <td>成功比例：<span><?php echo ((isset($list["zhongchou_success_bili"]) && ($list["zhongchou_success_bili"] !== ""))?($list["zhongchou_success_bili"]):'100'); ?>%</span></td>
                        <td><div class="yuyuebox_1">
                    		<div class="pclastdate2">
                        	<p class="pcfenpost pcfenpost2">
                            <?php if(($list["status"]) == "0"): ?><span class="pctimeico">尚未开始</span><?php endif; ?>
                            <?php if(($list["status"]) == "1"): ?><span class="pctimeico">认购中</span><?php endif; ?>
                            <?php if(($list["status"]) == "2"): ?><span class="pctimeico">已结束</span><?php endif; ?>
                        	</p>
                    		</div>
                			</div>
                          </td>  
                    </tr>
                    </tbody></table>
               
            </div>
            <?php if(($list["status"]) == "0"): ?><div class="programinfo programinfo2">
                    <h2>我要投资</h2>
                    <div class="pay-m-2">
                        <button type="button" class="btn-play-1" disabled="disabled">认购未开始</button>
                        <p>该项目已<strong>暂未开放</strong>不支持购买，请关注其他项目</p>
                    </div>
                </div><?php endif; ?>

            <?php if(($list["status"]) == "1"): if(!empty($_SESSION['USER_KEY_ID'])): ?><div class="programinfo programinfo2">
                        <h2>我要投资</h2>
                        <form action="<?php echo U('Zhongchou/run');?>" method="post" id="buy_form">
                            <div class="pay-m-1">
                                <p>
                                    <ins>账户余额：</ins>
                                    <span id="myMon"><?php echo (floatval("$buy_num")); ?></span><?php echo ($list["buy_mark"]); ?>
                                    <a href="<?php echo U('User/index');?>" class="pay-recharge-btn">充值</a>
                                </p>
                                <p>
                                    <ins>认购数量：</ins>
                                      <input value="<?php echo ((isset($list["min_limit"]) && ($list["min_limit"] !== ""))?($list["min_limit"]):'0'); ?>" class="txt-pay-1" id="num" name="num" type="number" onkeyup="sjmoney();"><span style="font-size:10px;">&nbsp;&nbsp;个(最少购买<?php echo (number_format($list["min_limit"],0)); ?>个)</span> 
                                </p>
                         
                                <p>
                                    <ins>实际支付金额：</ins>
                                    <span id="manjianhou"><?php echo (number_format($list['min_limit']*$list['price'],0)); ?></span><?php echo ($list["buy_mark"]); ?>
                                </p>
                            </div>
                            <div class="pay-m-2">
                                <input type="button" class="btn-play-1" id="zhongchourun" onclick="zhongchou();" value="众筹">
                            </div>
                        </form>
                    </div>
                    <?php else: ?>
                    <div class="programinfo programinfo2">
                        <h2>我要投资</h2>
                        <div class="pay-m-1">
                            <p>
                                <ins>账户余额：</ins>
                                暂未登录，<a href="<?php echo U('Login/index');?>">登录</a> 后查看
                            </p>
                        </div>

                    </div><?php endif; endif; ?>

            <?php if(($list["status"]) == "2"): ?><div class="programinfo programinfo2">
                    <h2>我要投资</h2>
                    <div class="pay-m-2">
                        <button type="button" class="btn-play-1" disabled="disabled">认购结束</button>
                        <p>该项目已<strong>完成</strong>不支持购买，请关注其他项目</p>
                    </div>
                </div><?php endif; ?> 
			<?php if(($list["status"]) == "3"): ?><div class="programinfo programinfo2">
                    <h2>我要投资</h2>
                    <div class="pay-m-2">
                        <button type="button" class="btn-play-1" disabled="disabled">认购结束</button>
                        <p>该项目已<strong>完成</strong>不支持购买，请关注其他项目</p>
                    </div>
                </div><?php endif; ?>
			
            <?php if(!empty($_SESSION['USER_KEY_ID'])): ?><div class="programinfo programinfo2 jilu">
                    <h2>投资记录</h2>
                    <table style=" width:348px; margin-top:10px;">
                        <thead>
                        <tr style=" height:25px; background-color:#f60; color:#FFF;">
                            <th>次数</th>
                            <th>金钱</th>
                            <th>数量</th>
                            <th>总金额</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($log)): $key = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><tr>
                                <td><?php echo ($key); ?></td>
                                <td><?php echo ((isset($vo["price"]) && ($vo["price"] !== ""))?($vo["price"]):'0.00'); ?></td>
                                <td><?php echo ((isset($vo["num"]) && ($vo["num"] !== ""))?($vo["num"]):'0.00'); ?></td>
                                <td><?php echo ((isset($vo["count"]) && ($vo["count"] !== ""))?($vo["count"]):'0.00'); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="programinfo programinfo2">
                    <h2>投资记录</h2>
                    <p class="pay-m-1" style="text-align:center;">暂未登录，<a href="<?php echo U('Login/index');?>">登录</a> 后查看</p>
                </div><?php endif; ?>
        </div>
    </div>
</div>
<script>
    $(".menu6").addClass("uc-current");
    $(".pcinfotxtnav").children("li").on("click",function(){
        var n =$(this).index();
        $(this).addClass("current").siblings().removeClass("current");
        if(n==0){
            $("#info_1").show();
            $("#info_2").hide();
            $("#info_3").hide();
        }
        if(n==1){
            $("#info_3").show();
            $("#info_1").hide();
            $("#info_2").hide();
        }
        if(n==2){
            $("#info_2").show();
            $("#info_1").hide();
            $("#info_3").hide();
        }
    });
</script>
<script>
    function zhongchou(){
        var limit = <?php echo ($list["limit"]); ?>;
        var deal = <?php echo ($list["deal"]); ?>;
        var price = <?php echo ($list["price"]); ?>;
        var min_limit = <?php echo ($list["min_limit"]); ?>;
        var id=<?php echo ($id); ?>;
        var buy_currency_id = <?php echo ($list["buy_currency_id"]); ?>;
        if($("#num").val()<min_limit){
            layer.msg("认筹数量不能小于最小认筹数量");
            $("#num").val("");
        }
        if($("#num").val()>deal){
            layer.msg("认筹数量不能超过剩余数量");
            $("#num").val("");
        }
        if($("#num").val()>limit){
            layer.msg("认筹数量不能超过限购数量");
            $("#num").val("");
        }
       layer.confirm('确定认筹？', {
  btn: ['确定','取消'], //按钮
  title: '提示'
}, function(){
  $.post("<?php echo U('Zhongchou/run');?>",{num:$("#num").val(),id:id,buy_currency_id:buy_currency_id},function(data){
            layer.msg(data.info);
            setTimeout(function () {
                window.location.reload();
            }, 2000);
        })
}, function(){
  layer.msg('已取消');
});
    }
    function sjmoney(){
        var price = <?php echo ($list["price"]); ?>;
        $("#manjianhou").text($("#num").val()*price);
    }
</script>
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
<!--footer end-->
<!--footer end-->