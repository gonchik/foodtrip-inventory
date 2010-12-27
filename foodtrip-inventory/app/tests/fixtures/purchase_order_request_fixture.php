<?php
/* PurchaseOrderRequest Fixture generated on: 2010-10-13 05:10:01 : 1286947021 */
class PurchaseOrderRequestFixture extends CakeTestFixture {
	var $name = 'PurchaseOrderRequest';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'supplier_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'approvedBy' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'cancelledBy' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'dateCancelled' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'dateApproved' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'remarks' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'code' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'supplier_id' => 1,
			'user_id' => 1,
			'approvedBy' => 1,
			'cancelledBy' => 1,
			'dateCancelled' => '2010-10-13 05:17:01',
			'dateApproved' => '2010-10-13 05:17:01',
			'remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2010-10-13 05:17:01',
			'updated' => '2010-10-13 05:17:01',
			'code' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);
}
?>