<?php
/* StationPrice Fixture generated on: 2010-10-11 07:10:48 : 1286783028 */
class StationPriceFixture extends CakeTestFixture {
	var $name = 'StationPrice';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'station_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'price' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '12,2'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'station_id' => 1,
			'product_id' => 1,
			'price' => 1,
			'created' => '2010-10-11 07:43:48',
			'updated' => '2010-10-11 07:43:48'
		),
		array(
			'id' => 2,
			'station_id' => 1,
			'product_id' => 2,
			'price' => 1,
			'created' => '2010-10-11 07:43:48',
			'updated' => '2010-10-11 07:43:48'
		),
	);
}
?>