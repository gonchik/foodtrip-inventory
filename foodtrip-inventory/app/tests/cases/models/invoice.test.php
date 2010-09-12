<?php
/* Invoice Test cases generated on: 2010-09-10 09:09:10 : 1284111910*/
App::import('Model', 'Invoice');

class InvoiceTestCase extends CakeTestCase {
	var $fixtures = array('app.invoice', 'app.invoice_item');

	function startTest() {
		$this->Invoice =& ClassRegistry::init('Invoice');
	}

	function endTest() {
		unset($this->Invoice);
		ClassRegistry::flush();
	}

}
?>