<?php
define('IN_SK',true);
require_once('./includes/init.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓-家百浓介绍</title>
<meta name="keywords" content="家百浓,孩子"/> 
<meta name="description" content="孩子的健康和未来,家百浓介绍"/>
<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
</head>
<body class="bg2">
<?php
	$navNum = 1;
	include "head.php"; 
?>
<div class="w">
    <div class="w960 pr">
        <div class="tags about png">
            <div class="tags-content png">
                <ul class="png">
                	<li class="tagon"><a href="about.php"><img src="image/tags/about_03.png" class="png" /></a></li>
                    <li><a href="about_envir.php"><img src="image/tags/about_01.png" class="png" /></a></li>
                    <!--<a href="about_person.php"><img src="image/tags/about_01.png" class="png" /></a>-->
                    <!--<li><a href="about_envir.php"><img src="image/tags/about_02.png"  class="png" /></a></li>-->
                </ul>
            </div>
        	<div class="tags-right png"></div>
		</div>
	</div>
</div>
<!-- content -->
<div class="w bgfff">
<div class="w650 ol pt20 pb30">
    <div class="pt20">
    	<div class="about_jpanel oh f14">
    		<img src="image/about/01.jpg" />
        	<h1 class="title pb10 f20">家百浓儿童之家成立宗旨</h1>
			<h2 class="date pb10">2012年3月</h2>
			<p>1.家百浓儿童之家（以下简称本家）为一民间发起，在上海成立，愿意善尽公民责任，来关爱社会弱势孩子的非营利机构。</p><br />
			<p>2.由于社会经济快速发展，许多年青父母忙于工作，缺乏健康怀孕知识，面对经济压力，每年有许多残疾儿童被送入各地儿童福利院。本家藉由民间爱心，在人力和财力上，愿意分担，特别是贫困地区，各地儿童福利院在照养孤儿的需要。</p><br />
			<p>3.本家以收养残疾孩子为主要对象，愿意在他们幼小时，尽力和及时对他们进行医治和复健，使他们有健康的未来。</p><br />
			<p>4.除了在身体上用心照顾残疾孩子，本家认识到每个孩子的心灵更是需要用爱来呵护。因此本家不但在医疗上帮助有残疾的孩子，更是提供一个充满爱的家庭氛围，让每个孩子都有特别的细心照顾，有健康的心灵成长，和良好品格的建立。</p><br />
			<p>5.本家相信人的真正价值，不是外在，而是内心的良善和强大。所以，在能力许可下，将尽心尽力，教育他们，带给每个残疾孩子有重新美好的人生，让他们有健康的心灵，成为社会将来的祝福。</p><br />
			<p>6.本家的孩子为承蒙各地福利院信任受托寄养，因此本家不拥有孩子该如何领养的权利。有兴趣领养的家庭请通过政府相关单位申请办理。</p>
        </div>
    </div>
</div>
</div>

<!-- content end -->

<div class="w ol pb50 pt10 tags-bottom">
<div class="cb mau w960">
    	<a href="" class="png fr"><img src="image/social_media_sina.png" /></a>
</div>
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
	//$(".about_jpanel").jScrollPane({dragMaxHeight:13,scrollbarWidth:15,autoReinitialise: true});	
});
</script>
<!--[if IE 6]>
<script language="javascript" src="script/DD_belatedPNG.js"></script>
<script>
	DD_belatedPNG.fix('.png,.menu li a');
    document.execCommand("BackgroundImageCache",false,true);
</script>
<![endif]-->