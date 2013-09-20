<?php
define('IN_SK',true);
require_once('./includes/init.php');
$nId = $_GET['news_id'];
$query = $db->query("SELECT lan, dateline, orderby, title_".$lang." AS title, description_".$lang." AS description, photo FROM ".$ea->table('news')." WHERE news_id = '".$nId."' AND title_".$lang."<>'' LIMIT 1");
if ($thisB = $db->fetch_array($query)) {
$date = $thisB["dateline"];
$ori = $thisB["orderby"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓-<?php echo $thisB["title"];?></title>
<meta name="keywords" content="家百浓,孩子,新闻内页"/>
<meta name="description" content="<?php echo $thisB["title"];?>"/>
<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
</head>
<body>
<?php
	$navNum = 2;
	include "head.php"; 
?>
<div class="w bgfff">
<div class="w970 ol p10">
	<img src="<?php echo $file_dir."/news/".$thisB['photo']; ?>" class="fl" />
    <div class="fl ml50 w400 pt20">
    	<strong class="f20"><?php echo cut_str($thisB['title'],35); ?></strong>
        <div class="bt_C5C5C5 pt5 mt10">
        <div class="right_jpannel oh">
            <p><?php echo html_entity_decode($thisB['description'])?></p>
        </div>
        </div>
    </div>
</div>
<div class="w960 ol pt20 pb20">
	<div class="f14">
	<?php 
		$query = $db->query("SELECT lan, news_id, title_".$lang." AS title, description_".$lang." AS description, photo FROM ".$ea->table('news')." WHERE dateline > '".$date."' AND orderby >= ".$ori." and news_id <> '".$nId."' order by orderby,dateline Asc LIMIT 1");
		if ($thisB = $db->fetch_array($query)) {
    		echo '上一篇：<a href="news_detail.php?news_id='.$thisB['news_id'].'">'.$thisB['title'].'</a>';
		}
	?>
    </div>
    <div class="f14">
   <?php 
		$query = $db->query("SELECT lan, news_id, title_".$lang." AS title, description_".$lang." AS description, photo FROM ".$ea->table('news')." WHERE dateline < '".$date."' AND orderby <= ".$ori." and news_id <> '".$nId."' order by orderby,dateline Desc LIMIT 1");
		if ($thisB = $db->fetch_array($query)) {
    		echo '下一篇：<a href="news_detail.php?news_id='.$thisB['news_id'].'">'.$thisB['title'].'</a>';
		}
	?>
    </div>
</div>

</div>
<div class="w960 ol pt20 pb50">
	<img src="image/icon-arrange.gif" class="fl pr10" /><a href="news.php"><img src="image/news_inner.png" class="fl" /></a><a class="fr"><img src="image/social_media_sina.png" class="png" /></a>   
</div>
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
	//$(".right_jpannel").jScrollPane({dragMaxHeight:13,scrollbarWidth:15});	
});
</script>
<?php
} else {
	Header("Location:news.php");
}
?>