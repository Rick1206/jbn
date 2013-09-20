<?php
define('IN_SK',true);
require_once('./includes/init.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓-物资转送</title>

<meta name="keywords" content="孩子"/> 
<meta name="description" content="孩子的健康和未来,物资转送"/>

<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
</head>
<body class="bg2">
<?php
	$navNum = 8;
	include "head.php"; 
?>

<div class="w bgfff">
<div class="w650 ol pt20 pb30 f14">
<p>非常感谢大家对中心小苹果们的热心关照和帮助，送来的各类物资中心均以实际需要进行分配。由于中心需求有限，但又希望通过中心能够延续大家的热忱爱心，因此借由家百浓儿童中心平台将多余物资进行转送，希望能够帮助更多地区儿童救助中心的需要。<br /><br />
请有需求的朋友仔细查询以下列表，并填写完整申请信息，我们将在收到信息后7个工作日内与您联系，核对信息，并安排后续工作。如您需了解更多信息请邮件至: <br />
<!--<a href="mailto:wei.wang@foreverloveinchina.com">wei.wang@foreverloveinchina.com</a> 或--> 
<a href="mailto:max.liu@foreverloveinchina.com">max.liu@foreverloveinchina.com</a>
</p>
	<!--<span>非常感谢大家对小苹果的帮助，目前家百浓有以下剩余物资，希望能够帮助其他需要帮助的人，如果你有需要，可以来这里申请</span>-->
    <div class="pt20">
    	<div class="pro_jpanel">
        
        	<table cellpadding="0" cellspacing="0" border="0" class="prere">
            	
            	<tr><th width="150">物品名称</th><th width="110">物品数量</th><th width="150">图片</th><th width="150"></th></tr>
       	 		<?php
				$myquery = $db->query("SELECT product_id, photo, pcount, title_".$lang." as title FROM ".$ea->table('product')." ORDER BY orderby, product_id LIMIT 0, 20");
				while($thisB = $db->fetch_array($myquery)) {
				?>
                <tr>
                	<td><?php echo $thisB['title']?></td><td><?php echo $thisB['pcount']?></td><td><?php 
					if(!empty($thisB['photo'])){
					echo '<img src="'.$file_dir.'/product/'.$thisB['photo'].'" />';} ?></td><td><a href="product_into.php?product_id=<?php echo $thisB["product_id"];?>"><img src="image/prore/apply_green.jpg" border="0" /></a></td>
                </tr>
          	<?php
      		  }
			$thisB = null;
			$myquery = null;
			$db->close();
       		 ?>
            </table>
        </div>
    </div>
</div>
</div>


<div class="w ol pt50 pb20 tags-bottom"></div>
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
	$(".pro_jpanel").jScrollPane({dragMaxHeight:13,scrollbarWidth:15});	
});
</script>
<!--[if IE 6]>
<script language="javascript" src="script/DD_belatedPNG.js"></script>
<script>
	DD_belatedPNG.fix('.png,.menu li a');
    document.execCommand("BackgroundImageCache",false,true);
</script>
<![endif]-->