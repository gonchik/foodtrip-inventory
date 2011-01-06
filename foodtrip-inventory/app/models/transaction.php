<?php
class Transaction extends AppModel {
	var $name = 'Transaction';
	var $displayField = 'transaction_number';
	var $actsAs = array('Containable');
	var $transactionTypes = array(
		'SALES'=>'SALES',
		'GOODS_RECEIVED'=>'GOODS_RECEIVED',
		'MODIFICATION'=>'MODIFICATION',
		'RETURN'=>'RETURN',
		'TRANSFER'=>'TRANSFER'
	);
	
	var $validate = array(
		'inventory_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'product_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'station_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'transaction_type' => array(
			'inlist' => array(
				'rule' => array('enum', array('SALES', 'GOODS_RECEIVED', 'MODIFICATION', 'RETURN', 'TRANSFER'), true),
				'message' => 'Unknown Transaction Type',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'old_cost' => array(
//			'money' => array(
//				'rule' => array('money'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
		),
		'old_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'nonnegative' => array(
				'rule' => array('comparison', '>=', 0),
				'message' => 'Quantity cannot be negative',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'new_cost' => array(
//			'money' => array(
//				'rule' => array('money'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
		),
		'new_quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'nonnegative' => array(
				'rule' => array('comparison', '>=', 0),
				'message' => 'Quantity cannot be negative',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'remarks' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Describe the reason for modifying this inventory',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Inventory' => array(
			'className' => 'Inventory',
			'foreignKey' => 'inventory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Station' => array(
			'className' => 'Station',
			'foreignKey' => 'station_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function logGoodsReceived($inventory, $user) {
		$transactionNumber = uniqid("GR-");
		$data = array();
		$data['Transaction']['inventory_id'] = $inventory['Inventory']['id'];
		$data['Transaction']['product_id'] = $inventory['Inventory']['product_id'];
		$data['Transaction']['station_id'] = $inventory['Inventory']['station_id'];
		$data['Transaction']['user_id'] = $user['User']['id'];
		$data['Transaction']['transaction_type'] = $this->transactionTypes['GOODS_RECEIVED'];
		$data['Transaction']['old_cost'] = 0;
		$data['Transaction']['old_quantity'] = 0;
		$data['Transaction']['new_cost'] = $inventory['Inventory']['cost'];
		$data['Transaction']['new_quantity'] = $inventory['Inventory']['quantity'];
		$data['Transaction']['remarks'] = $transactionNumber;
		$data['Transaction']['transaction_number'] = $transactionNumber;
		return $this->save($data);
	}
	
	function logModifyInventory($oldInventory, $newInventory, $remarks, $user) {
		$transactionNumber = uniqid("MI-");
		$data = array();
		$data['Transaction']['inventory_id'] = $newInventory['Inventory']['id'];
		$data['Transaction']['product_id'] = $inventory['Inventory']['product_id'];
		$data['Transaction']['station_id'] = $inventory['Inventory']['station_id'];
		$data['Transaction']['user_id'] = $user['User']['id'];
		$data['Transaction']['transaction_type'] = $this->transactionTypes['MODIFICATION'];
		$data['Transaction']['old_cost'] = $oldInventory['Inventory']['cost'];
		$data['Transaction']['old_quantity'] = $oldInventory['Inventory']['quantity'];
		$data['Transaction']['new_cost'] = $newInventory['Inventory']['cost'];
		$data['Transaction']['new_quantity'] = $newInventory['Inventory']['quantity'];
		$data['Transaction']['remarks'] = $remarks;
		$data['Transaction']['transaction_number'] = $transactionNumber;
		return $this->save($data);
	}
	
	function logSalesTransaction($inventory, $originalCost, $originalQuantity, $remarks, $user) {
		$transactionNumber = uniqid("ST-");
		$data = array();
		$data['Transaction']['inventory_id'] = $inventory['Inventory']['id'];
		$data['Transaction']['product_id'] = $inventory['Inventory']['product_id'];
		$data['Transaction']['station_id'] = $inventory['Inventory']['station_id'];
		$data['Transaction']['user_id'] = $user['User']['id'];
		$data['Transaction']['transaction_type'] = $this->transactionTypes['SALES'];
		$data['Transaction']['old_cost'] = $originalCost;
		$data['Transaction']['old_quantity'] = $originalQuantity;
		$data['Transaction']['new_cost'] = $inventory['Inventory']['cost'];
		$data['Transaction']['new_quantity'] = $inventory['Inventory']['quantity'];
		$data['Transaction']['remarks'] = $remarks;
		$data['Transaction']['transaction_number'] = $transactionNumber;
		return $this->save($data);
	}
	
	function getSellerSalesTransaction($sellerId, $startDate, $endDate) {
		return $this->find('all', 
			array(
				'conditions' => array(
					'Transaction.user_id' => $sellerId,
					'Transacation.created >= ' => $startDate,
					'Transacation.created <= ' => $endDate
				)
			)
		);
	}
	
	function fetchSalesTransactions($stationId, $userId, $startDate, $endDate) {
		$conditions = array(
			'Transaction.transaction_type' => 'SALES',
			'Transaction.created >=' => $startDate,
			'Transaction.created <=' => $endDate,
//			'Transaction.product_id ' => 'StationPrice.product_id'
		);
		if($stationId != '') {
			$conditions = array_merge($conditions, array('Transaction.station_id' => $stationId));
		}
		if($userId != '') {
			$conditions = array_merge($conditions, array('Transaction.user_id' => $userId));
		}
		
		return $this->find('all',
			array(
				'conditions' => $conditions,
				'fields' => array(
					'Transaction.id',
					'Transaction.inventory_id',
					'Transaction.product_id',
					'Transaction.station_id',
					'Transaction.user_id',
					'Transaction.transaction_type',
					'Transaction.created',
					'SUM(Transaction.old_quantity - Transaction.new_quantity) as quantity_sold'
				),
				'group' => array(
					'Transaction.product_id'
				),
				'contain' => array(
					'Product' => array(
						'fields' => array(
							'Product.name'
						)
					),
					'Station' => array(
						'fields' => array(
							'Station.name'
						),
						'StationPrice' => array(
							'fields' => array(
								'StationPrice.price',
//								'StationPrice.product_id'
							)
						)
					),
					'User' => array(
						'fields' => array(
							'User.username'
						)
					)
				)
			)
		);
	}
}
?>