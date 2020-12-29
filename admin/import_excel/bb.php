<?php
	require_once 'PHPExcel/Classes/PHPExcel.php';
	require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
	require_once 'PHPExcel/Classes/PHPExcel/Reader/Excel5.php';
	//以上三步加载phpExcel的类
 	$objReader = PHPExcel_IOFactory::createReader('excel2007'); // use Excel5 for 2003 format 
	$excelpath='qq.xlsx';
 	$objPHPExcel = PHPExcel_IOFactory::load($excelpath);
    $sheet = $objPHPExcel->getSheet(0);   //第一个标签
    $highestRow = $sheet->getHighestRow();       //取得总行数 
    $highestColumn = $sheet->getHighestColumn(); //取得总列数
    error_reporting( E_ALL&~E_NOTICE );
    $str = "";
    for($j=2;$j<=$highestRow;$j++){ 
        $id = "";
        $name = "";
        for($k='A';$k<=$highestColumn;$k++){ 
                    $str = $sheet->getCell($k.$j)->getValue();
                    if ($k=='A') $id = $str;
                    if ($k=='B') $name = $str;
                } 
                echo $id; echo $name;
        }
?>