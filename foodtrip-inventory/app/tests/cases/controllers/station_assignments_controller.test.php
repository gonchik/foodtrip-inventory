<?php
/* StationAssignments Test cases generated on: 2010-09-10 09:09:40 : 1284112060*/
App::import('Controller', 'StationAssignments');

class TestStationAssignmentsController extends StationAssignmentsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class StationAssignmentsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.station_assignment', 'app.station', 'app.inventory', 'app.product', 'app.supplier', 'app.products_supplier', 'app.transaction', 'app.user', 'app.stations_user');

	function startTest() {
		$this->StationAssignments =& new TestStationAssignmentsController();
		$this->StationAssignments->constructClasses();
	}

	function endTest() {
		unset($this->StationAssignments);
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