<?php
define('IN_SK',true);
require_once('./includes/init.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓-物力支持</title>
<meta name="keywords" content="孩子"/> 
<meta name="description" content="孩子的健康和未来,物力支持"/>
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
    <div class="tags png"><div class="tags-content png"><ul><li><a href="donate.php"><img src="image/tags/into_01.png" class="png"/></a></li><li class="tagon"><a href="pro_support.php"><img src="image/tags/into_02.png" class="png"/></a></li><li><a href="message.php"><img src="image/tags/into_03.png" class="png"/></a></li></ul></div><div class="tags-right png"></div></div> 
</div>
</div>

<div class="w bgfff">
<div id="content">

<div class="w970 ol pb30 pt40">
	<div class="fl pl210 pt20 pb20 w350">
   <!-- upload data-->        
    <table cellpadding="0" cellspacing="0" border="0" class="mau pro_support mb20 f16 drophack" style="margin-left:0;">
    <tr><td>姓&nbsp;&nbsp;&nbsp;&nbsp;名</td><td><input type="text" class="comm-text" value="请填写您的称呼" id="name" /></td></tr>
    <tr><td>性&nbsp;&nbsp;&nbsp;&nbsp;别</td><td><ul class="checkbox" comment="usex">
    	<li rel="0" class="on fl pr10">男</li><li rel="1" class="fl">女</li></ul>
        <input type="hidden" id="usex" value="0" />
    </td></tr>
    <tr><td>证件类型</td><td><div class="dropdownlist card" comment="card" style="z-index:10;"><span class="title"><span class="show">身份证</span></span>
    						<ul><li>身份证</li><li>护照</li></ul>
    						<input type="hidden" id="card" name="card" value="" /></div>
    </td></tr>
    <tr><td>证件号码</td><td><input type="text" class="comm-text" value="请填写您的证件" id="cardinfo"/></td></tr>
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
       <tr><td>联系电话</td><td><input type="text" class="comm-text" value="请填写您的联系方式" id="phone" /><br />
<span class="f12">（我们会在7天内与您联系相关事宜）</span></td></tr>
    	<tr><td>电子邮件</td><td><input type="text" class="comm-text" value="请填写您的称呼" id="email"/></td></tr>
    	<tr><td>捐献物品</td><td><input type="text" class="comm-text" value="请填写您的捐献物品" id="pro" /></td></tr>
    	<tr><td>损献数量</td><td><input type="text" class="comm-text" value="请填写您的捐献数量" id="num" /></td></tr>
    </table>
   
    <div class="f14 pb10">运送费用</div>
    <ul class="checkbox" comment="charge">
    	<li rel="1" class="on">自理</li>
        <li rel="2" >家百浓承担</li>
    </ul>
    
    <input type="hidden" id="charge" value="1" />
    
    <div class="pt20">
        	<div class="tl f12">
            我们的地址是：上海市浦东新区森林村森塘路西凌家宅29号<br/>
如果您方便直接将物品送至家百浓，我们将感激不尽 </div>
            <div class="cb pt30 tl">
            	<a href="#"><img src="image/submit2.jpg" border="0" width="120" height="35" id="prosubmit" /></a>
            </div>
        </div>
    
    </div>
    
    <div class="fl pt20 w350 f14">
    	<p>家百浓儿童中心感谢您的爱心物资捐赠，请详细填写具体捐赠内容及联系方式，中心工作人员将于接受到此申请7日内与您进行电话联系，确认捐赠信息。收到物资捐赠后，我们将以EMAIL和电话或短信形式给予确认。如您有任何问题或需获得更多咨询信息，请邮件至：
        <!-- update by rick 201201030<a href="mailto:wei.wang@foreverloveinchina.com"> wei.wang@foreverloveinchina.com</a> 或 -->
<a href="mailto:max.liu@foreverloveinchina.com">max.liu@foreverloveinchina.com</a></p>

    <!--<p>家百浓儿童中心感谢您的爱心捐赠，目前本中心只接受银行转账方式，因此请详细查看以下信息，以免发生错误。我们将在接受到您的捐赠信息后7天内与您进行电话联系确认详细信息。</p>-->
         <!-- <p class="pt10">
          	开户银行：浦发银行商城路支行<br />
          	银行账号：6225220112279088<br />
          	开户者：汪薇
          </p>-->
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
	<img src="image/into_success.jpg" border="0" usemap="#Map" class="mau" />
    <map name="Map">
      <area shape="rect" coords="252,139,307,162" href="pro_support.php">
      <area shape="rect" coords="490,16,512,39" href="pro_support.php">
    </map>
 </div>
<!-- result end-->
<!-- error -->
<div class="w650 ol pt50 pb50 tc none" id="error">
	<img src="image/info_error.jpg" border="0" usemap="#Map2" class="mau" />
    <map name="Map2">
      <area shape="rect" coords="175,139,225,158" class="curp" href="#">
      <area shape="rect" coords="362,16,382,37" class="curp" href="#">
    </map>
 </div>
<!-- error  end-->
</div>
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
<script language="javascript">
$(function(){
	$(".right_jpannel").jScrollPane({dragMaxHeight:13,scrollbarWidth:15});	
	bindProduct();
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