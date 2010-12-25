<?php
class PurchaseOrderRequest extends AppModel {
	var $name = 'PurchaseOrderRequest';
	var $actsAs = array('Containable');
	var $displayField = 'code';
	var $validate = array(
		'supplier_id' => array(
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
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'approvedBy' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cancelledBy' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Supplier' => array(
			'className' => 'Supplier',
			'foreignKey' => 'supplier_id',
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
		),
		'CancelledBy' => array(
			'className' => 'User',
			'foreignKey' => 'cancelledBy',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ApprovedBy' => array(
			'className' => 'User',
			'foreignKey' => 'approvedBy',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'PurchaseOrderRequestItem' => array(
			'className' => 'PurchaseOrderRequestItem',
			'foreignKey' => 'purchase_order_request_id',
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
	
	function savePurchaseOrderRequest($data) {
		$purchaseOrderRequestItemIds = $data['PurchaseOrderRequest']['PurchaseOrderRequestItem'];
		$purchaseOrderRequest = $this->save($data);
		if($this->PurchaseOrderRequestItem->removeRequestItemsAt($this->id)) {
			$this->PurchaseOrderRequestItem->addRequestItemsAt($this->id, $purchaseOrderRequestItemIds);		
		}
		return $purchaseOrderRequest;
	}			
	
	function getPurchaseOrderRequest($purchaseOrderRequestId) {
		return $this->find('first', 
			array(
				'contain' => array(
					'Supplier',
					'User',
					'ApprovedBy',
					'CancelledBy',
					'PurchaseOrderRequestItem' => array(
						'fields' => array(
							'PurchaseOrderRequestItem.id',
							'PurchaseOrderRequestItem.product_id',
							'PurchaseOrderRequestItem.quantity',
							'PurchaseOrderRequestItem.created',
							'PurchaseOrderRequestItem.updated'
						),
						'Product' => array(
							'fields' => array('Product.name')
						)
					)
				),
				'conditions' => array(
					'PurchaseOrderRequest.id' => $purchaseOrderRequestId
				)
			)
		);		
	}
	
	function cancel($id, $userId) {
		$purchaseOrderRequest = $this->getPurchaseOrderRequest($id);
		if($purchaseOrderRequest == null) {
			return false;
		}
		$data['PurchaseOrderRequest']['id'] = $id;
		$data['PurchaseOrderRequest']['dateCancelled'] = date('Y-m-d H:i:s');
		$data['PurchaseOrderRequest']['cancelledBy'] = $userId;
		$purchaseOrderRequest = $this->save($data);
		return $purchaseOrderRequest;
	}
	
	function approve($id, $userId) {
		$purchaseOrderRequest = $this->getPurchaseOrderRequest($id);
		if($purchaseOrderRequest == null) {
			return false;
		}
		$data['PurchaseOrderRequest']['id'] = $id;
		$data['PurchaseOrderRequest']['dateApproved'] = date('Y-m-d H:i:s');
		$data['PurchaseOrderRequest']['approvedBy'] = $userId;
		$purchaseOrderRequest = $this->save($data);
		return $purchaseOrderRequest;
	}
		
}
?>