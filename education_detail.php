<?php
define('IN_SK',true);
require_once('./includes/init.php');
$query = $db->query("SELECT lan, photo, title_".$lang." AS title, description_".$lang." AS description, photo FROM ".$ea->table('education')." WHERE education_id = '".$_GET['education_id']."' AND title_".$lang."<>'' LIMIT 1");
if ($thisB = $db->fetch_array($query)) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓</title>
<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
</head>
<body>
<?php
	$navNum = 4;
	include "head.php"; 
?>
<div class="w970 pr"><a class="gback" href="index.php"></a></div>
<div class="w bgfff">
<div class="ol w970 pt5 pb10">	
	<!--<img src="image/care/demo.jpg" class="fl" />-->
  	<img src="<?php echo $file_dir."/education/". $thisB['photo']?>" class="fl" />
    <div class="fl ml50 w400 pt20">
    <strong class="f20"><?php echo cut_str($thisB['title'],35); ?></strong>
        <div class="bt_C5C5C5 pt5 mt10">
        <div class="care_jpannel oh">
            <p>
				<?php echo html_entity_decode($thisB['description'])?>
           </p>
        </div>
        </div>
    </div> 
</div>
</div>
<div class="w960 ol pt20 pb50">
	<a class="fr"><img src="image/social_media_sina.png" class="png"/></a>   
</div>
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
	//$(".care_jpannel").jScrollPane({dragMaxHeight:13,scrollbarWidth:15,scrollbarMargin:8});	
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
} else {
	Header("Location:news.php");
}
?>