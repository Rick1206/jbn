<?php
define('IN_SK',true);
require_once('./includes/init.php');
require_once('./includes/myNg.php');
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
	<div class="dropdownlist" comment="year"><span class="title"><span class="show"><?php echo $_POST['year'] ?  $_POST['year'] : date("Y");?></span></span>
    <ul id="insertyear"></ul>
    <input type="hidden" id="year" name="year" value="<?php echo date("Y"); ?>" />
    </div><span>年</span>
    <div class="dropdownlist" comment="month"><span class="title"><span class="show"><?php echo $_POST['month'] ?  $_POST['month'] : date("m");?></span></span>
    <ul id="insertmonth"></ul>
    <input type="hidden" id="month" name="month" value="<?php echo date("m"); ?>" />
    </div><span>月</span>
    <div class="dropdownlist" comment="day"><span class="title"><span class="show"><?php echo $_POST['day'] ?  $_POST['day'] : date("d");?></span></span>
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
                <li>
                    <div class="pics"><img src="image/temp/256X177.jpg" /><img src="image/temp/256X177.jpg" /><img src="image/temp/256X177.jpg" /></div>
                    <h2 class="pics-title common-font-hei">家百浓宝宝撒拉成长日记 </h2>
                    <div class="pas">
                    	<p>
                        撒拉是我们第一个住到儿童中心的宝宝。我们上周把整个院子的地面漆上美丽的塑料漆，将整个环境打扫干净，热烈欢迎她的来到。过去连日的阴雨也停止，温软的阳光照亮也告诉撒拉，造物
                        </p>
                        <p>
                        撒拉是我们第一个住到儿童中心的宝宝。我们上周把整个院子的地面漆上美丽的塑料漆，将整个环境打扫干净...
                        <a href="#detail"><img src="image/show_detail.gif" /></a>
                        </p>
                    </div>
                </li>
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
	//$(".right_jpannel").jScrollPane({dragMaxHeight:13,scrollbarWidth:15});
	insertLi("#insertyear",1989,2012);
	insertLi("#insertmonth",1,12);
	insertLi("#insertday",1,31);
	
	/*$('.logo').click(function(){
		$("#error").fadeOut(100,function(){$("#p1").fadeIn(100);});
		$.lightBox('.pop_reg');
	});*/
	
	
	
	//
	$(".gallery-content-inner").jCarouselLite({
       btnNext: ".gallery-gleft",
       btnPrev: ".gallery-gright",
	   visible: 1,
	   speed: 800
    });
	
});
</script>
