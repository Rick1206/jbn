<?php
define('IN_SK',true);

require(dirname(__FILE__) . '/includes/init.php');
require(dirname(__FILE__) .'/lib/lib_right.php');

if( empty($_SESSION['admin_id']) ){
	header('Location: login.php');
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $system_name;?>-后台管理</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
<script src="../js/j132m.js" language="javascript"></script>
<script src="./js/menu_title.js" language="javascript"></script>
</head>
<body>
<div id="main">

	<div id="main_top">
	  <table width="100%" height="41" border="0" cellpadding="0" cellspacing="0">
		<tr>
		  <td width="775" height="40">&nbsp;<font color="#FFFFFF"><?php echo $system_name;?> 网站管理</font></td>
		  <td width="228">
		  您好， <font class="hello_admin"><?php echo $_SESSION['admin_name'];?></font> >> 
		  <a href="login_out.php"> 安全退出</a> >> 
		  <a href="../index.php" target="_blank">网站首页</a>		  </td>
		</tr>
	  </table>
	</div>

  <div id="main_menu">
    <table width="1003" border="0" cellspacing="0" cellpadding="0">
     <tr>
        <td width="859">
        <div class="menu_title" id="0" style="padding-left:7px;">系统设置</div>
		<?php
            if( @in_array('3',$a_right))
            {
        ?>
        <div class="menu_title" id="1">家百浓首页</div>
        <?php 
            } 
            if( @in_array('4',$a_right))
            {
        ?>
        <div class="menu_title" id="2">家百浓新闻</div>
        <?php
            }
            if( @in_array('5',$a_right))
            {
        ?>
        <div class="menu_title" id="3">孩子中心</div>
        <?php
            }
            if( @in_array('6',$a_right))
            {
        ?>
        <div class="menu_title" id="4">孩子教养</div>
        <?php 
            }       
            if( @in_array('7',$a_right))
            {
        ?>
        <div class="menu_title" id="5">爱心捐赠</div>
        <?php 
            }       
            if( @in_array('8',$a_right))
            {
        ?>
         <div class="menu_title" id="6">义工招募</div>
        <?php 
            }       
            if( @in_array('9',$a_right))
            {
        ?>
        <div class="menu_title" id="7">物资转送</div>
         <?php 
            }       
            if( @in_array('10',$a_right))
            {
        ?>
        <div class="menu_title" id="8">财物公开</div>
        <?php 
            }  
        ?>
        </td>
        <td width="144">
        <div class="refurs">
        <img src="images/re.jpg" border="0" onclick="javascript:window.location.reload();" style="cursor:pointer;" title="<?php echo $_L['refu'];?>" alt="<?php echo $_L['refu'];?>" />
        </div>
 </td>
     </tr>
    </table>
 	</div>
	<div id="main_contant">
	
			<div id="mask">
            	
				<div class="article-text">
				<iframe width="1003" height="470" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" src="admin.php"></iframe>
                </div>
               
               
          	 	<div class="article-text" id="text1">
                 <?php
                	if( @in_array('3',$a_right))
					{
				?>
                <iframe width="1003" height="470" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0"  src="home.php" id="iframe_1" name="iframe_1" ></iframe>
                <?php } ?>
                </div>
				<div class="article-text" id="text2">
                <?php
					if( @in_array('4',$a_right))
					{
				?>
			       <iframe  width="1003" height="100%" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" src="news.php" id="iframe_2" name="iframe_2"></iframe>
                <?php } ?>
               
                </div>
				<div class="article-text" id="text3">
                <?php
					if( @in_array('5',$a_right))
					{
				?>
                <iframe  width="1003" height="470" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" src="diary.php" id="iframe_3" name="iframe_3"></iframe>
                <?php } ?>
                </div>
                <div class="article-text" id="text4">
                <?php
					if( @in_array('6',$a_right))
					{
				?>
                <iframe  width="1003" height="470" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" src="education.php" id="iframe_4" name="iframe_4"></iframe>
                <?php } ?>
                </div>               
                <div class="article-text" id="text5">
                <?php
					if( @in_array('7',$a_right))
					{
				?>
                <iframe  width="1003" height="470" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" src="donate.php" id="iframe_5" name="iframe_5"></iframe>
                <?php } ?>
                </div>               
                <div class="article-text" id="text6">
                <?php
					if( @in_array('8',$a_right))
					{
				?>
                <iframe  width="1003" height="470" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" src="job.php" id="iframe_6" name="iframe_6"></iframe>
                <?php } ?>
                </div> 
				<div class="article-text" id="text7">
                <?php
					if( @in_array('9',$a_right))
					{
				?>
                <iframe  width="1003" height="470" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" src="product.php" id="iframe_7" name="iframe_7"></iframe>
                <?php } ?>
                </div>
                <div class="article-text" id="text8">
                <?php
					if( @in_array('10',$a_right))
					{
				?>
                <iframe  width="1003" height="470" allowtransparency="true" frameborder="0" scrolling="auto" marginwidth="0" marginheight="0" src="finance.php" id="iframe_8" name="iframe_8"></iframe>
                <?php } ?>
                </div>             
                </div>
                
			</div>
	</div>

	<div id="main_foot">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="5">&nbsp;</td>
          <td><?php echo $system_right;?></td>
        </tr>
      </table>
	</div>

<script>

$(document).ready(function(){
		
		if(window.navigator.appName == "Microsoft Internet Explorer")
		{
			
			var text1 = $('#text1').find('iframe').attr("src");
			var text2 = $('#text2').find('iframe').attr("src");
			var text3 = $('#text3').find('iframe').attr("src");
			var text4 = $('#text4').find('iframe').attr("src");
			var text5 = $('#text5').find('iframe').attr("src");
			var text6 = $('#text6').find('iframe').attr("src");
			var text7 = $('#text7').find('iframe').attr("src");
			var text8 = $('#text8').find('iframe').attr("src");
			
			if ( text1 == "home.php"){
				setTimeout('window.parent[\'iframe_1\'].location.reload();',0);
			}
			
			if ( text2 == "product.php"){
				setTimeout('window.parent[\'iframe_2\'].location.reload();',0);
			}
			
			if ( text3 == "responsibility.php"){
				setTimeout('window.parent[\'iframe_3\'].location.reload();',0);
			}
			
			if ( text4 == "news.php"){
				setTimeout('window.parent[\'iframe_4\'].location.reload();',0);
			}
							
			if ( text5 == "job.php"){
				setTimeout('window.parent[\'iframe_5\'].location.reload();',0);
			}
			
			if ( text6 == "enews.php"){
				setTimeout('window.parent[\'iframe_6\'].location.reload();',0);
			}

		}

});
</script>
</body>
</html>
