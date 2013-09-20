<?php
define('IN_SK',true);
require_once('./includes/init.php');
require_once('./includes/myNg.php');

if(!empty($_SESSION['userName']) && !empty($_SESSION["userId"])){
	$query = $db->query("SELECT userid, username, typeid, child_id, status  FROM ".$ea->table('users')." WHERE userid = '".$_SESSION["userId"]."'");
	if ($thisB = $db->fetch_array($query)) {
		if($thisB['status'] == false){
			$query = $db->query("SELECT * FROM ".$ea->table('children'));
		}else{
			
		}
	}
}else{
	$query = $db->query("SELECT * FROM ".$ea->table('children'));
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓-小苹果的成长日记</title>
<meta name="keywords" content="孩子"/> 
<meta name="description" content="孩子的健康和未来,成长日记"/>
<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
<link type="text/css" rel="stylesheet" href="css/children.css" />
</head>
<body>
<?php
	$navNum = 3;
	include "head.php"; 
?>
<div class="w960 pr">
<form id="form1" name="form1" method="post" action="diary.php">
	<div class="search_form">
    <span>查询相关日记</span>
	<div class="dropdownlist" comment="year"><span class="title"><span class="show">
		<?php echo isset($_POST['year']) ?  $_POST['year'] : date("Y");?></span></span>
    <ul id="insertyear"></ul>
    <input type="hidden" id="year" name="year" value="<?php echo date("Y"); ?>" />
    </div><span>年</span>
    <div class="dropdownlist" comment="month"><span class="title"><span class="show">
    	<?php echo isset($_POST['month']) ?  $_POST['month'] : date("m");?></span></span>
    <ul id="insertmonth"></ul>
    <input type="hidden" id="month" name="month" value="<?php echo date("m"); ?>" />
    </div><span>月</span>
    <div class="dropdownlist" comment="day"><span class="title"><span class="show">
    	<?php echo isset($_POST['day']) ?  $_POST['day'] : date("d");?></span></span>
    <ul id="insertday"></ul>
    <input type="hidden" id="day" name="day" value="<?php echo date("d"); ?>"/>
    </div><span>日</span>
    <img src="image/search.png" onClick="document.form1.submit();" style="cursor:pointer" />
    </div>
</form>
</div>
<div class="w bgfff">
<div class="w970 ol pt15 pb15">
	<a href="javascript:;" class="g-icon gallery-gleft"></a>
    <div class="gallery-content">
        <div class="gallery-content-inner">
            <ul>
            <?php           
            	while($thisB = $db->fetch_array($query)) {
				$subQuery =$db->query("SELECT * FROM ".$ea->table('diary')." WHERE child_id = ".$thisB['child_id']." ORDER BY dateline LIMIT 1");
				$subThisB = $db->fetch_array($subQuery);
            ?>
                <li>
                    <div class="pics" id="childen-pic">
                    <img src="<?php echo $file_dir."/children/".$thisB['pic1']; ?>"/>
                    
                    <?php 
                    if($thisB['pic2'] != ""){
                    	echo "<img src='".$file_dir."/children/".$thisB['pic2']."' />"; 
                    }
                    ?>
                    <?php 
                    if($thisB['pic3'] != ""){
                   	 	echo "<img src='".$file_dir."/children/".$thisB['pic3']."' />"; 
                    }
                    ?>
                    </div>
                    <h2 class="pics-title common-font-hei"><?php echo $subThisB['title_'.$lang];?></h2>
                    <div class="pas">
                    	<p>
                    	<?php echo cut_str($subThisB['intro_cn'],250); ?>
                        <a id="btn-log" class="detail" href="javascript:;"><img src="image/show_detail.gif" /></a>
                        </p>
                    </div>
                </li>
                <?php
				}
                ?>
            </ul>
        </div>
    </div>
    <a href="javascript:;" class="g-icon gallery-gright"></a>
</div>
</div>
<div class="w960 ol pt30 pb40">
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
<script language="javascript" src="script/jquery.lightbox.js" type="text/javascript"></script>
<script language="javascript" src="script/jScrollPane.js" type="text/javascript"></script>
<script language="javascript" src="script/jquery.mousewheel.js" type="text/javascript"></script>
<script language="javascript" src="script/jcarousellite.js" type="text/javascript"></script>
<script language="javascript">

$(function(){
	
	insertLi("#insertyear",1989,2012);
	insertLi("#insertmonth",1,12);
	insertLi("#insertday",1,31);
	

	
	binBtnMore();
	
	$(".gallery-content-inner").jCarouselLite({
       btnNext: ".gallery-gleft",
       btnPrev: ".gallery-gright",
	   visible: 1,
	   speed: 800
    });
    
	
	
});
</script>
