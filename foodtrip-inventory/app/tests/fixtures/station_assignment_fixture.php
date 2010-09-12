<?php
/* StationAssignment Fixture generated on: 2010-09-10 09:09:02 : 1284111842 */
class StationAssignmentFixture extends CakeTestFixture {
	var $name = 'StationAssignment';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'station_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'station_id' => 1,
			'user_id' => 1,
			'created' => '2010-09-10 09:44:02',
			'updated' => '2010-09-10 09:44:02'
		),
	);
}
?>