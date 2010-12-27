<?php
App::import('vendor', 'Spreadsheet_Excel_Writer', array('file' => '../vendors/Pear/Spreadsheet/Excel/Writer.php'));

class PricelistGeneratorHelper extends AppHelper {
	
	/**
	 * Other helpers used by PricelistGeneratorHelper
	 *
	 * @var array
	 * @access public
	 */
	var $helpers = array('Number', 'Time');
	
	function generate($stationPrices) {
		// Set up the header array
		$titles = array(
			'Product' => 20,
			'Selling Price' => 10,
			' ' => 50
		);
		
		$rn = 0; // row number
		// Build the XLS file using PEAR
		$xlsBook = new Spreadsheet_Excel_Writer();
		$xlsBook->send("pricelist.xls");
		$xls =& $xlsBook->addWorksheet('Pricelist');
		
		/* Create styles for the spreadsheet */
		$format_bold =& $xlsBook->addFormat();
		$format_bold->setBold();
		
		$main =& $xlsBook->addFormat(array(
			'Size' => 14,
			'Align' => 'center',
			'Color' => 'black',
			'Bold' => 'true'
		));
		$main->setBold();
		
		$formatText =& $xlsBook->addFormat(array('Size' => 11));
		
		$cn = 0;
		$xls->write($rn, 0, "COMPANY NAME", $main);
		$xls->mergeCells($rn,0,$rn,count($titles) - 1);
		$rn++;
		$xls->write($rn, 0, "PRICE LIST", $main);
		$xls->mergeCells($rn,0,$rn,count($titles) - 1);
		$rn++;
		$xls->write($rn, 0, "DATE: ____________________", $main);
		$xls->mergeCells($rn,0,$rn,count($titles) - 1);
		$rn++;
		
		$rn++;	//add a space after the header
		
		// Set up the headings of the columns
		foreach ( $titles as $t => $val){
			$xls->setColumn($cn, $cn, $val);
			$xls->write($rn, $cn++, $t, $format_bold);
		}
		$rn++;
		// reset the column num
		$cn = 0;
		
		foreach ( $stationPrices as $stationPrice ){
			$xls->write($rn, $cn++, $stationPrice['Product']['name'], $formatText);
			$xls->write($rn, $cn++, $stationPrice['StationPrice']['price'], $formatText);
			// cycle to the next row
			$rn++;
			// Reset the column
			$cn = 0;
		}
		
		$xlsBook->close();
		exit();
	}
}
?>