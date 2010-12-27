<?php
/* Transaction Fixture generated on: 2010-12-25 09:12:45 : 1293270705 */
class TransactionFixture extends CakeTestFixture {
	var $name = 'Transaction';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'inventory_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'station_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'transaction_type' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'old_cost' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '12,4'),
		'old_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'new_cost' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '12,4'),
		'new_quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'remarks' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'transaction_number' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'inventory_id' => 1,
			'product_id' => 1,
			'station_id' => 1,
			'user_id' => 1,
		
			'transaction_type' => 'GOODS_RECEIVED',
			'old_cost' => 0,
			'old_quantity' => 0,
			'new_cost' => 10,
			'new_quantity' => 10,
			'remarks' => 'received',
			'transaction_number' => 11123545,
		
			'created' => '2010-10-11 12:02:42',
			'updated' => '2010-10-11 12:02:42'
		),
		array(
			'id' => 2,
			'inventory_id' => 1,
			'product_id' => 1,
			'station_id' => 1,
			'user_id' => 1,
		
			'transaction_type' => 'SALES',
			'old_cost' => 10,
			'old_quantity' => 10,
			'new_cost' => 9,
			'new_quantity' => 9,
			'remarks' => 'sold',
			'transaction_number' => 11123545,
		
			'created' => '2010-10-11 12:02:42',
			'updated' => '2010-10-11 12:02:42'
		),
		array(
			'id' => 3,
			'inventory_id' => 1,
			'product_id' => 1,
			'station_id' => 1,
			'user_id' => 1,
		
			'transaction_type' => 'SALES',
			'old_cost' => 9,
			'old_quantity' => 9,
			'new_cost' => 8,
			'new_quantity' => 8,
			'remarks' => 'sold',
			'transaction_number' => 11123545,
		
			'created' => '2010-10-11 12:02:42',
			'updated' => '2010-10-11 12:02:42'
		),
	);
}
?>