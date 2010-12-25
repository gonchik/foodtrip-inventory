<?php
App::import('vendor', 'Spreadsheet_Excel_Writer', array('file' => '../vendors/Pear/Spreadsheet/Excel/Writer.php'));

class ReportsController extends AppController {

	var $name = 'Reports';
	var $uses = array('User', 'Transaction');
	var $helpers = array('Session', 'Html', 'Form', 'Js', 'Time', 'Xls');

	function seller_sales() {
		$this->layout = 'xls';	
		
		// Set up the header array
		$titles = array(
		'Name' => 15,
		'Address' => 20,
		'City' => 20,
		'State' => 7,
		'Zip Code' => 10,
		'Email' => 20,
		'Phone' => 13,
		);
		
		$rn = 0; // row number
		// Build the XLS file using PEAR
		$xlsBook = new Spreadsheet_Excel_Writer();
		$xlsBook->send("registrations.xls");
		$xls =& $xlsBook->addWorksheet('Registrations');
		
		/* Create styles for the spreadsheet */
		$format_bold =& $xlsBook->addFormat();
		$format_bold->setBold();
		
		$main =& $xlsBook->addFormat(
		array('Size' => 14,
		'Align' => 'center',
		'Color' => 'black',
		'Bold' => 'true'
		));
		$main->setBold();
		
		$formatText =& $xlsBook->addFormat(array('Size' => 11));
		
		$cn = 0;
		$xls->write($rn, 0, "CONFERENCE REGISTRATIONS", $main);
		$xls->mergeCells($rn,0,$rn,11);
		$rn++;
		
		// Set up the headings of the columns
		foreach ( $titles as $t => $val){
		$xls->setColumn($cn, $cn, $val);
		$xls->write($rn, $cn++, $t, $format_bold);
		}
		$rn++;
		// reset the column num
		$cn = 0;
		
//		foreach ( $registrations as $r ){
//		$xls->write($rn, $cn++, $r['Registration']['name'], $formatText);
//		$xls->write($rn, $cn++, $r['Registration']['address'], $formatText);
//		$xls->write($rn, $cn++, $r['Registration']['city'], $formatText);
//		$xls->write($rn, $cn++, $r['Registration']['state'], $formatText);
//		$xls->write($rn, $cn++, $r['Registration']['zip_code'], $formatText);
//		$xls->write($rn, $cn++, $r['Registration']['email'], $formatText);
//		$xls->write($rn, $cn++, $r['Registration']['contact_phone1'], $formatText);
//		// cycle to the next row
//		$rn++;
//		// Reset the column
//		$cn = 0;
//		}
		
		$xlsBook->close();
		exit();
	}
}
?>
