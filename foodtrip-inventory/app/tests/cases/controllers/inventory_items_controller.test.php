<?php
/* InventoryItems Test cases generated on: 2010-09-10 09:09:36 : 1284111996*/
App::import('Controller', 'InventoryItems');

class TestInventoryItemsController extends InventoryItemsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class InventoryItemsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.inventory_item', 'app.product', 'app.inventory', 'app.station', 'app.user', 'app.stations_user', 'app.transaction', 'app.supplier', 'app.products_supplier');

	function startTest() {
		$this->InventoryItems =& new TestInventoryItemsController();
		$this->InventoryItems->constructClasses();
	}

	function endTest() {
		unset($this->InventoryItems);
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