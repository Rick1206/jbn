<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓</title>
<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
</head>
<body class="bg2">
<?php
	$navNum = 6;
	include "head.php"; 
?>
<div class="w">
<div class="w960 pr">
    <div class="tags"><div class="tags-content png"><ul><li class="tagon png"><a href="donate.php"><img src="image/tags/into_01.png" /></a></li><li><a href="pro_support.php"><img src="image/tags/into_02.png" /></a></li><li><a href="message.php"><img src="image/tags/into_03.png" /></a></li></ul></div><div class="tags-right png"></div></div> 
</div>
</div>

<div class="w bgfff">
<!-- content -->
<div id="content">
<div class="w970 ol pt20 pb30">

	<div class="fl pl210 pt40 pb20 f14">
    <table cellpadding="0" cellspacing="0" border="0" class="mau pro_support mb20 fl">
    <tr><td>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</td><td><input type="text" class="comm-text" value="请填写您的称呼" id="name"/></td></tr>
    <tr><td>联系电话</td><td><input type="text" class="comm-text" value="请填写您的联系方式" id="phone" />（我们会在7天内与您联系相关事宜）</td></tr>
    <tr><td>捐献物品</td><td><input type="text" class="comm-text" value="请填写您的捐献物品" id="pro" /></td></tr>
    <tr><td>损献数量</td><td><input type="text" class="comm-text" value="请填写您的捐献数量" id="num" /></td></tr>
    </table>
    <div class="f14 pb10 db cb">是否需要发票</div>
    <ul class="checkbox w400 fl" comment="charge">
    	<li class="on">不要</li>
        <li>服务性发票</li>
        <li>增值税发票是否需要发票（增值税发票需增加5%税点）</li>
    </ul>
    <input type="hidden" id="charge" value="0" />
    <a href="#" class="fl mt40"><img src="image/submit3.jpg" border="0" id="donatesubmit"/></a>
    </div>
</div>
</div>
<!-- result -->
<div class="w650 ol pt50 pb50 tc none" id="result">
	<img src="image/into_success.jpg" border="0" usemap="#Map" class="mau" />
    <map name="Map">
      <area shape="rect" coords="252,139,307,162" href="donate.php" />
      <area shape="rect" coords="490,16,512,39" href="donate.php" />
    </map>
 </div>
<!-- result  end-->
<!-- error -->
<div class="w650 ol pt50 pb50 tc none" id="error">
	<img src="image/info_error.jpg" border="0" usemap="#Map2" class="mau" />
    <map name="Map2">
      <area shape="rect" coords="175,139,225,158" class="curp" href="#">
      <area shape="rect" coords="362,16,382,37" class="curp" href="#" >
    </map>
</div>
<!-- error  end-->
</div>
<!-- content end -->
<div class="w ol pt50 pb20 tags-bottom"></div>

<!-- footer -->
<?php
	include "foot.php"; 
?>
<!-- footer -->
</body>
</html>
<script language="javascript" src="script/jquery-1.5.1.min.js" type="text/javascript"></script>
<script language="javascript" src="script/common.js" type="text/javascript"></script>
<script language="javascript" src="script/action.js" type="text/javascript"></script>
<script language="javascript" src="script/jScrollPane.js" type="text/javascript"></script>
<script language="javascript" src="script/jquery.mousewheel.js" type="text/javascript"></script>
<script language="javascript" src="script/jquery.boxy.js" type="text/javascript"></script>
<script language="javascript">
$(function(){
	$(".right_jpannel").jScrollPane({dragMaxHeight:13,scrollbarWidth:15});
	bindDonate();
	bindErrorBtn();
});
</script>
<!--[if IE 6]>
<script language="javascript" src="script/DD_belatedPNG.js"></script>
<script>
	DD_belatedPNG.fix('.png,.menu li a');
    document.execCommand("BackgroundImageCache",false,true);
</script>
<![endif]-->