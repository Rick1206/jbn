<?php 
	require_once 'PHPExcel-1.7.7/Classes/PHPExcel.php';
	
	function GetData($val){
    	$jd = GregorianToJD(1, 1, 1970);
    	$gregorian = JDToGregorian($jd+intval($val)-25569);
    	return $gregorian;
	}
	
	$objPHPExcel = PHPExcel_IOFactory::load("05featuredemo.xlsx");
	
	/*$objPHPExcel = new PHPExcel();
	
	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 	 ->setLastModifiedBy("Maarten Balliauw")
							 	 ->setTitle("PDF Test Document")
							     ->setSubject("PDF Test Document")
							     ->setDescription("Test document for PDF, generated using PHP classes.")
							     ->setKeywords("pdf php")
							     ->setCategory("Test result file");
							 
	$objPHPExcel->setActiveSheetIndex(0)
            	->setCellValue('A1', 'Hello')
            	->setCellValue('B2', 'world!')
            	->setCellValue('C1', 'Hello')
            	->setCellValue('D2', 'world!');

	//$objPHPExcel->getActiveSheet()->setTitle('Simple');
	
	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

	// Rename worksheet
	
	$objPHPExcel->getActiveSheet()->setTitle('Simple');
	
	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	
	$objPHPExcel->setActiveSheetIndex(0);
	
	// Redirect output to a client’s web browser (Excel5)
	
	header('Content-Type: application/vnd.ms-excel');
	
	header('Content-Disposition: attachment;filename="01simple.xlsx"');
	
	header('Cache-Control: max-age=0');
	
	//header('Content-Disposition: attachment;filename="01simple.xlsx"');
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	
	$objWriter->save('php://output');									 
	
	exit;*/
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>123</title>
</head>

<body>
</body>
</html>