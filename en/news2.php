﻿<?php
define('IN_SK',true);
require_once('../includes/init.php');
require_once('../includes/pager.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓-家百浓新闻</title>
<meta name="keywords" content="孩子"/> 
<meta name="description" content="孩子的健康和未来,家百浓新闻"/>
<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php
	$navNum = 2;
	include "head.php"; 
?>
<div class="w bgfff">
<div class="w970 pb15" style="height:270px;position:relative">
	<?php
		$myquery = $db->query("SELECT news_id, photo, dateline, intro_".$lang." as intro FROM ".$ea->table('news')." ORDER BY orderby, dateline Desc LIMIT 1");
		while($thisB = $db->fetch_array($myquery)) {
	?>
		<img src="<?php echo $file_dir."/news/".$thisB['photo']; ?>" class="fl" width="270px" />   
    	<div class="fl w230 pt20 mt50 border_C5C5C5">
    	<span class="f14 db pb5"><?php echo date("Y/m/d",strtotime($thisB['dateline']));?></span>
		<p class="pb20 f16"><?php echo cut_str($thisB['intro'],180);?></p>
		<a href="news_detail.php?news_id=<?php echo $thisB['news_id']; ?>" class="font-orange f14 fr icon-arrange">详情</a>
	<?php
        }
		$thisB = null;
		$myquery = nul;
    ?>
	</div> 
    <!--weibo-->
    <div style="position:absolute;width:395px;height:660px;left:530px;">
   	 <iframe width="100%" height="660"  frameborder="0" scrolling="no" src="http://widget.weibo.com/livestream/listlive.php?language=zh_cn&width=0&height=500&uid=1862898322&skin=1&refer=1&appkey=&pic=0&titlebar=1&border=1&publish=1&atalk=1&recomm=0&at=0&dpc=1"></iframe>
	</div>
    
</div>
</div>
<div class="w970 ol pt20 pr">
<div style="width:500px">
		<?php
			$all_date_num = page_1::page_all_num("news"," WHERE title_".$lang."<>''");
			$perpage = 4;
			$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
			$offset = ($page - 1) * $perpage;
			$multipage = multi_cn($all_date_num, $perpage, $page, "news.php");
			//paper显示层
			$strPage= "news.php?page=";
			$params = array(
			'total_rows'=>$all_date_num, 
            'method'    =>'html', 
            'parameter' =>$strPage.'!',  
            'now_page'  =>$_GET['page'], 
            'list_rows' =>4,
			);
			$page = new Core_Lib_Page($params);

			$myquery = $db->query("SELECT news_id, image, dateline,intro_".$lang.",title_".$lang." as title FROM ".$ea->table('news')." ORDER BY orderby, dateline Desc LIMIT $offset, $perpage");
				while($thisB = $db->fetch_array($myquery)) {
		?>
	<div class="box fornews even">
    	<!--<img src="<php echo $file_dir."/news/".$thisB['image']; ?>" />-->
        <div class="content">
        	<strong class="n-title"><?php echo cut_str($thisB['title'],60);?></strong>
            <p>
            	<?php echo cut_str($thisB['intro_'.$lang.''],120);?>
            </p>
            <!--<span class="cb db"><php echo date("Y.m.d",strtotime($thisB['dateline']));?></span>-->
            <a href="news_detail.php?news_id=<?php echo $thisB['news_id']; ?>" class="showmore font-orange fi f14 icon-arrange">详情</a>
        </div>
    </div>
    <?php
        }
		$thisB = null;
		$myquery = null;
		$db->close();
	  ?> 
      </div>
</div>
<div class="w970 page pb20 pt15 pr page"> 
    <?php echo $page->show(2);?>
    <a href="#" class="pa rzero"><img src="image/social_media_sina.png" class="png"/></a>
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