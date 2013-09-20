<?php
define('IN_SK',true);
require_once('../includes/init.php');
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
<p>Many thanks for your care and love to our children. If we find extra items not needed in the near term, we will pass your love on to other non-profit children caring related institutions.

If you are a non-profit children caring institute, please review the following list and fill in the application form online. We will contact with you within 7 days to confirm information and prepare shipping. If you need more information, please send to <a href="mailto:max.liu@foreverloveinchina.com" class="font-agreen">max.liu@foreverloveinchina.com</a>
</p>
	<!--<span>非常感谢大家对小苹果的帮助，目前家百浓有以下剩余物资，希望能够帮助其他需要帮助的人，如果你有需要，可以来这里申请</span>-->
    <div class="pt20">
    	<div class="pro_jpanel">
        
        	<table cellpadding="0" cellspacing="0" border="0" class="prere">
            	
            	<tr><th width="150">Names</th><th width="110">Quantity</th><th width="150">Picture</th><th width="150"></th></tr>
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