<?php
/* Invoice Fixture generated on: 2010-09-10 09:09:10 : 1284111910 */
class InvoiceFixture extends CakeTestFixture {
	var $name = 'Invoice';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'total_net_price' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '10,2'),
		'total_gross_price' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '10,2'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'total_net_price' => 1,
			'total_gross_price' => 1,
			'created' => '2010-09-10 09:45:10',
			'updated' => '2010-09-10 09:45:10'
		),
	);
}
?>