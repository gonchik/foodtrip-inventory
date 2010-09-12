<?php
/* Product Test cases generated on: 2010-09-04 13:09:35 : 1283608355*/
App::import('Model', 'Product');

class ProductTestCase extends CakeTestCase {
	var $fixtures = array('app.product', 'app.inventory', 'app.supplier', 'app.products_supplier');

	function startTest() {
		$this->Product =& ClassRegistry::init('Product');
	}

	function endTest() {
		unset($this->Product);
		ClassRegistry::flush();
	}

}
?>