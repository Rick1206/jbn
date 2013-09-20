<?php
define('IN_SK',true);
require_once('../includes/init.php');

$fyear = date("Y");

$fmon = date("m");
$fmon = str_replace("0", "", $fmon);

if($_GET["year"] != ""){
	$fyear = $_GET["year"];
}
if($_GET["month"] != "" ){
	$fmon = $_GET["month"]; 
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>家百浓-财务收入</title>
<meta name="keywords" content="孩子,家百浓"/> 
<meta name="description" content="财务公开-财务收入"/>
<link type="text/css" rel="stylesheet" href="css/base.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/jScrollPane.css" />
</head>
<body class="bg2">
<?php
	$navNum = 9;
	include "head.php"; 
?>

<div class="w">
<div class="w960 pr">
    <div class="tags png"><div class="tags-content png"><ul><li class="tagon"><a href="finance.php"><img src="image/tags/finance_01.png" /></a></li><li><a href="finance_out.php"><img src="image/tags/finance_02.png" /></a></li></ul></div><div class="tags-right png"></div></div> 
</div>
</div>
<div class="w bgfff">
<div class="w970 ol pt20 pb30" style="min-height:400px;_height:400px;">
	<div class="fl pl30">
		 <?php
		 	
		 	$where = " and year(dateline)='".$fyear."' and month(dateline)='".$fmon."'";
			
			$myquery = $db->query("SELECT fmoney, dateline, title_".$lang." as title FROM ".$ea->table('finance')."WHERE FTYPE = '0' ".$where." ORDER BY dateline ASC LIMIT 0, 10");
			$int=0;
			$intAll=0;
			
		?>    
    	<strong class="f16 pb10 finace-font"><?php echo $fyear.".".$fmon; ?> 收入明细</strong>
        <table border="0" cellpadding="2" cellspacing="0" class="finance">
        	<tr class="tt">
            	<th width="164"></th><th width="125"></th><th width="125" class="nobr"></th>
            </tr>
             <?php
				while($thisB = $db->fetch_array($myquery)) {
					$intAll += $thisB["fmoney"];
			?>
            <tr class="<?php echo $int%2==1 ? "odd":""; ?>" ><td class="<?php echo $int%2==1 ? "odd-t1":""; ?>" ><?php echo $thisB["title"] ?></td><td class="<?php echo $int%2==1 ? "odd-t2":""; ?>"><?php echo date("Y.m.d",strtotime($thisB['dateline'])) ?></td><td class="nobr <?php echo $int%2==1 ? "odd-t3":""; ?>"><?php echo $thisB["fmoney"] ?></td></tr>
            <?php
				$int++;
			}
			$thisB = null;
			 $myquery = null;
			?>
            <tr class="odd"><td class="odd-t1"></td><td class="odd-t2"></td><td class="nobr odd-t3">总计：<?php echo $intAll;?></td></tr>
            
        </table>
        <div class="finance-bt"></div>
    </div>
    
    <div class="fl pt20">
   	<div class="w230 pt20 pl30">
        	<div class="tc f14">财务明细查询</div>
            <div class="cb pt10">
            <form method="get" action="finance.php">
            	<div class="finace-drop" style="z-index:99" comment="year">
                	<span class="show"><?php echo $fyear;?></span>
                    <ul id="insertyear"></ul>
   	 			<input type="hidden" id="year" name="year" value="<?php echo $fyear;?>"/>
                </div>
                <strong class="f-b">年</strong>
                <div class="finace-drop" comment="month">
                	<span class="show"><?php echo $fmon;?></span>
                     <ul id="insertmonth"></ul>
   	 			<input type="hidden" id="month"  name="month" value="<?php echo $fmon;?>"/>
                </div>
                <strong class="f-b">月</strong>
                <input type="submit" class="finance_submit" value="查询" />
                </form>
            </div>
            <div class="pt50 f10 tc">上海市XX律师事务所监督</div>
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
	insertLi("#insertyear",1998,2012);
	insertLi("#insertmonth",1,12);
});
</script>
<!--[if IE 6]>
<script language="javascript" src="script/DD_belatedPNG.js"></script>
<script>
	DD_belatedPNG.fix('.png,.menu li a');
    document.execCommand("BackgroundImageCache",false,true);
</script>
<![endif]-->
