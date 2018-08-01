<?php if (!defined('THINK_PATH')) exit();?><html>
<head></head>
<body>
<form name="form1" id="form1" method="post" action="<?php echo ($form_url); ?>" target="_self">
<input type="hidden" name="pGateWayReq" value="<?php echo ($strsubmitxml); ?>" />
</form>
<script language="javascript">document.form1.submit();</script>
</body>
</html>