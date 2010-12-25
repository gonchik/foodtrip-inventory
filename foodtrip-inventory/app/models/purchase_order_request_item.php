<?php
class PurchaseOrderRequestItem extends AppModel {
	var $name = 'PurchaseOrderRequestItem';
	var $actsAs = array('Containable');
	var $displayField = 'details';
	var $validate = array(
		'product_id' => array(
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
		'purchase_order_request_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'quantity' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PurchaseOrderRequest' => array(
			'className' => 'PurchaseOrderRequest',
			'foreignKey' => 'purchase_order_request_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $virtualFields = array(
		'details' => 'CONCAT(Product.name, " - ", PurchaseOrderRequestItem.quantity)'
	);
	
	function getAvailable($supplierProducts, $purchaseOrderRequestId = null) {
		$productIds = array();
		foreach($supplierProducts as $supplierProduct) {
			array_push($productIds, $supplierProduct['SupplierProduct']['product_id']);
		}
		return $this->find('all', array(
				'fields' => array(
					'PurchaseOrderRequestItem.id',
					'PurchaseOrderRequestItem.details'
				),
				'conditions' => array(
					'OR' => array(
						array('PurchaseOrderRequestItem.purchase_order_request_id' => null),
						array('PurchaseOrderRequestItem.purchase_order_request_id' => $purchaseOrderRequestId)
					),
					'product_id' => $productIds
				)
			)
		);
	}
	
	function removeRequestItemsAt($purchaseOrerRequestId) {
		return $this->updateAll(
			array('PurchaseOrderRequestItem.purchase_order_request_id' => null),
			array('PurchaseOrderRequestItem.purchase_order_request_id' => $purchaseOrerRequestId)
		);
	}
	
	function addRequestItemsAt($purchaseOrerRequestId, $requestItemIds) {
		if(!empty($requestItemIds)) {
			return $this->updateAll(
				array('PurchaseOrderRequestItem.purchase_order_request_id' => $purchaseOrerRequestId ),
				array('PurchaseOrderRequestItem.id' => $requestItemIds )
			);
		}
		return true;
	}
}
?>