<?php
class StationPrice extends AppModel {
	var $name = 'StationPrice';
	var $validate = array(
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
		'price' => array(
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

	var $belongsTo = array(
		'Station' => array(
			'className' => 'Station',
			'foreignKey' => 'station_id',
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
	
	function updateStationPrices($productId) {
		$stations = $this->Station->getStations();
		$product = $this->Product->getProduct($productId);
		foreach($stations as $station) {
			$stationPrice = $this->getStationPrice($productId, $station['Station']['id']);
			if($stationPrice == null) {
				$this->create();
				$stationPrice['StationPrice']['station_id'] = $station['Station']['id'];
				$stationPrice['StationPrice']['product_id'] = $productId;
			}
			$stationPrice['StationPrice']['price'] = $product['Product']['unit_price'];
			$this->save($stationPrice);
		}
	}
	
	function createStationPrices($stationId) {
		$products = $this->Product->getProducts();
		foreach($products as $product) {
			$stationPrice = $this->getStationPrice($product['Product']['id'], $stationId);
			if($stationPrice == null) {
				$this->create();
				$stationPrice['StationPrice']['station_id'] = $stationId;
				$stationPrice['StationPrice']['product_id'] = $product['Product']['id'];
			}
			$stationPrice['StationPrice']['price'] = $product['Product']['unit_price'];
			$this->save($stationPrice);
		}
	}
	
	function getStationPrice($productId, $stationId) {
		return $this->find('first', 
			array(
				'conditions' => array('product_id' => $productId, 'station_id' => $stationId)
			)
		);
	}
}
?>