<?php
/* Transactions Test cases generated on: 2010-09-04 14:09:27 : 1283608947*/
App::import('Controller', 'Transactions');

class TestTransactionsController extends TransactionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TransactionsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.transaction', 'app.inventory', 'app.product', 'app.supplier', 'app.products_supplier', 'app.station', 'app.user', 'app.stations_user');

	function startTest() {
		$this->Transactions =& new TestTransactionsController();
		$this->Transactions->constructClasses();
	}

	function endTest() {
		unset($this->Transactions);
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