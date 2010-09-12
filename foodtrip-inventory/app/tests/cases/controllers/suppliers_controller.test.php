<?php
/* Suppliers Test cases generated on: 2010-09-04 14:09:30 : 1283609490*/
App::import('Controller', 'Suppliers');

class TestSuppliersController extends SuppliersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SuppliersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.supplier', 'app.product', 'app.inventory', 'app.station', 'app.user', 'app.stations_user', 'app.transaction', 'app.products_supplier');

	function startTest() {
		$this->Suppliers =& new TestSuppliersController();
		$this->Suppliers->constructClasses();
	}

	function endTest() {
		unset($this->Suppliers);
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