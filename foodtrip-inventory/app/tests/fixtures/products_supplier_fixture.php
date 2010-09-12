<?php
/* ProductsSupplier Fixture generated on: 2010-09-04 14:09:05 : 1283610065 */
class ProductsSupplierFixture extends CakeTestFixture {
	var $name = 'ProductsSupplier';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'supplier_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'price' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'supplier_id' => 1,
			'product_id' => 1,
			'price' => 1,
			'created' => '2010-09-04 14:21:05',
			'updated' => '2010-09-04 14:21:05'
		),
	);
}
?>