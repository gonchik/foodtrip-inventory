<?php
/* SupplierProduct Test cases generated on: 2010-10-11 12:10:44 : 1286798564*/
App::import('Model', 'SupplierProduct');

class SupplierProductTestCase extends CakeTestCase {
	var $fixtures = array('app.supplier_product', 'app.supplier', 'app.product', 'app.inventory', 'app.station', 'app.transaction', 'app.user');

	function startTest() {
		$this->SupplierProduct =& ClassRegistry::init('SupplierProduct');
	}

	function endTest() {
		unset($this->SupplierProduct);
		ClassRegistry::flush();
	}

}
?>