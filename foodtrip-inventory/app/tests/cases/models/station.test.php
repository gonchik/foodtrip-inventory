<?php
/* Station Test cases generated on: 2010-09-04 13:09:04 : 1283606344*/
App::import('Model', 'Station');

class StationTestCase extends CakeTestCase {
	var $fixtures = array('app.station', 'app.inventory', 'app.user', 'app.stations_user');

	function startTest() {
		$this->Station =& ClassRegistry::init('Station');
	}

	function endTest() {
		unset($this->Station);
		ClassRegistry::flush();
	}

}
?>