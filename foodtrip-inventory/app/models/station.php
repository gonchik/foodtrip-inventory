<?php
class Station extends AppModel {
	var $name = 'Station';
	var $actAs = array('Containable');
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'isunique' => array(
				'rule' => array('isunique'),
				'message' => 'A station with that name already exists',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Station name cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Inventory' => array(
			'className' => 'Inventory',
			'foreignKey' => 'station_id',
			'dependent' => false,
			'conditions' => 'quantity > 0',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'StationPrice' => array(
			'className' => 'StationPrice',
			'foreignKey' => 'station_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

	function getStation($id) {
		$this->Behaviors->attach('Containable', array('autoFields' => false));
		$this->contain();
		return $this->read(null, $id);
	}
	
	function getStations() {
		$this->Behaviors->attach('Containable', array('autoFields' => false));
		$this->contain();
		return $this->find('all');
	}
	
	function createStation($data) {
		$this->create();
		$station = $this->save($data);
		$this->StationPrice->createStationPrices($this->id);
		return $station;
	}
}
?>