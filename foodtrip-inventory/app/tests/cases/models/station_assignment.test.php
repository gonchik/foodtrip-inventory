<?php
/* StationAssignment Test cases generated on: 2010-09-10 09:09:02 : 1284111842*/
App::import('Model', 'StationAssignment');

class StationAssignmentTestCase extends CakeTestCase {
	var $fixtures = array('app.station_assignment', 'app.station', 'app.inventory', 'app.product', 'app.supplier', 'app.products_supplier', 'app.transaction', 'app.user', 'app.stations_user');

	function startTest() {
		$this->StationAssignment =& ClassRegistry::init('StationAssignment');
	}

	function endTest() {
		unset($this->StationAssignment);
		ClassRegistry::flush();
	}

}
?>