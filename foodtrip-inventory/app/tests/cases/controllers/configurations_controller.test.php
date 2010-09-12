<?php
/* Configurations Test cases generated on: 2010-09-07 14:09:42 : 1283869962*/
App::import('Controller', 'Configurations');

class TestConfigurationsController extends ConfigurationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ConfigurationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.configuration');

	function startTest() {
		$this->Configurations =& new TestConfigurationsController();
		$this->Configurations->constructClasses();
	}

	function endTest() {
		unset($this->Configurations);
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