<?php
App::import('vendor', 'Spreadsheet_Excel_Writer', array('file' => '../vendors/Pear/Spreadsheet/Excel/Writer.php'));

class SalesReportGeneratorHelper extends AppHelper {
	
	/**
	 * Other helpers used by SalesReportGeneratorHelper
	 *
	 * @var array
	 * @access public
	 */
	var $helpers = array('Number', 'Time');
	
	function generate($headerData, $salesTransactions, $stationPrices) {
		$overallTotal = 0;
		
		// Set up the header array
		$titles = array(
			'Date' => 15,
			'Product' => 20,
			'Quantity' => 20,
			'Selling Price' => 7,
			'Total Price' => 10
		);
		
		$rn = 0; // row number
		// Build the XLS file using PEAR
		$xlsBook = new Spreadsheet_Excel_Writer();
		$xlsBook->send("sales_report.xls");
		$xls =& $xlsBook->addWorksheet('Sales Report');
		
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
		$xls->write($rn, 0, $headerData['Report']['CompanyName'], $main);
		$xls->mergeCells($rn,0,$rn,count($titles) - 1);
		$rn++;
		$xls->write($rn, 0, "SALES REPORT", $main);
		$xls->mergeCells($rn,0,$rn,count($titles) - 1);
		$rn++;
		$xls->write($rn, 0, $headerData['Report']['StartDate'].' - '.$headerData['Report']['EndDate'], $main);
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
		
		foreach ( $salesTransactions as $salesTransaction ){
			$xls->write($rn, $cn++, $salesTransaction['Transaction']['created'], $formatText);
			$xls->write($rn, $cn++, $salesTransaction['Product']['name'], $formatText);
			$xls->write($rn, $cn++, $salesTransaction['0']['quantity_sold'], $formatText);
			$sellingPrice = 0;
			foreach ( $stationPrices as $stationPrice ) {
				if($stationPrice['StationPrice']['product_id'] == $salesTransaction['Transaction']['product_id'] ) {
					$sellingPrice = $stationPrice['StationPrice']['price']; 
				}
			}
			$xls->write($rn, $cn++, $sellingPrice, $formatText);
			$xls->write($rn, $cn++, $salesTransaction['0']['quantity_sold'] * $sellingPrice, $formatText);
			// cycle to the next row
			$rn++;
			// Reset the column
			$cn = 0;
		}
		
		$overallTotalStyle =& $xlsBook->addFormat(array(
			'Size' => 11,
			'Underline' => 2
		));
		$overallTotalStyle->setBold();
		
		$cn = count($titles) - 2;
		$xls->setColumn($cn, $cn, 10);
		$xls->write($rn, $cn++, 'Total:', $format_bold);
		$xls->setColumn($cn, $cn, 10);
		$xls->write($rn, $cn++, $this->Number->precision($overallTotal, 2), $overallTotalStyle);
		$rn++;
		
		
		$xlsBook->close();
		exit();
	}
}
?>