<?php
/* Inventory Fixture generated on: 2010-09-04 13:09:11 : 1283608691 */
class InventoryFixture extends CakeTestFixture {
	var $name = 'Inventory';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'cost' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => 10),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'station_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'product_id' => 1,
			'cost' => 1,
			'quantity' => 1,
			'station_id' => 1,
			'created' => '2010-09-04 13:58:11',
			'updated' => '2010-09-04 13:58:11'
		),
	);
}
?>