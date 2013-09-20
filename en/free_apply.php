<?php
	require_once('../phpmailer/class.phpmailer.php');
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
<p>Thank you for applying volunteer work. Please fill in your personal information truthfully so that we can arrange your work based on the actual situation. We will contact you within 7 days after receiving your application and arrange your coming to our Center. If you have any questions, please write email to max.liu@foreverloveinchina.com</p>
</div>
<div class="w600 mau ol pb20">
<!-- update by rick 2012 0809 -->
	<div class="pt40 pb20" style="width:235px;" >   
     <table cellpadding="0" cellspacing="0" border="0" class="pro_support mb10 f14">
    <tr><td>Name </td><td><input type="text" class="comm-text" value="Enter your Name" id="uname" /></td></tr>
    <tr><td>Gender </td><td><ul class="checkbox" comment="usex">
    	<li rel="0" class="on fl pr10">Male</li><li rel="1" class="fl">Female</li></ul>
        <input type="hidden" id="usex" value="0" />
    </td></tr>
    <tr><td>Type of ID</td><td><div class="dropdownlist card" comment="card" style="z-index:10;"><span class="title"><span class="show">Identity card</span></span>
    <ul><li>Identity card</li><li>Passport</li></ul>
    	<input type="hidden" id="card" name="card" value="Identity card" />
    </div></td></tr>
    <tr><td>PROC Citizen ID</td><td><input type="text" class="comm-text" value="Enter your PROC Citizen ID" id="cardinfo"/></td></tr>
   <tr><td>Passport</td><td><input type="text" class="comm-text" value="Enter your Passport" id="passport"/></td></tr>
   <tr><td colspan="2">ID No. Please fill in the ID No.</td></tr>
    <tr><td>Date of Birth</td><td><input type="text" class="comm-text" value="YYYY-MM-DD" id="uage"/></td></tr>
    <tr><td>Date of Application </td><td><input type="text" class="comm-text" value="YYYY-MM-DD"  id="addtime"/></td></tr>
    <tr><td>Email</td><td><input  type="text" class="comm-text" value="Please enter your email address" id="uaddress"/></td></tr>
    <tr><td>Education</td><td>
    <div class="dropdownlist card" style="z-index:1" comment="uedu" ><span class="title"><span class="show">Education</span></span>
    <ul><li>Master or above</li><li>Master</li><li>University</li><li>College</li><li>High School</li><li>Middle School</li><li>Primary School</li><li>Others</li></ul>
    <input type="hidden" id="uedu" name="uedu" value="" />
    </div>
    </td></tr>
    <tr><td>Faith</td><td><div class="dropdownlist card" comment="ubelief"><span class="title"><span class="show">Faith</span></span>
    <ul><li>Christian</li><li>Catholicism</li><li>Islam</li><li>Buddhism</li><li>Taoism</li><li>None</li><li>Others</li></ul>
    <input type="hidden" id="ubelief" name="ubelief" value="" />
    </div></td></tr>
    </table>
    
    <div class="f14 pb10">Which kind of volunteering work do you apply for:</div>
    <ul class="checkbox_small pl15 cb pb20" comment="dotype">
    	<li rel="0" class="on">Nursing</li>
        <li rel="1">Teaching</li>
        <li rel="2">Logistics </li>
        <li rel="3">Medication </li>
      	<li rel="4">Nutrition</li>
    </ul>
    <input type="hidden" id="dotype" value="0" />
    
    
     <div class="f14 pb10">Work experience:：</div>
        <textarea class="comm-textarea pl15 pb10" value="enter text" name="ago" id="ago" >Your Work experience</textarea>
    </div>
    <!-- right -->
    <!--<div class="fl pt40 pl30">-->
     <div class="pb10 f14 cb">Biography：</div>
   	  <div style="height:130px;">
   		<textarea class="comm-textarea" value="enter text" name="uintro" id="uintro" >Please describe yourself</textarea>
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
