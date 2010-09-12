<?php
/* ProductsSuppliers Test cases generated on: 2010-09-04 14:09:26 : 1283610086*/
App::import('Controller', 'ProductsSuppliers');

class TestProductsSuppliersController extends ProductsSuppliersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ProductsSuppliersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.products_supplier', 'app.supplier', 'app.product', 'app.inventory', 'app.station', 'app.user', 'app.stations_user', 'app.transaction');

	function startTest() {
		$this->ProductsSuppliers =& new TestProductsSuppliersController();
		$this->ProductsSuppliers->constructClasses();
	}

	function endTest() {
		unset($this->ProductsSuppliers);
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