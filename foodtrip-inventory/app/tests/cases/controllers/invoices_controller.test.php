<?php
/* Invoices Test cases generated on: 2010-09-10 09:09:14 : 1284112034*/
App::import('Controller', 'Invoices');

class TestInvoicesController extends InvoicesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class InvoicesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.invoice', 'app.invoice_item', 'app.product', 'app.inventory', 'app.station', 'app.user', 'app.stations_user', 'app.transaction', 'app.supplier', 'app.products_supplier');

	function startTest() {
		$this->Invoices =& new TestInvoicesController();
		$this->Invoices->constructClasses();
	}

	function endTest() {
		unset($this->Invoices);
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