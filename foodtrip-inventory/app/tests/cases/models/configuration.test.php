<?php
/* Configuration Test cases generated on: 2010-09-07 14:09:10 : 1283869930*/
App::import('Model', 'Configuration');

class ConfigurationTestCase extends CakeTestCase {
	var $fixtures = array('app.configuration');

	function startTest() {
		$this->Configuration =& ClassRegistry::init('Configuration');
	}

	function endTest() {
		unset($this->Configuration);
		ClassRegistry::flush();
	}

}
?>