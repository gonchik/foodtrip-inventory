<?php
/* Stations Test cases generated on: 2010-09-04 13:09:27 : 1283607987*/
App::import('Controller', 'Stations');

class TestStationsController extends StationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class StationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.station', 'app.inventory', 'app.user', 'app.stations_user');

	function startTest() {
		$this->Stations =& new TestStationsController();
		$this->Stations->constructClasses();
	}

	function endTest() {
		unset($this->Stations);
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