<?php
/* InventoryItem Test cases generated on: 2010-09-10 09:09:39 : 1284111759*/
App::import('Model', 'InventoryItem');

class InventoryItemTestCase extends CakeTestCase {
	var $fixtures = array('app.inventory_item', 'app.product', 'app.inventory', 'app.station', 'app.user', 'app.stations_user', 'app.transaction', 'app.supplier', 'app.products_supplier');

	function startTest() {
		$this->InventoryItem =& ClassRegistry::init('InventoryItem');
	}

	function endTest() {
		unset($this->InventoryItem);
		ClassRegistry::flush();
	}

}
?>