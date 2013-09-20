<?php
define('IN_SK',true);
require_once('../includes/init.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forever Love - Homepage</title>
<meta name="keywords" content="孩子"/> 
<meta name="description" content="孩子的健康和未来"/>
<link rel="shortcut icon" href="favicon.ico">
<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
</head>
<body>
<?php
	$navNum = 0;
	include "head.php"; 
?>
<!-- content -->
<div class="banner ol w pr">
<div class="banner-box w ol pr">
    <ul class="pr w">
      <?php
			$myquery = $db->query("SELECT photo,link FROM ".$ea->table('banners')." WHERE lan = '".$lan_code."' ORDER BY orderby ASC LIMIT 0, 5");
			while($thisB = $db->fetch_array($myquery)) {
		?>
      <li style="background-image:url(<?php echo $file_dir."/banners/".$thisB['photo'];?>);"></li>
      <?php
        }
		$thisB = null;
		$myquery = null;
        ?>
    </ul>
 </div>
  <div class="pa adcontrol w" style="background:none;">
      <div class="w960 pr">
        <div class="comment f11 png">
        
          <ul id="sul">
            <?php
                $myquery = $db->query("SELECT uname, umessage_".$lang." as umessage FROM ".$ea->table('message')." ORDER BY dateline Desc LIMIT 0,15");
                while($thisB = $db->fetch_array($myquery)) {
                ?>
                <li>
           <a href="message.php"> <em class="f12"><?php echo $thisB["uname"]; ?> 说</em> <span class="f12">：<?php echo cut_str($thisB["umessage"],25);?></span></a></li>
            <?php
                 }
                $thisB = null;
				$myquery = null;
                ?>
          </ul>
          <a href="free_apply_step.php" class="comment-button png"></a>
          <a href="about.php" class="contact-button png"></a></div>
      </div>
  </div>
  <!-- banner control -->
  <div class="pa adcontrol w">
    <div class="w960 pr">
      <ul class="adcontrol-box">
        <?php
			$myquery = $db->query("SELECT photo,link FROM ".$ea->table('banners')." WHERE lan = '".$lan_code."' ORDER BY orderby, banner_id LIMIT 0, 5");
			while($thisB = $db->fetch_array($myquery)) {
			?>
        	<li></li>
        <?php
       		 }
			 $thisB = null;
			 $myquery = null;
        	?>
      </ul>
    </div>
  </div>
</div>
<!-- 家百浓新闻 -->
<div class="w960 pt20 ol pb50">
  <div class="box"><img src="image/ni_01.jpg" />
    <div class="content"><strong class="box-title"></strong>
      <ul class="haveicon">
        <?php
				$myquery = $db->query("SELECT news_id,title_".$lang." as title FROM ".$ea->table('news')." ORDER BY dateline Desc LIMIT 0, 10");
				while($thisB = $db->fetch_array($myquery)) {
			?>
        <li><a href="news_detail.php?news_id=<?php echo $thisB["news_id"] ?>"><?php echo cut_str($thisB["title"],25); ?> </a></li>
        <?php
				}
				$thisB = null;
				$myquery = null;
				?>
      </ul>
      <a href="news.php" class="showmore font-orange fi f12">More …</a> </div>
  </div>
  <div class="box"> <img src="image/ni_02.jpg" />
    <div class="content"> <strong class="box-title indext2"></strong>
      <ul class="haveicon">
        <?php
				$myquery = $db->query("SELECT education_id,title_".$lang." as title FROM ".$ea->table('education')." ORDER BY dateline Desc LIMIT 0, 10");
				while($thisB = $db->fetch_array($myquery)) {
			?>
        <li><a href="education_detail.php?education_id=<?php echo $thisB["education_id"] ?>"><?php echo cut_str( $thisB["title"],25); ?></a></li>
        <?php
				}
				$thisB = null;
				$myquery = null;
			?>
      </ul>
      <a href="education.php" class="showmore font-orange fi f12">More …</a> </div>
  </div>
  <!-- 成长日记 -->
  <div class="box"> <img src="image/ni_03.jpg" />
    <div class="content"> <strong class="box-title indext3"></strong>
      <ul class="haveicon">
        <?php
				$myquery = $db->query("SELECT diary_id,title_".$lang." as title FROM ".$ea->table('diary')." ORDER BY dateline Desc LIMIT 0, 10");
				while($thisB = $db->fetch_array($myquery)) {
			?>
        <li><a href="diary.php?diary_id=<?php echo $thisB["diary_id"] ?>"><?php echo cut_str($thisB["title"],25); ?></a></li>
        <?php
				}
				$thisB = null;
				$myquery = null;
				?>
      </ul>
      <a href="diary.php" class="showmore font-orange fi f12">More …</a></div>
  </div>
</div>
<!-- content --> 

<!-- footer -->
<?php
	include "foot.php"; 
?>
<!-- footer -->
</body>
</html>
<script language="JavaScript" src="script/jquery-1.5.1.min.js" type="text/javascript"></script>
<script language="JavaScript" src="script/common.js" type="text/javascript"></script>
<script language="JavaScript" src="script/action.js" type="text/javascript"></script>
<script language="JavaScript" src="script/jquery.easing.1.3.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$(".adcontrol-box li").eq(0).addClass("ad-on");
	
	scrollBoxForIndex({obj:'.banner-box',btn:'.adcontrol-box',inter:4*1000,onstop:'.banner-box,.adcontrol-box'});  
	
	//--- 评论列表 ---//
	var i = 1;
	var len = $("#sul li").length;
	//持续时间
	var del = 3500;
	
	$("#sul li").eq(0).fadeIn(1000,function(){
		$(this).delay(del-500).fadeOut();
		ani(i);
		});
		
		function ani(i){
			$("#sul li").eq(i).delay(del).fadeIn(1000,function(){
				$(this).delay(del-500).fadeOut();
				 if(i== Number(len)){
						i=0;	
					 }
				 ani(i)				
				});
			i++;
		}
	});
</script>
