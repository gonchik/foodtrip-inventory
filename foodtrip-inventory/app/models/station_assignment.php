<?php
class StationAssignment extends AppModel {
	var $name = 'StationAssignment';
	var $validate = array(
		'station_id' => array(
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function getAssignmentsAt($type='all',$stationId) {
		if($type == 'list') {
			return $this->find($type,
				array(
					'conditions'=>array('station_id'=>$stationId),
					'fields'=>array('user_id'),
				)
			);	
		}
		return $this->find($type,
			array(
				'conditions'=>array('station_id'=>$stationId)
			)
		);	
	}
	
	function deleteAssignmentsAt($stationId) {
		return $this->deleteAll(
			array('station_id'=>$stationId)
		);
	}
	
	function addAssignmentsAt($stationId, $userIds) {
		if(!empty($userIds)) {
			$data = array();
			foreach($userIds as $userId) {
				$assignment = array();
				$assignment['station_id'] = $stationId;
				$assignment['user_id'] = $userId;
				array_push($data, $assignment);
			}
			return $this->saveAll($data);
		}
		return true;
	}
	
	function getAssignments($userId) {
		return $this->find('all',
			array(
				'conditions'=>array('user_id'=>$userId)
			)
		);
	}
}
?>