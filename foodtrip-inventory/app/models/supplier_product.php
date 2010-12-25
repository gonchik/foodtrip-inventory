<?php
class SupplierProduct extends AppModel {
	var $name = 'SupplierProduct';
	var $actAs = array('Containable');
	var $displayField = 'product_id';
	var $validate = array(
		'supplier_id' => array(
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
		'cost' => array(
			'money' => array(
				'rule' => array('money'),
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
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function saveSupplierProduct($data) {
		$supplierProduct = $this->getSupplierProduct($data['SupplierProduct']['product_id'], $data['SupplierProduct']['supplier_id']);
		if(!empty($supplierProduct)) {
			$supplierProduct['SupplierProduct']['cost'] = $data['SupplierProduct']['cost'];
			return $this->save($supplierProduct);
		}
		$this->create();
		return $this->save($data);
	}
	
	function getSupplierProduct($productId, $supplierId) {
		return $this->find('first', 
			array(
				'conditions' => array('product_id'=>$productId, 'supplier_id'=>$supplierId)
			)
		);
	}
	
	function getProducts($supplierId) {
		return $this->find('all', array(
				'contain' => false,
				'fields' => array('product_id'),
				'conditions' => array(
					'supplier_id' => $supplierId 
				)
			)
		);
	}
}
?>