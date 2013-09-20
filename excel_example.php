<?php 
define('IN_SK',true);

error_reporting(E_ALL);

require_once('./includes/init.php');

require_once('./Classes/PHPExcel.php');

require_once './Classes/PHPExcel/IOFactory.php';

$xlsUrl = "./uploadfiles/finance_".$lang;

$inputFileName = $xlsUrl."/2012-10_cn.xlsx";


$inputFileType = PHPExcel_IOFactory::identify($inputFileName);

$objReader = PHPExcel_IOFactory::createReader($inputFileType);



class MyReadFilter implements PHPExcel_Reader_IReadFilter
{
	public function readCell($column, $row, $worksheetName = '') {
		// Read rows 1 to 7 and columns A to E only
		//if ($row >= 1 && $row <= 2) {
			if (in_array($column,range('A','F'))) {
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

//var_dump($sheetData);

//echo '<hr />';
//echo $sheetData[1]['A'];


/*$len = count($sheetData);
for ($i = 0; $i < $len; $i++) {
	$c = count($sheetData[$i]);
	echo $sheetData[$i];
	echo $c;
	for ($ii = 0; $ii < $c; $ii++) {
		echo $ii;
		echo $sheetData[$i][$ii];
	}
}
*/



/*$loadedSheetNames = $objPHPExcel->getSheetNames();

foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
	echo $sheetIndex,' -> ',$loadedSheetName,'<br />';
}*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>excel</title>

</head>

<body>

<table width="57%" border="1" align="center" cellpadding="0" cellspacing="0">
<tr align="center">
  <td width="13%">1</td>
  <td width="12%">A1</td>
  <td width="13%">B1</td>
  <td width="13%">C1</td>
  <td width="11%">D1</td>
  <td width="15%">E1</td>
  <td width="23%">F1</td>
  </tr>
<?php 
$num = 2;
foreach($sheetData as $i){
	echo "<tr align='center'><td>".$num."</td>";
	$num ++;
	foreach ($i as $ii) {
		echo "<td>".$ii."</td>";
	}
	echo "</tr>";
}
?>

</table>

</body>

</html>