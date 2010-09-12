<?php
/* ProductsSupplier Test cases generated on: 2010-09-04 14:09:05 : 1283610065*/
App::import('Model', 'ProductsSupplier');

class ProductsSupplierTestCase extends CakeTestCase {
	var $fixtures = array('app.products_supplier', 'app.supplier', 'app.product', 'app.inventory', 'app.station', 'app.user', 'app.stations_user', 'app.transaction');

	function startTest() {
		$this->ProductsSupplier =& ClassRegistry::init('ProductsSupplier');
	}

	function endTest() {
		unset($this->ProductsSupplier);
		ClassRegistry::flush();
	}

}
?>