<?php
/* Inventory Test cases generated on: 2010-09-04 13:09:11 : 1283608691*/
App::import('Model', 'Inventory');

class InventoryTestCase extends CakeTestCase {
	var $fixtures = array('app.inventory', 'app.product', 'app.supplier', 'app.products_supplier', 'app.station', 'app.user', 'app.stations_user', 'app.transaction');

	function startTest() {
		$this->Inventory =& ClassRegistry::init('Inventory');
	}

	function endTest() {
		unset($this->Inventory);
		ClassRegistry::flush();
	}

}
?>