<?php
/* Supplier Test cases generated on: 2010-09-04 13:09:09 : 1283608509*/
App::import('Model', 'Supplier');

class SupplierTestCase extends CakeTestCase {
	var $fixtures = array('app.supplier', 'app.product', 'app.inventory', 'app.products_supplier');

	function startTest() {
		$this->Supplier =& ClassRegistry::init('Supplier');
	}

	function endTest() {
		unset($this->Supplier);
		ClassRegistry::flush();
	}

}
?>