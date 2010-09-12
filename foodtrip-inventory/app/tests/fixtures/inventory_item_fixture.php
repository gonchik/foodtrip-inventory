<?php
/* InventoryItem Fixture generated on: 2010-09-10 09:09:39 : 1284111759 */
class InventoryItemFixture extends CakeTestFixture {
	var $name = 'InventoryItem';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'supplier_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'price' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '10,2'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'product_id' => 1,
			'supplier_id' => 1,
			'price' => 1,
			'created' => '2010-09-10 09:42:39',
			'updated' => '2010-09-10 09:42:39'
		),
	);
}
?>