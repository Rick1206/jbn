<?php
define('IN_SK',true);
require_once '../includes/init.php';
require_once '../Classes/PHPExcel.php';
require_once '../Classes/PHPExcel/IOFactory.php';

//---- year ----//
$fyear = date("Y");
//---- month ----//
$fmon = 10;
$fyear = 2012;
if($fmon <10){
$fmon = str_replace("0", "", $fmon);
}
if($_GET["year"] != ""){
	$fyear = $_GET["year"];
}
if($_GET["month"] != "" ){
	$fmon = $_GET["month"]; 
}

if($fmon<10){
	$fmon2 = "0".$fmon;
}else{
	$fmon2 = $fmon;
}

$xlsUrl = "../uploadfiles/finance_".$lang;
$inputFileName = $xlsUrl."/".$fyear."-".$fmon2."_en.xlsx";
//echo $inputFileName;
if(file_exists($inputFileName)) {
	$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	
		class MyReadFilter implements PHPExcel_Reader_IReadFilter{
			public function readCell($column, $row, $worksheetName = '') {
				// Read rows 1 to 7 and columns A to E only
				//if ($row >= 1 && $row <= 2) {
					if (in_array($column,range('A','B'))) {
						return true;
					}
				//}
				return false;
			}
		}
	
	$filterSubset = new MyReadFilter();
	$objReader->setReadFilter($filterSubset);
	$objPHPExcel = $objReader->load($inputFileName);
	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Forever Love - Financials</title>
<meta name="keywords" content="孩子,家百浓"/> 
<meta name="description" content="财务公开-财务明细"/>
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
    <div class="tags png"><div class="tags-content png"><ul><li class="tagon"><a href="finance.php"><img src="image/tags/finance_03.png" /></a></li></ul></div><div class="tags-right png"></div></div> 
</div>
</div>
<div class="w bgfff">
<div class="w970 ol pt20 pb30" >
	<div class="fl pl30">
    <div class="f14 w800 pb10">
    <p>Forever Love Children Center authorizes Shanghai Shi-Cheng Certified Public Accounts to do semi-annual auditing work and post results on the website. Forever Love Children Center is also under financial supervision of Foster Park, Shanghai Yue Miao People with Disabilities. We sincerely thank your love offerings.</p></div>
    	<strong class="f16 pb10 finace-font"><?php echo $fyear.".".$fmon; ?> Financial </strong>
        <table border="0" cellpadding="2" cellspacing="0" class="finance">
        	<?php        
			  $num = 1;
			  $snum = 0;
			  foreach($sheetData as $i){
				  if($num%2==1){  
						echo "<tr class='tt'><td width='50' align='center' >".$num."</td>";
				  }else{
					 echo "<tr class='odd'><td width='50' align='center' >".$num."</td>";
				  }
				
				  foreach ($i as $ii) {
					 // echo $snum;
					  if($snum == 0){
					  	echo  "<td colspan='2'>".$ii."</td>";
					  }
					  if($snum == 2){
					  	echo  "<td colspan='2' height='80' style='padding:5px'>".$ii."</td>";
					  }
					  if($snum>3){
						  echo  "<td>".$ii."</td>";
					  }
					  $snum++;
				  }
				  echo "</tr>";
				  
				  $num ++;
			  }
			?>
           <!-- <tr class="odd"><td class="odd-t1"></td><td class="odd-t2"></td><td class="nobr odd-t3"></td></tr>-->
        </table>
        <div class="finance-bt"></div>
    </div>
    
    <div class="pt20 cb" style="min-height:350px;_height:350px;">
   	<div class="w230 pt20 pl30">
        	<div class="tc f14">Financial </div>
            <div class="cb pt10">
            <form method="get" action="finance.php">
            	<div class="finace-drop" style="z-index:99" comment="year">
                	<span class="show"><?php echo $fyear;?></span>
                    <ul id="insertyear"></ul>
   	 			<input type="hidden" id="year" name="year" value="<?php echo $fyear;?>"/>
                </div>
                <strong class="f-b">Y</strong>
                <div class="finace-drop" comment="month">
                	<span class="show"><?php echo $fmon;?></span>
                     <ul id="insertmonth"></ul>
   	 			<input type="hidden" id="month"  name="month" value="<?php echo $fmon;?>"/>
                </div>
                <strong class="f-b">M</strong>
                <input type="submit" class="finance_submit" value="查询" />
                </form>
            </div>
            <!--<div class="pt50 f14 tc">上海市XX律师事务所监督</div>-->
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
