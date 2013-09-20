<?php
	$pagename = basename($_SERVER['PHP_SELF']);
	$pagename_tp = $_SERVER['QUERY_STRING'] ? basename($_SERVER['PHP_SELF'])."?".$_SERVER['QUERY_STRING'] : basename($_SERVER['PHP_SELF']);
?>
<!--[if IE 6]>
<script language="javascript" src="script/DD_belatedPNG.js"></script>
<script>
	DD_belatedPNG.fix('.png,.menu li a');
    document.execCommand("BackgroundImageCache",false,true);
</script>
<![endif]-->
<div class="logo-box"><div class="logo png"><a href="#">家百浓</a></div></div>
<div id="header" class="w<?php echo ($navNum!=0) ? "  innerfile tags-top" : "";?>">
	<div class="language tr font-white ov"><div class="w960 pr">
	<?php echo (isset($_SESSION['userName'])) ? "您好：".$_SESSION['userName']." " : ""; ?>
    <a href="http://weibo.com/u/2707656885" class="pr30 png head-weiboicon"></a>
    <a href="javascript:void(0);" id="J_log">Login</a>&nbsp;/&nbsp;<a href="javascript:void(0);" id="J_reg">Register</a>&nbsp;&nbsp;
    <a href="../<?php echo $pagename_tp;?>">中文</a>/<a class="pr10" href="javascript:void(0)">English</a></div></div>
    <div class="w" id="menu">
    <div class="w960">
    <ul class="menu ol">
         <li><a href="index.php" class="a1<?php echo ($navNum==0) ? " menuon" : "";?>">首页</a></li><li><a href="about.php" class="a2 maw5<?php echo ($navNum==1) ? " menuon" : "";?>">家百浓介绍</a></li><li><a href="news.php" class="a3 maw5<?php echo ($navNum==2) ? " menuon" : "";?>">家百浓新闻</a></li><li><a href="diary.php" class="a4 maw8<?php echo ($navNum==3) ? " menuon" : "";?>">小苹果的成长日记</a></li><li><a href="education.php" class="a5 maw4<?php echo ($navNum==4) ? " menuon" : "";?>">孩子教养</a></li><li><a href="children_health.php" class="a6 maw4<?php echo ($navNum==5) ? " menuon" : "";?>">孩子健康</a></li><li><a href="donate.php" class="a7 maw4<?php echo ($navNum==6) ? " menuon" : "";?>">爱心捐献</a></li><li><a href="free_apply_step.php" class="a8 maw4<?php echo ($navNum==7) ? " menuon" : "";?>">义工招募</a></li><li><a href="product.php" class="a9 maw4<?php echo ($navNum==8) ? " menuon" : "";?>">物资转送</a></li><li><a href="finance.php" class="a10 maw4<?php echo ($navNum==9) ? " menuon" : "";?>">财务公开</a></li>
    </ul>
    </div>
    </div>
</div>