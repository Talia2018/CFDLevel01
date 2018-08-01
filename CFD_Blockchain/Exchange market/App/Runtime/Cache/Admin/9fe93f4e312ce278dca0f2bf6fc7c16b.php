<?php if (!defined('THINK_PATH')) exit();?>    <!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
	<meta name="renderer" content="webkit">
    <title>网站后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/iconfont/demo.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/iconfont/iconfont.css"/>
    <script type="text/javascript" src="/Public/Admin/js/libs/modernizr.min.js"></script>
	<script type="text/javascript" src="/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/Public/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/js/laydate/laydate.js"></script>
    
	<link type="text/css" href="/Public/Admin/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
    <link type="text/css" href="/Public/Admin/css/jquery-ui-timepicker-addon.css" rel="stylesheet" />
    <script type="text/javascript" src="/Public/Admin/js/jquery-ui-1.8.17.custom.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery-ui-timepicker-zh-CN.js"></script>

    <script>
(function ($) {
    // 汉化 Datepicker
    $.datepicker.regional['zh-CN'] =
    {
        clearText: '清除', clearStatus: '清除已选日期',
        closeText: '关闭', closeStatus: '不改变当前选择',
        prevText: '<上月', prevStatus: '显示上月',
        nextText: '下月>', nextStatus: '显示下月',
        currentText: '今天', currentStatus: '显示本月',
        monthNames: ['一月', '二月', '三月', '四月', '五月', '六月',
        '七月', '八月', '九月', '十月', '十一月', '十二月'],
        monthNamesShort: ['一', '二', '三', '四', '五', '六',
        '七', '八', '九', '十', '十一', '十二'],
        monthStatus: '选择月份', yearStatus: '选择年份',
        weekHeader: '周', weekStatus: '年内周次',
        dayNames: ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
        dayNamesShort: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
        dayNamesMin: ['日', '一', '二', '三', '四', '五', '六'],
        dayStatus: '设置 DD 为一周起始', dateStatus: '选择 m月 d日, DD',
        dateFormat: 'yy-mm-dd', firstDay: 1,
        initStatus: '请选择日期', isRTL: false
    };
    $.datepicker.setDefaults($.datepicker.regional['zh-CN']);
 
    //汉化 Timepicker
  $.timepicker.regional['zh-CN'] = {
    timeOnlyTitle: '选择时间',
    timeText: '时间',
    hourText: '小时',
    minuteText: '分钟',
    secondText: '秒钟',
    millisecText: '微秒',
    timezoneText: '时区',
    currentText: '现在时间',
    closeText: '关闭',
    timeFormat: 'hh:mm',
    amNames: ['AM', 'A'],
    pmNames: ['PM', 'P'],
    ampm: false
  };
  $.timepicker.setDefaults($.timepicker.regional['zh-CN']);
})(jQuery);
</script>
<style>
.iconfont{ padding-right:5px;}
.fsize{ font-size:15px;}
</style>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="<?php echo U('Index/index');?>" target="_blank">网站首页</a></li>
                <li><a href="<?php echo U('Index/infoStatistics');?>" target="_blank">全站统计信息</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="<?php echo U('Manage/index');?>">管理员</a></li>
                <li><a href="<?php echo U('Manage/pwdUpdate');?>">修改密码</a></li>
                <li><a href="<?php echo U('Login/loginout');?>">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
<div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                 <?php if(!empty($sys_nav)): ?><li>
                    <a href="#"><i class="iconfont">&#xe614;</i><span class="fsize">系统管理</span></a>
                    <ul class="sub-menu">
                        
                        	<?php if(is_array($sys_nav)): $i = 0; $__LIST__ = $sys_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="iconfont"><?php echo ($vo["nav_e"]); ?></i>&nbsp;<?php echo ($vo["nav_name"]); ?></a></li>
                            <!--<li><a href="system.html"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                            <li><a href="system.html"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                            <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>--><?php endforeach; endif; else: echo "" ;endif; ?>
                        
                    </ul>
                </li><?php endif; ?>
			   
			   <?php if(!empty($bank_nav)): ?><li>
                    <a href="#"><i class="iconfont">&#xe635;</i><span class="fsize">银行管理</span></a>
                    <ul class="sub-menu">
                        	<?php if(is_array($bank_nav)): $i = 0; $__LIST__ = $bank_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="iconfont"><?php echo ($vo["nav_e"]); ?></i>&nbsp;<?php echo ($vo["nav_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endif; ?>
				
               <?php if(!empty($common_nav)): ?><li>
                    <a href="#"><i class="iconfont">&#xe635;</i><span class="fsize">常用操作</span></a>
                    <ul class="sub-menu">
                        	<?php if(is_array($common_nav)): $i = 0; $__LIST__ = $common_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="iconfont"><?php echo ($vo["nav_e"]); ?></i>&nbsp;<?php echo ($vo["nav_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endif; ?>
                
                <?php if(!empty($user_nav)): ?><li>
                    <a href="#"><i class="iconfont">&#xe64d;</i><span class="fsize">会员管理</span></a>
                    <ul class="sub-menu">
                    
                        	<?php if(is_array($user_nav)): $i = 0; $__LIST__ = $user_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="iconfont"><?php echo ($vo["nav_e"]); ?></i>&nbsp;<?php echo ($vo["nav_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endif; ?>
				
                 <?php if(!empty($bonus_nav)): ?><li>
                    <a href="#"><i class="icon-font">&#xe018;</i><span class="fsize">分红管理</span></a>
                    <ul class="sub-menu">
                    
                        	<?php if(is_array($bonus_nav)): $i = 0; $__LIST__ = $bonus_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="icon-font">&#xe017;</i><?php echo ($vo["nav_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endif; ?>
				
                <?php if(!empty($zhongchou_nav)): ?><li>
                    <a href="#"><i class="iconfont">&#xe650;</i><span class="fsize">众筹管理</span></a>
                     <ul class="sub-menu">
                     
                        	<?php if(is_array($zhongchou_nav)): $i = 0; $__LIST__ = $zhongchou_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="iconfont"><?php echo ($vo["nav_e"]); ?></i>&nbsp;<?php echo ($vo["nav_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endif; ?>
                
                <?php if(!empty($finance_nav)): ?><li>
                    <a href="#"><i class="iconfont">&#xe6c8;</i><span class="fsize">财务管理</span></a>
                     <ul class="sub-menu">
                     
                        	<?php if(is_array($finance_nav)): $i = 0; $__LIST__ = $finance_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="iconfont"><?php echo ($vo["nav_e"]); ?></i>&nbsp;<?php echo ($vo["nav_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endif; ?>

                <?php if(!empty($trade_nav)): ?><li>
                        <a href="#"><i class="iconfont">&#xe631;</i><span class="fsize">交易管理</span></a>
                        <ul class="sub-menu">
                            <?php if(is_array($trade_nav)): $i = 0; $__LIST__ = $trade_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="iconfont"><?php echo ($vo["nav_e"]); ?></i>&nbsp;<?php echo ($vo["nav_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <!--<li><a href="<?php echo U('Trade/trade');?>"><i class="icon-font">&#xe017;</i>交易记录</a></li>-->
                            <!--<li><a href="<?php echo U('Trade/orders');?>"><i class="icon-font">&#xe017;</i>委托记录</a></li>-->
                        </ul>
                    </li><?php endif; ?>
                
                <?php if(!empty($wallet_nav)): ?><li>
                        <a href="#"><i class="iconfont">&#xe631;</i><span class="fsize">钱包币种管理</span></a>
                        <ul class="sub-menu">
                            <?php if(is_array($wallet_nav)): $i = 0; $__LIST__ = $wallet_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="iconfont"><?php echo ($vo["nav_e"]); ?></i>&nbsp;<?php echo ($vo["nav_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <!--<li><a href="<?php echo U('Trade/trade');?>"><i class="icon-font">&#xe017;</i>交易记录</a></li>-->
                            <!--<li><a href="<?php echo U('Trade/orders');?>"><i class="icon-font">&#xe017;</i>委托记录</a></li>-->
                        </ul>
                    </li><?php endif; ?>
                
                  <?php if(!empty($article_nav)): ?><li>
                        <a href="#"><i class="iconfont">&#xe6f7;</i><span class="fsize">文章管理</span></a>
                        <ul class="sub-menu">
                            <?php if(is_array($article_nav)): $i = 0; $__LIST__ = $article_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="iconfont"><?php echo ($vo["nav_e"]); ?></i>&nbsp;<?php echo ($vo["nav_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <!--<li><a href="<?php echo U('Trade/trade');?>"><i class="icon-font">&#xe017;</i>交易记录</a></li>-->
                            <!--<li><a href="<?php echo U('Trade/orders');?>"><i class="icon-font">&#xe017;</i>委托记录</a></li>-->
                        </ul>
                    </li><?php endif; ?>
                
                <?php if(!empty($admin_nav)): ?><li>
                        <a href="#"><i class="iconfont">&#xe64d;</i><span class="fsize">管理员管理</span></a>
                        <ul class="sub-menu">
                            <?php if(is_array($admin_nav)): $i = 0; $__LIST__ = $admin_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="iconfont"><?php echo ($vo["nav_e"]); ?></i>&nbsp;<?php echo ($vo["nav_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <!--<li><a href="<?php echo U('Trade/trade');?>"><i class="icon-font">&#xe017;</i>交易记录</a></li>-->
                            <!--<li><a href="<?php echo U('Trade/orders');?>"><i class="icon-font">&#xe017;</i>委托记录</a></li>-->
                        </ul>
                    </li><?php endif; ?>
                <?php if(!empty($tongji_nav)): ?><li>
                        <a href="#"><i class="iconfont">&#xe64d;</i><span class="fsize">统计</span></a>
                        <ul class="sub-menu">
                            <?php if(is_array($tongji_nav)): $i = 0; $__LIST__ = $tongji_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["nav_url"]); ?>"><i class="iconfont"><?php echo ($vo["nav_e"]); ?></i>&nbsp;<?php echo ($vo["nav_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <!--<li><a href="<?php echo U('Trade/trade');?>"><i class="icon-font">&#xe017;</i>交易记录</a></li>-->
                            <!--<li><a href="<?php echo U('Trade/orders');?>"><i class="icon-font">&#xe017;</i>委托记录</a></li>-->
                        </ul>
                    </li><?php endif; ?>
            </ul>
        </div>
    </div>
<script>
$(".sidebar-list li").children("a").on("click",function(){
	$(this).next(".sub-menu").toggle();
});
</script>

     <script type="text/javascript" charset="utf-8" src="/Public/kindeditor/kindeditor.js"></script>
	<script type="text/javascript" charset="utf-8" src="/Public/kindeditor/lang/zh_CN.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/kindeditor/plugins/prettify.js"></script>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('Index/index');?>">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">币种设置</span></div>
        </div>
        <div class="result-wrap">
            <form action="<?php echo U('Currency/add');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>币种详细信息设置</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tbody>
                            <tr>
                                <th width="15%"><i class="require-red">*</i>货币LOGO</th>
                                <td><img  style="height:200px;"src="<?php echo ($list["currency_logo"]); ?>"><input type="hidden" name="currency_logo" value="<?php echo ($list["currency_logo"]); ?>" class="common-text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>货币LOGO上传</th>
                                <td><input type="file" name="Filedata" class="common-text"></td>
                            </tr>
                                <tr>
                                    <th><i class="require-red">*</i>货币名称：</th>
                                    <td><input type="text" id="" value="<?php echo ($list["currency_name"]); ?>" size="85" name="currency_name" class="common-text"><input type="hidden" id="" value="<?php echo ($list["currency_id"]); ?>" size="85" name="currency_id" class="common-text"></td>
                                </tr>
                                 <tr>
                                    <th><i class="require-red">*</i>英文标识</th>
                                    <td><input type="text" id="" value="<?php echo ($list["currency_mark"]); ?>" size="85" name="currency_mark" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>显示排序</th>
                                    <td><input type="text" id="" value="<?php echo ($list["sort"]); ?>" size="85" name="sort" class="common-text"><i class="require-red">（在前端显示的排序，数值越小，排序越靠前）</i></td>
                                </tr>
                               <tr>
                                    <th><i class="require-red">*</i>最大(单次提币额度)</th>
                                    <td><input type="text" id="" value="<?php echo ($list["currency_all_tibi"]); ?>" size="85" name="currency_all_tibi" class="common-text"></td>
                                </tr>
								
								<tr>
                                    <th><i class="require-red">*</i>发行总量</th>
                                    <td><input type="text" id="" value="<?php echo ($list["currency_all_num"]); ?>" size="85" name="currency_all_num" class="common-text"><i class="require-red">（与最新价格乘积为总市值）</i></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>买入手续费</th>
                                    <td><input type="text" id="" value="<?php echo ($list["currency_buy_fee"]); ?>" size="85" name="currency_buy_fee" class="common-text">%</td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>卖出手续费</th>
                                    <td><input type="text" id="" value="<?php echo ($list["currency_sell_fee"]); ?>" size="85" name="currency_sell_fee" class="common-text">%</td>
                                </tr>
						     	 <tr>
                                    <th><i class="require-red">*</i>限制位数</th>
                                    <td><input type="text" id="" value="<?php echo ($list["currency_digit_num"]); ?>" size="85" name="currency_digit_num" class="common-text"></td>
                                </tr>
								<tr>
                                    <th><i class="require-red">*</i>链接地址</th>
                                    <td><input type="text" id="" value="<?php echo ($list["currency_url"]); ?>" size="85" name="currency_url" class="common-text"></td>
                                </tr>
								<tr>
                                    <th><i class="require-red">*</i>用户名</th>
                                    <td><input type="text" id="" value="<?php echo ($list["rpc_user"]); ?>" size="85" name="rpc_user" class="common-text"></td>
                                </tr>
								<tr>
                                    <th><i class="require-red">*</i>密码</th>
                                    <td><input type="text" id="" value="<?php echo ($list["rpc_pwd"]); ?>" size="85" name="rpc_pwd" class="common-text"></td>
                                </tr>
								<tr>
                                    <th><i class="require-red">*</i>地址</th>
                                    <td><input type="text" id="" value="<?php echo ($list["rpc_url"]); ?>" size="85" name="rpc_url" class="common-text"></td>
                                </tr>
								<tr>
                                    <th><i class="require-red">*</i>端口号</th>
                                    <td><input type="text" id="" value="<?php echo ($list["port_number"]); ?>" size="85" name="port_number" class="common-text"></td>
                                </tr>

									<tr>
                                    <th><i class="require-red">*</i>钱包密钥</th>
                                    <td><input type="text" id="" value="<?php echo ($list["qianbao_key"]); ?>" size="85" name="qianbao_key" class="common-text"><i class="require-red">*密钥妥善保存，一旦丢失，后果严重且找不回</i></td>
									
                                </tr>
								

								<tr>
                                    <th><i class="require-red">*</i>上线开关</th>
                                    <td>关闭上线：<input type="radio" name="is_line" value="0" <?php if(($list["is_line"]) == "0"): ?>checked="checked"<?php endif; ?> />
										开启上线：<input type="radio" name="is_line" value="1"  <?php if(($list["is_line"]) == "1"): ?>checked="checked"<?php endif; ?> />
									
									</td>
                                </tr>

                             	<tr>
                                    <th><i class="require-red">*</i>交易开关</th>
                                    <td>开启交易：<input type="radio" name="is_lock" value="0" <?php if(($list["is_lock"]) == "0"): ?>checked="checked"<?php endif; ?> />
										关闭交易：<input type="radio" name="is_lock" value="1"  <?php if(($list["is_lock"]) == "1"): ?>checked="checked"<?php endif; ?> />
									
									</td>
                                </tr>
									<tr>
                                    <th><i class="require-red">*</i>买入币种</th>
                                    <td><select name="trade_currency_id">
										 <option value="0">人民币</option>
										 <?php if(is_array($currency_currency)): $i = 0; $__LIST__ = $currency_currency;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["currency_id"]); ?>" <?php if(($list["trade_currency_id"]) == $vo["currency_id"]): ?>selected="selected"<?php endif; ?>><?php echo ($vo["currency_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</td>
                                </tr>
                               	<tr>
                                    <th><i class="require-red">*</i>货币详情链接</th>
                                    <td>
                                    	<input type="text" id="" value="<?php echo ($list["detail_url"]); ?>" size="85" name="detail_url" class="common-text">
									</td>
                                </tr>
                                <!--  <tr>
                                    <th><i class="require-red">*</i>币种说明</th>
                                    <td>	
                                    <textarea id="content3" value="" name="currency_content" class="common-text" style="width:610px;height:100px;">					<?php echo ($list["currency_content"]); ?>
                                    </textarea>							
									</td>
                                </tr>
                                 <tr>
                               		 <th><i class="require-red">*</i>货币详情图片上传</th>
                               		 <td><input type="file" name="pic" class="common-text"></td>
                           		 </tr>
                                 <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                               		 <th><i class="require-red">*</i>货币详情图片展示<br>(<a href="<?php echo U('Currency/delCurrencyPic',array('id'=>$vo['id']));?>">点此处删除此详情图片</a>)</th>
                               		 <td><img src='<?php echo ($vo["pic"]); ?>' style="height:200px;"></td>
                           		 </tr><?php endforeach; endif; else: echo "" ;endif; ?>-->
                                <tr>
                                    <th></th>
                                    <td>
                                        <input type="submit" value="提交" class="btn btn-primary btn6 mr10">
                                        <a href="<?php echo U('Currency/index');?>"><input type="button" value="返回"  class="btn btn6"></a>
                                    </td>
                                </tr>
                            </tbody></table>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
<script>
$(".sub-menu").eq(2).show();
$(".sub-menu").eq(2).children("li").eq(1).addClass("on");
</script>
<script>									
	KindEditor.ready(function(K) {
		window.editor1 = K.create('#content3');	
	});
</script>