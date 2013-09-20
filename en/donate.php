<?php
define('IN_SK',true);
require_once('../includes/init.php');
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
    <tr><td>Name</td><td><input type="text" class="comm-text" value="Enter your Name" id="name"/></td></tr>
    <tr><td>Gender</td><td><ul class="checkbox" comment="usex">
    <li class="on fl pr10" rel="0">Male</li><li class="fl" rel="1">Female</li></ul><input type="hidden" id="usex" value="0" /> </td></tr>
    
    <tr><td>Type of ID</td><td><div class="dropdownlist card" comment="card" style="z-index:10;"><span class="title"><span class="show">Identity card</span></span>
    <ul><li>Identity card</li><li>Passport</li></ul>
    <input type="hidden" id="card" name="card" value="身份证" />
    </div></td></tr>
    <tr><td>ID No. </td><td><input type="text" class="comm-text" value="Enter your ID No." id="cardnumber"/></td></tr>
    <tr><td>Nationality</td><td><div class="dropdownlist card" comment="country" style="z-index:9;"><span class="title"><span class="show">Nationality</span></span>
    <ul><li>China</li><li>Others</li></ul>
    <input type="hidden" id="country" name="country" value="" />
    </div></td></tr>
    <tr><td>Faith</td><td><div class="dropdownlist card" style="z-index:8;" comment="religion"><span class="title"><span class="show">Faith</span></span>
    <ul><li>Christian</li><li>Catholicism</li><li>Islam</li><li>Buddhism</li><li>Taoism</li><li>None</li><li>Others</li></ul>
    <input type="hidden" id="religion" name="religion" value="" />
    </div></td></tr>
    <tr><td>Education</td><td>
    <div class="dropdownlist card" style="z-index:7;" comment="educate"><span class="title"><span class="show">Education</span></span>
    <ul><li>Master or above</li><li>Master</li><li>University</li><li>College</li><li>High School</li><li>Middle School</li><li>Primary School</li><li>Others</li></ul>
    <input type="hidden" id="educate" name="educate" value="" />
    </div>
    </td></tr>
    <tr><td>Email</td><td><input type="text" class="comm-text" value="Enter your email" id="email"/></td></tr>
    <tr><td>Tel</td><td><input type="text" class="comm-text" value="Enter your tel" id="phone" /></td></tr>
    <tr><td>Amount of donation </td><td><input type="text" class="comm-text fl" value="Enter your donation amount" id="money" />
    <div class="dropdownlist card" comment="moneytype"><span class="title"><span class="show">CNY</span></span>
    <ul><li>USD</li><li>CNY</li></ul>
    <input type="hidden" id="moneytype" name="moneytype" value="" />
    </div>
    </td></tr>
    <!--<tr><td>损献数量</td><td><input type="text" class="comm-text" value="请填写您的捐献数量" id="num" /></td></tr>-->
    </table>
    
    <div class="f16 pb10 db cb">Do you need an invoice? </div>
    <ul class="checkbox ol" comment="charge">
    	<li rel="1" class="on">No</li>
        <li rel="2" >Service Invoice</li>
        <li rel="3" >Do you  need VAT invoice(5% tax points added )? </span></li>
    </ul>
    <input type="hidden" id="charge" value="0" />
    
    <div class="pt30">
    <a href="#" class="mt40"><img src="image/submit2.jpg" name="donatesubmit" width="120" height="35" border="0" id="donatesubmit"/></a></div>
    </div>
    <div class="fl pt20 w350 f14">
    	
    <p>Thank you for your donation. At this moment, for cash donations, Forever Love Children Center only accepts bank wiring. Please use the following bank account information carefully to prevent any error. We will confirm with you within 7 days after receiving your donation.
</p>
          <p class="pt10">
          Bank Name: <br/>Shanghai Pudong Development Bank, Shang-Cheng Road Branch<br/>
Bank Account: 6225220112279088<br/>
Name of the Account: Wang Wei

          </p>
          <p class="pt10">
          	If you want to send cash or check to us, please send to: 
          </p>
          <p class="pt10">
          	
No. 29 Xi Ling Jia Zhai, Sen-Tang Road, Sen-Lin Village, Pudong New District, Shanghai(near Yuandong Avenue Station of Metro Line 2)<br/>
Postal code: 201202
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