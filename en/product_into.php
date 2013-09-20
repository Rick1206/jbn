<?php
define('IN_SK',true);
require_once('../includes/init.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓-物资转送</title>

<meta name="keywords" content="孩子"/> 
<meta name="description" content="孩子的健康和未来,物资转送"/>

<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
</head>
<body class="bg2">
<?php
	$navNum = 8;
	include "head.php"; 
?>
<div class="w bgfff">
<div id="content">
<div class="w650 ol pt20 pb30">

<form method="post" id="form1">
	<table cellpadding="4" cellspacing="0" border="0" class="mau prore_into f16 drophack-3">
    <tr><td>姓&nbsp;&nbsp;&nbsp;&nbsp;名</td><td><input type="text" class="comm-text" value="请填写您的称呼" name="name" id="name"/></td></tr>
    <tr><td>性&nbsp;&nbsp;&nbsp;&nbsp;别</td><td><ul class="checkbox" comment="sex">
    	<li rel="0" class="on fl pr10">男</li><li rel="1" class="fl">女</li></ul></td></tr>
    <input type="hidden" id="sex" name="sex" value="0" />
    
    <tr><td>证件类型</td><td><div class="dropdownlist card" comment="card" style="z-index:10;"><span class="title"><span class="show">身份证</span></span>
    	<ul><li>身份证</li><li>其他</li></ul>
    	<input type="hidden" id="card" name="card" value="" />
    	</div></td>
    </tr>
    <tr><td>证件信息</td><td><input type="text" class="comm-text" value="请填写您的称呼" id="cardinfo" name="cardinfo"/></td></tr>    
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
    <tr><td>联系电话</td><td><input type="text" class="comm-text" value="请填写您的联系方式" id="tel" name="tel" /></td></tr>
    <tr><td>电子邮件</td><td><input type="text" class="comm-text" value="请填写您的称呼" id="email" name="email" /></td></tr>
    <tr><td>申请数量</td><td><input type="text" class="comm-text" value="请填写申请数量" name="count" id="count" /></td></tr>
    <tr><td>申请理由</td><td><textarea class="comm-textarea" value="请填写申请理由" name="isin" id="isin">请填写申请理由</textarea></td></tr>
    <tr><td>&nbsp;</td><td class="tc"><input type="submit" value="提交" class="product_submit" /></td></tr>
    </table>
    <input type="hidden" name="action" value="product_into" />
</form>
</div>
</div>

<div class="w650 ol pt50 pb50 tc none" id="result">
	<img src="image/into_success.jpg" border="0" usemap="#Map" class="mau" />
    <map name="Map">
      <area shape="rect" coords="252,139,307,162" href="product.php">
      <area shape="rect" coords="490,16,512,39" href="product.php">
    </map>
 </div>
 
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
<?php
	include "foot.php"; 
?>
</body>
</html>
<script language="javascript" src="script/jquery-1.5.1.min.js" type="text/javascript"></script>
<script language="javascript" src="script/common.js" type="text/javascript"></script>
<script language="javascript" src="script/action.js" type="text/javascript"></script>
<script language="javascript" src="script/jScrollPane.js" type="text/javascript"></script>
<script language="javascript" src="script/jquery.mousewheel.js" type="text/javascript"></script>
<script language="javascript">
$(function(){
	$(".pro_jpanel").jScrollPane({dragMaxHeight:13,scrollbarWidth:15});	
	
	var arrBtn = [$("#name"),$("#count"),$("#tel"),$("#isin"),$("#email"),$("#cardinfo")];
		for(var key in arrBtn){
			inputBtn(arrBtn[key]);
		}
	$(".product_submit").click(function(){
		if(!isDefault($("#name"))){return false;};
		if(!isNumber($("#count"))){return false;};
		if(!isDefault($("#tel"))){return false;};
		if(!isDefault($("#isin"))){return false;};
		$("#form1").submit();
	});
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
<?php
   $action = isset($param["action"]) ? $param["action"] : "";
	if($action == 'product_into'){
		
		$updateSql = $db->query("INSERT INTO ".$ea->table('transfer')." (tname, usex , ucard, ucountry, ucardinfo, ubelief, uedu, uemail, tphone, product_id, tcount, treason, dateline) VALUES ('".$param["name"]."', '".$param["sex"]."', '".$param["card"]."', '".$param["country"]."', '".$param["cardinfo"]."', '".$param["religion"]."', '".$param["educate"]."', '".$param["email"]."', '".$param["tel"]."', '".$_GET["product_id"]."', '".$param["count"]."', '".$param["isin"]."', '".date('Y-m-d')."')");			
		
		if($updateSql){
?>
     <script type="text/javascript">
	 $("#content").fadeOut(100,function(){ $("#result").fadeIn(100);});
     </script>
<?php 

}else{
	?>
    <script type="text/javascript">
	 $("#content").fadeOut(100,function(){ $("#error").fadeIn(100);});
     </script>
    
<?php 
		}
}
?>