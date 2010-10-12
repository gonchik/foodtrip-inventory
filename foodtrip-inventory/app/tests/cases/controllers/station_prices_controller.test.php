<?php
/* StationPrices Test cases generated on: 2010-10-11 07:10:40 : 1286783080*/
App::import('Controller', 'StationPrices');

class TestStationPricesController extends StationPricesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class StationPricesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.station_price', 'app.station', 'app.inventory', 'app.product', 'app.supplier', 'app.products_supplier', 'app.transaction', 'app.user');

	function startTest() {
		$this->StationPrices =& new TestStationPricesController();
		$this->StationPrices->constructClasses();
	}

	function endTest() {
		unset($this->StationPrices);
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