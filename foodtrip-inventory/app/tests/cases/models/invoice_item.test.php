<?php
/* InvoiceItem Test cases generated on: 2010-09-10 09:09:09 : 1284111969*/
App::import('Model', 'InvoiceItem');

class InvoiceItemTestCase extends CakeTestCase {
	var $fixtures = array('app.invoice_item', 'app.product', 'app.inventory', 'app.station', 'app.user', 'app.stations_user', 'app.transaction', 'app.supplier', 'app.products_supplier', 'app.invoice');

	function startTest() {
		$this->InvoiceItem =& ClassRegistry::init('InvoiceItem');
	}

	function endTest() {
		unset($this->InvoiceItem);
		ClassRegistry::flush();
	}

}
?>