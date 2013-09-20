<?php
define('IN_SK',true);
require_once('./includes/init.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓-爱心捐献</title>
<meta name="keywords" content="孩子"/> 
<meta name="description" content="孩子的健康和未来,爱心捐献"/>
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
    <div class="tags png"><div class="tags-content png"><ul><li class="tagon png"><a href="donate.php"><img src="image/tags/into_01.png" class="png"/></a></li><li><a href="pro_support.php"><img src="image/tags/into_02.png" class="png" /></a></li><li><a href="message.php"><img src="image/tags/into_03.png" class="png" /></a></li></ul></div><div class="tags-right png"></div></div> 
</div>
</div>

<div class="w bgfff">
<!-- content -->
<div id="content">
<div class="w970 ol pt40 pb30">
	
	<div class="fl pl210 pt20 pb20 f16 w350">
    
    <table cellpadding="0" cellspacing="0" border="0" class="pro_support mb20 drophack-2">
    <tr><td>姓&nbsp;&nbsp;&nbsp;&nbsp;名</td><td><input type="text" class="comm-text" value="请填写您的称呼" id="name"/></td></tr>
    <tr><td>性&nbsp;&nbsp;&nbsp;&nbsp;别</td><td><ul class="checkbox" comment="usex">
    	<li class="on fl pr10" rel="0">男</li><li class="fl" rel="1">女</li></ul></td></tr>
    <input type="hidden" id="usex" value="0" />
    <tr><td>证件类型</td><td><div class="dropdownlist card" comment="card" style="z-index:10;"><span class="title"><span class="show">身份证</span></span>
    <ul><li>身份证</li><li>护照</li></ul>
    <input type="hidden" id="card" name="card" value="身份证" />
    </div></td></tr>
    <tr><td>证件号码</td><td><input type="text" class="comm-text" value="请填写您的证件信息" id="cardinfo"/></td></tr>
    <tr><td>国&nbsp;&nbsp;&nbsp;&nbsp;籍</td><td><div class="dropdownlist card" comment="country" style="z-index:9;"><span class="title"><span class="show">国籍</span></span>
    <ul><li>中国</li><li>其他</li></ul>
    <input type="hidden" id="country" name="country" value="" />
    </div></td></tr>
    <tr><td>宗教信仰</td><td><div class="dropdownlist card" style="z-index:8;" comment="religion"><span class="title"><span class="show">宗教信仰</span></span>
    <ul><li>基督教</li><li>天主教</li><li>回教</li><li>佛教</li><li>道教</li><li>无</li><li>其他</li></ul>
    <input type="hidden" id="religion" name="religion" value="" />
    </div></td></tr>
    <tr><td>教育程度</td><td>
    <div class="dropdownlist card" style="z-index:7;" comment="educate"><span class="title"><span class="show">教育程度</span></span>
    <ul><li>硕士以上</li><li>硕士</li><li>大学</li><li>大专</li><li>高中</li><li>中学</li><li>小学</li><li>其他</li></ul>
    <input type="hidden" id="educate" name="educate" value="" />
    </div>
    </td></tr>
    <tr><td>电子邮件</td><td><input type="text" class="comm-text" value="请填写您的电子邮件" id="email"/></td></tr>
    <tr><td>联系电话</td><td><input type="text" class="comm-text" value="请填写您的联系电话" id="phone" /></td></tr>
    <tr><td>捐赠金额</td><td><input type="text" class="comm-text fl" value="请填写您的捐赠金额" id="money" />
    <div class="dropdownlist card" comment="moneytype"><span class="title"><span class="show">人民币</span></span>
    <ul><li>美元</li><li>人民币</li></ul>
    <input type="hidden" id="moneytype" name="moneytype" value="" />
    </div>
    </td></tr>
    <!--<tr><td>损献数量</td><td><input type="text" class="comm-text" value="请填写您的捐献数量" id="num" /></td></tr>-->
    </table>
    
    <div class="f16 pb10 db cb">是否需要发票</div>
    <ul class="checkbox ol" comment="charge">
    	<li rel="1" class="on">不要</li>
        <li rel="2" >服务性发票</li>
        <li rel="3" >增值税发票是否需要发票<span class="f14">（需增加5%税点）</span></li>
    </ul>
    <input type="hidden" id="charge" value="0" />
    
    <div class="pt30">
    <a href="#" class="mt40"><img src="image/submit2.jpg" name="donatesubmit" width="120" height="35" border="0" id="donatesubmit"/></a></div>
    </div>
    <div class="fl pt20 w350 f14">
    	
    <p>家百浓儿童中心感谢您的爱心捐赠，目前本中心只接受银行转账方式，因此请详细查看以下信息，以免发生错误。我们将在接受到您的捐赠信息后7天内与您进行电话联系确认详细信息。</p>
          <p class="pt10">
          	开户银行：浦发银行商城路支行<br />
          	银行账号：6225220112279088<br />
          	开户者：汪薇
          </p>
          <p class="pt10">
          	如您选择邮寄现金或支票的方式，请邮寄至以下地址：
          </p>
          <p class="pt10">
          	上海市浦东新区森林村森塘路西凌家宅29号<br />（靠近地铁二号线远东大道站）<br />
          	邮编:201202<br />
          </p>
    </div>
</div>
</div>
<!-- result -->
<div class="w650 ol pt50 pb50 tc none" id="result">
	<img src="image/pro_success.jpg" border="0" usemap="#Map" class="mau" />
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