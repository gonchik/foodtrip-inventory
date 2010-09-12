<?php
/* Inventories Test cases generated on: 2010-09-04 13:09:31 : 1283608711*/
App::import('Controller', 'Inventories');

class TestInventoriesController extends InventoriesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class InventoriesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.inventory', 'app.product', 'app.supplier', 'app.products_supplier', 'app.station', 'app.user', 'app.stations_user', 'app.transaction');

	function startTest() {
		$this->Inventories =& new TestInventoriesController();
		$this->Inventories->constructClasses();
	}

	function endTest() {
		unset($this->Inventories);
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