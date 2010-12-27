<?php
/* PurchaseOrderRequestItem Fixture generated on: 2010-10-13 05:10:00 : 1286947080 */
class PurchaseOrderRequestItemFixture extends CakeTestFixture {
	var $name = 'PurchaseOrderRequestItem';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'purchase_order_request_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'product_id' => 1,
			'purchase_order_request_id' => 1,
			'quantity' => 1,
			'created' => '2010-10-13 05:18:00',
			'updated' => '2010-10-13 05:18:00'
		),
	);
}
?>