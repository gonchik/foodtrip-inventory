<?php
App::import('Sanitize');
class Inventory extends AppModel {
	var $name = 'Inventory';
	var $validate = array(
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
//			'money' => array(
//				'rule' => array('money'),
//				'message' => 'Input must be in money format',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
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
			'add_positive' => array(
				'rule' => array('comparison', '>', 0),
				'message' => 'Quantity must be greater than zero',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'non_negative' => array(
				'rule' => array('comparison', '>=', 0),
				'message' => 'Quantity cannot be negative',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
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
		'Station' => array(
			'className' => 'Station',
			'foreignKey' => 'station_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Transaction' => array(
			'className' => 'Transaction',
			'foreignKey' => 'inventory_id',
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

	function receiveGoods($data, $user) {
		$this->Product->unbindModel(
			array(
				'hasMany'=>array('Inventory'),
				'hasAndBelongsToMany'=>array('Supplier')
			)
		);
		$product = $this->Product->read(null, $data['Inventory']['product_id']);
		$data['Inventory']['cost'] = $data['Inventory']['quantity'] * $product['Product']['unit_cost'];
		$inventory = $this->save($data);
		if(!empty($inventory)) {
			$inventory['Inventory']['id'] = $this->id;
			$transaction = $this->Transaction->logGoodsReceived($inventory, $user);
			if(!empty($transaction)) {
				return $inventory;	
			}
		}
		return false;
	}
	
	function modifyInventory($data, $user) {
		$remarks = $data['Transaction']['remarks'];
		$oldInventory = $this->read(null, $data['Inventory']['id']);
		$newInventory = $this->save($data);
		if(!empty($newInventory)) {
			$inventory['Inventory']['id'] = $this->id;
			$transaction = $this->Transaction->logModifyInventory($oldInventory, $newInventory, $remarks, $user);
			if(!empty($transaction)) {
				return $newInventory;	
			}
		}
		return false;
	} 
	
	function getAvailableInventoriesOrderedByMostRecent($stationId, $productId) {
		return $this->find('all', 
			array(
				'conditions'=>array(
					'station_id'=>$stationId,
					'product_id'=>$productId,
					'quantity > '=>0,
				),
				'order'=>array(
					'Inventory.created DESC'
				) 
			)
		);
	}
	
	function getTotalInventoryCount($stationId, $productId) {
		$result = $this->query("select sum(quantity) as total_quantity from inventories where station_id = ".Sanitize::clean($stationId).' and product_id = '.Sanitize::clean($productId));
		if(!isset($result[0][0]['total_quantity'])) {
			$result[0][0]['total_quantity'] = 0;
		}
		return $result[0][0]['total_quantity'];		
	}
	
	function hasAvailableInventories($stationId, $productId) {
		$totalQuantity = $this->getTotalInventoryCount($stationId, $productId);
		return $totalQuantity > 0;
	}
	
	function hasEnoughInventory($data, $stationId) {
		$productId = $data['InvoiceItem']['product_id'];
		$requiredQuantity = $data['InvoiceItem']['quantity'];
		$totalQuantity = $this->getTotalInventoryCount($stationId, $productId);
		return $totalQuantity >= $requiredQuantity;
	}
	
	function sellProduct($data, $stationId, $user) {
		//check first if there are available inventory
		
		//fetch (unused) inventories
		//loop until amount has been covered
		//remove inventory
		//record transaction
		$inventories = $this->getAvailableInventoriesOrderedByMostRecent($stationId, $data['InvoiceItem']['product_id']);
		if(empty($inventories)) {
			return false;
		}
		$remarks = 'none';
		if(!empty($data['InvoiceItem']['remarks'])) {
			$remarks = $data['InvoiceItem']['remarks'];
		}
		$quantitySold = $data['InvoiceItem']['quantity'];
		$i = 0;
		while($quantitySold > 0) {
			$inventoryData = array();
			$inventory = $inventories[$i];
			$originalCost = $inventory['Inventory']['cost'];
			$originalQuantity = $inventory['Inventory']['quantity'];
			$unitCost = $originalCost / $inventory['Inventory']['quantity'];
			$amountToSubtractFromQuantity = min($quantitySold, $originalQuantity);
			$inventoryData['Inventory']['quantity'] = $originalQuantity - $amountToSubtractFromQuantity;
			$inventoryData['Inventory']['cost'] = $unitCost * ($originalQuantity - $amountToSubtractFromQuantity);
			$quantitySold -= $amountToSubtractFromQuantity;
			$inventoryData['Inventory']['id'] = $inventory['Inventory']['id'];
			$inventoryData['Inventory']['product_id'] = $inventory['Inventory']['product_id'];
			$inventoryData['Inventory']['station_id'] = $inventory['Inventory']['station_id'];
			$inventory = $this->save($inventoryData);
			if(!empty($inventory)) {
				$inventory['Inventory']['id'] = $this->id;	
			}
			$transaction = $this->Transaction->logSalesTransaction($inventory, $originalCost, $originalQuantity, $remarks, $user);
			$i++;
		}
		return true;
	}
}
?>