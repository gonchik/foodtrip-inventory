<?php
/* InvoiceItem Fixture generated on: 2010-09-10 09:09:09 : 1284111969 */
class InvoiceItemFixture extends CakeTestFixture {
	var $name = 'InvoiceItem';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'price' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => 10),
		'invoice_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'product_id' => 1,
			'quantity' => 1,
			'price' => 1,
			'invoice_id' => 1,
			'created' => '2010-09-10 09:46:09',
			'updated' => '2010-09-10 09:46:09'
		),
	);
}
?>