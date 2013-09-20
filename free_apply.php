<?php
	require_once('./phpmailer/class.phpmailer.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓-义工招募</title>

<meta name="keywords" content="孩子"/> 
<meta name="description" content="孩子的健康和未来,义工招募"/>

<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
<link type="text/css" rel="stylesheet" href="css/le-frog/jquery-ui-1.8.20.custom.css" />
</head>
<body class="bg2">
<?php
	$navNum = 7;
	include "head.php"; 
?>
<div class="w bgfff pt40">
<div id="content">
<div class="w600 mau f14">
<p>感谢您报名参加家百浓儿童救助中心义工工作，请如实填写以下个人信息，以方便中<br />心根据实际情况安排您的工作。我们将于收到义工申请后7个工作日内与您联系，商<br />谈具体事宜。
如有任何不清楚的地方请发送电子邮件至：<br /> max.liu@foreverloveinchina.com</p>
</div>
<div class="w600 mau ol pb20">
<!-- update by rick 2012 0809 -->
	<div class="pt40 pb20" style="width:235px;" >   
     <table cellpadding="0" cellspacing="0" border="0" class="pro_support mb10 f14">
    <tr><td>姓&nbsp;&nbsp;&nbsp;&nbsp;名</td><td><input type="text" class="comm-text" value="请填写您的称呼" id="uname" /></td></tr>
    <tr><td>性&nbsp;&nbsp;&nbsp;&nbsp;别</td><td><ul class="checkbox" comment="usex">
    	<li rel="0" class="on fl pr10">男</li><li rel="1" class="fl">女</li></ul>
        <input type="hidden" id="usex" value="0" />
    </td></tr>
    <tr><td>证件类型</td><td><div class="dropdownlist card" comment="card" style="z-index:10;"><span class="title"><span class="show">身份证</span></span>
    <ul><li>身份证</li><li>护照</li></ul>
    	<input type="hidden" id="card" name="card" value="身份证" />
    </div></td></tr>
    <tr><td>证件号码</td><td><input type="text" class="comm-text" value="请填写您的证件信息" id="cardinfo"/></td></tr>
   
    <tr><td>出生年月</td><td><input type="text" class="comm-text" value="日期格式(YYYY-MM-DD)" id="uage"/></td></tr>
    <tr><td>申&nbsp;请&nbsp;日</td><td><input type="text" class="comm-text" value="日期格式(YYYY-MM-DD)"  id="addtime"/></td></tr>
    <tr><td>电子邮箱</td><td><input  type="text" class="comm-text" value="请填写您的电子邮箱" id="uaddress"/></td></tr>
    <tr><td>教育程度</td><td>
    <div class="dropdownlist card" style="z-index:1" comment="uedu" ><span class="title"><span class="show">教育程度</span></span>
    <ul><li>硕士以上</li><li>硕士</li><li>大学</li><li>大专</li><li>高中</li><li>中学</li><li>小学</li><li>其他</li></ul>
    <input type="hidden" id="uedu" name="uedu" value="" />
    </div>
    </td></tr>
    <tr><td>宗教信仰</td><td><div class="dropdownlist card" comment="ubelief"><span class="title"><span class="show">宗教信仰</span></span>
    <ul><li>基督教</li><li>天主教</li><li>回教</li><li>佛教</li><li>道教</li><li>无</li><li>其他</li></ul>
    <input type="hidden" id="ubelief" name="ubelief" value="" />
    </div></td></tr>
    </table>
    
    <div class="f14 pb10">你想做的义工是：</div>
    <ul class="checkbox_small pl15 cb pb20" comment="dotype">
    	<li rel="0" class="on">保育</li>
        <li rel="1">教育</li>
        <li rel="2">后勤</li>
        <li rel="3">医护</li>
      	<li rel="4">营养师</li>
    </ul>
    <input type="hidden" id="dotype" value="0" />
    
    
     <div class="f14 pb10">重要工作经验：</div>
        <textarea class="comm-textarea pl15 pb10" value="enter text" name="ago" id="ago" >请填写工作经验</textarea>
    </div>
    <!-- right -->
    <!--<div class="fl pt40 pl30">-->
     <div class="pb10 f14 cb">介绍你自己：</div>
   	  <div style="height:130px;">
   		<textarea class="comm-textarea" value="enter text" name="uintro" id="uintro" >请介绍你自己</textarea>
      </div> 
      
      <div class="mt10"> 
          <a href="javascript:void(0)" id="jobsubmit" class="freeapply">
              <img src="image/btnapply.jpg" width="120" border="0" />
          </a>
      </div>
    
    <!--</div>-->
    <!-- right end -->
    </div>
  </div>
  <!-- result -->
  <div class="w650 ol pt50 pb50 tc none" id="result">
	<img src="image/into_success.jpg" border="0" usemap="#Map" class="mau" />
    <map name="Map">
      <area shape="rect" coords="252,139,307,162" href="free_apply.php">
      <area shape="rect" coords="490,16,512,39" href="free_apply.php">
    </map>
  </div>
  <!-- result end -->
<!-- error -->
  <div class="w650 ol pt50 pb50 tc none" id="error">
      <img src="image/info_error.jpg" border="0" usemap="#Map2" class="mau" />
      <map name="Map2">
        <area shape="rect" coords="175,139,225,158" class="curp" href="#">
        <area shape="rect" coords="362,16,382,37" class="curp" href="#">
      </map>
   </div>
<!-- error end -->

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
<!-- date -->
<script language="javascript" src="script/ui/jquery.ui.core.js" type="text/javascript" ></script>
<script language="javascript" src="script/ui/jquery.ui.widget.js" type="text/javascript" ></script>
<script language="javascript" src="script/ui/jquery.ui.datepicker.js" type="text/javascript" ></script>
<script language="javascript" src="script/ui/i18n/jquery.ui.datepicker-zh-CN.js" type="text/javascript" ></script>


<script language="javascript">
$(function(){
	//$(".right_jpannel").jScrollPane({dragMaxHeight:13,scrollbarWidth:15});
	bindJob();
		
	bindErrorBtn();
	
	//--date ui--//
	$( "#uage" ).datepicker({ altFormat: "yy-mm-dd",
							  changeMonth: true,
							  yearRange:'1900:2012',
							  changeYear: true
	 						});
	$('#addtime').datepicker({ altFormat: "yy-mm-dd",
							   changeMonth: true,
							   changeYear: true
							 });
});
</script>
