<?php
    /**
     * Export all member records in .xls format
     * with the help of the xlsHelper
     */

	//input the export file name
	$xls->setHeader('Model_'.date('Y_m_d'));

    $xls->addXmlHeader();
    $xls->setWorkSheetName('Model');

    //1st row for columns name
    $xls->openRow();
    $xls->writeString('NumberField1');
    $xls->writeString('StringField2');
    $xls->writeString('StringField3');
    $xls->writeString('NumberField4');
    $xls->closeRow();

    //rows for data
//    foreach ($models as $model):
    	$xls->openRow();
	    $xls->writeNumber('100.00');
	    $xls->writeString('sdf');
	    $xls->writeString('asd');
	    $xls->writeNumber('106.00');
	    $xls->closeRow();
//    endforeach;

    $xls->addXmlFooter();
    exit();
?>
