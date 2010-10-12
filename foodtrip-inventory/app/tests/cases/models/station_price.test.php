<?php
/* StationPrice Test cases generated on: 2010-10-11 07:10:48 : 1286783028*/
App::import('Model', 'StationPrice');

class StationPriceTestCase extends CakeTestCase {
	var $fixtures = array('app.station_price', 'app.station', 'app.inventory', 'app.product', 'app.supplier', 'app.products_supplier', 'app.transaction', 'app.user');

	function startTest() {
		$this->StationPrice =& ClassRegistry::init('StationPrice');
	}

	function endTest() {
		unset($this->StationPrice);
		ClassRegistry::flush();
	}

}
?>