<?php
/* SupplierProduct Fixture generated on: 2010-10-11 12:10:42 : 1286798562 */
class SupplierProductFixture extends CakeTestFixture {
	var $name = 'SupplierProduct';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'supplier_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'cost' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '12,2'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'supplier_id' => 1,
			'product_id' => 1,
			'created' => '2010-10-11 12:02:42',
			'updated' => '2010-10-11 12:02:42',
			'cost' => 1
		),
	);
}
?>