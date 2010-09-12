<?php
class Invoice extends AppModel {
	var $name = 'Invoice';
	var $validate = array(
		'total_net_price' => array(
			'money' => array(
				'rule' => array('money'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_gross_price' => array(
			'money' => array(
				'rule' => array('money'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'InvoiceItem' => array(
			'className' => 'InvoiceItem',
			'foreignKey' => 'invoice_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	var $belongsTo = array(
		'Station' => array(
			'className' => 'Station',
			'foreignKey' => 'station_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	function getInvoicesFrom($stationId) {
		return $this->find('all',
			array('conditions'=>array('station_id'=>$stationId))
		);
	}
	
	function getOrGenerateTodaysInvoiceFrom($stationId) {
		$startDate = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d'), date('Y')));
		$endDate = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d'), date('Y')));
		$invoice = $this->find('first',
			array('conditions'=>array(
				'station_id'=>$stationId,
				'Invoice.created >='=>$startDate,
				'Invoice.created <='=>$endDate
			))
		);
		if($invoice == null) {
			$data = array();
			$data['Invoice']['station_id'] = $stationId;
			$data['Invoice']['total_net_price'] = 0;
			$data['Invoice']['total_gross_price'] = 0;
			$invoice = $this->save($data);
		}
		return $invoice;
	}
}
?>