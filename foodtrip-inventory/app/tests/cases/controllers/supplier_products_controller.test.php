<?php
/* SupplierProducts Test cases generated on: 2010-10-11 12:10:01 : 1286798581*/
App::import('Controller', 'SupplierProducts');

class TestSupplierProductsController extends SupplierProductsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SupplierProductsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.supplier_product', 'app.supplier', 'app.product', 'app.inventory', 'app.station', 'app.transaction', 'app.user');

	function startTest() {
		$this->SupplierProducts =& new TestSupplierProductsController();
		$this->SupplierProducts->constructClasses();
	}

	function endTest() {
		unset($this->SupplierProducts);
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