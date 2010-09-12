<?php
/* InvoiceItems Test cases generated on: 2010-09-10 09:09:57 : 1284112017*/
App::import('Controller', 'InvoiceItems');

class TestInvoiceItemsController extends InvoiceItemsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class InvoiceItemsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.invoice_item', 'app.product', 'app.inventory', 'app.station', 'app.user', 'app.stations_user', 'app.transaction', 'app.supplier', 'app.products_supplier', 'app.invoice');

	function startTest() {
		$this->InvoiceItems =& new TestInvoiceItemsController();
		$this->InvoiceItems->constructClasses();
	}

	function endTest() {
		unset($this->InvoiceItems);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>