<?php
/* Transaction Test cases generated on: 2010-09-04 14:09:04 : 1283608924*/
App::import('Model', 'Transaction');

class TransactionTestCase extends CakeTestCase {
	var $fixtures = array('app.transaction', 'app.inventory', 'app.product', 'app.supplier', 'app.products_supplier', 'app.station', 'app.user', 'app.stations_user');

	function startTest() {
		$this->Transaction =& ClassRegistry::init('Transaction');
	}

	function endTest() {
		unset($this->Transaction);
		ClassRegistry::flush();
	}

}
?>