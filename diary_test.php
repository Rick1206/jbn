<?php
define('IN_SK',true);
require_once('./includes/init.php');
require_once('./includes/pager.php');
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
	$navNum = 2;
	include "head.php"; 
?>
<div class="w bgfff">
<div class="w970 ol pt15 pb15">
	<?php
		$myquery = $db->query("SELECT diary_id, photo, dateline, intro_".$lang." as intro FROM ".$ea->table('diary')." ORDER BY orderby, dateline Desc LIMIT 1");
		while($thisB = $db->fetch_array($myquery)) {
	?>
		<img src="<?php echo $file_dir."/diary/".$thisB['photo']; ?>" class="fl" />   
    	<div class="fl ml50 w400 pt20 mt50 border_C5C5C5">
    	<span class="f14 db pb5"><?php echo date("Y/m/d",strtotime($thisB['dateline']));?></span>
		<p class="pb20 f16"><?php echo cut_str($thisB['intro_'.$lang.''],180);?></p>
	<?php
        }
		$thisB = null;
		$myquery = nul;
    ?>
    </div> 
</div>
</div>
<div class="w970 ol pt20 pr">
		<?php
			$all_date_num = page_1::page_all_num("diary"," WHERE title_".$lang."<>''");
			$perpage = 4;
			$page = isset($_GET['page']) ? $_GET['page'] : 1 ;
			$offset = ($page - 1) * $perpage;
			$multipage = multi_cn($all_date_num, $perpage, $page, "diary.php");
			//paper显示层
			$strPage= "diary.php?page=";
			$params = array(
			'total_rows'=>$all_date_num, 
            'method'    =>'html', 
            'parameter' =>$strPage.'!',  
            'now_page'  =>$_GET['page'], 
            'list_rows' =>4,
			);
			$page = new Core_Lib_Page($params);

			$myquery = $db->query("SELECT diary_id, image, dateline,intro_".$lang.",title_".$lang." as title FROM ".$ea->table('diary')." ORDER BY orderby, dateline Desc LIMIT $offset, $perpage");
				while($thisB = $db->fetch_array($myquery)) {
		?>
	<div class="box fornews even">
    	<!--<img src="<php echo $file_dir."/news/".$thisB['image']; ?>" />-->
        <div class="content">
        	<strong class="n-title"><?php echo cut_str($thisB['title'],28);?></strong>
            <p>
            	<?php echo cut_str($thisB['intro_'.$lang.''],120);?>
            </p>
            <!--<span class="cb db"><php echo date("Y.m.d",strtotime($thisB['dateline']));?></span>-->
            <a href="diary_id.php?diary_id=<?php echo $thisB['diary_id']; ?>" class="showmore font-orange fi f14 icon-arrange">详情</a>
        </div>
    </div>
    <?php
        }
		$thisB = null;
		$myquery = null;
		$db->close();
	  ?>  
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