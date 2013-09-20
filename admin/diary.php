<?php
define('IN_SK',true);
require(dirname(__FILE__) .'/includes/init.php');	
require(dirname(__FILE__) .'/lib/lib_right.php');
if(empty($_SESSION['admin_id'])){
	header('Location: login.php');
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $system_name;?></title>
<link rel="stylesheet" href="style/module.css" />
<script src="../js/j132m.js" language="javascript"></script>
<script src="js/contorl_module.js" language="javascript"></script>
<script src="js/time_cn.js" language="javascript"></script>
</head>
<body>

<!-- left menu start-->
<div id="contant_left">
	<div id="left_title">孩子中心</div>
    <?php
    if( @in_array('6',$a_right))
	{
	?>
    <div class="left_list" id="0"><img src="images/dir.gif" />日记管理</div>
    <div class="left_list" id="1"><img src="images/dir.gif" />孩子管理</div>
    <div class="left_list" id="2"><img src="images/dir.gif" />会员管理</div>
    <?php
	}
	?>
</div>
<!-- left menu end-->

<!-- right contant start-->
<div id="contant_right">
    <div id="right_mark">
            <?php
            if(@in_array('6',$a_right) )
			{
			?>
            <!--diary list start-->
            <div class="include_module">
            <iframe src="module/diary/diary_list.php" width="760" height="470" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" name="a0"></iframe>
            </div>
            <div class="include_module">
            <iframe src="module/diary/children_list.php" width="760" height="470" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" name="a1"></iframe>
            </div>
            <div class="include_module">
            <iframe src="module/diary/users_list.php" width="760" height="470" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" name="a2"></iframe>
            </div>
            <?php
			}
			?>    
   </div> 
   <!-- end silder-->
 
</div>
<!-- right contant end-->

</body>
</html>