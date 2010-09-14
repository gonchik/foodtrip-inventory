<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'username';
	var $userTypes = array(
		'Admin'=>'Admin', 
		'Supervisor'=>'Supervisor', 
		'Seller'=>'Seller'
	);
	
	var $belongsTo = array(
		'Supervisor' => array(
			'className' => 'User',
			'foreignKey' => 'supervisor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isunique' => array(
				'rule' => array('isunique'),
				'message' => 'Username is already taken',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Password cannot be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'Password can only contain letters and numbers',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'supervisor_id' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
		),
		'user_type' => array(
			'inlist' => array(
				'rule' => array('enum', array('Admin', 'Supervisor', 'Seller'), true),
				'message' => 'User must either be an Admin, Supervisor or Seller',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	function getSupervisors() {
		$supervisors = $this->Supervisor->find('list', 
			array(
				'conditions'=>array('Supervisor.user_type'=>$this->userTypes['Supervisor'])
			)
		);
		$supervisors[""] = "No supervisor";
		ksort($supervisors);
		return $supervisors;
	}
	
	function getUserAndAssignedStations($type = 'all') {
		$fields = array('User.*');
		if($type == 'list') {
			$fields = array('User.id', 'User.username');
		}
		$list = $this->find($type,
			array(
				'fields'=>$fields,
				'conditions'=>array('NOT'=>array('User.user_type' => $this->userTypes['Admin'])),
				'order'=>array('User.username')
			)
		);
		return $list;
	}
	
	function getAssignableUsers($type = 'all') {
		$fields = array('User.*');
		if($type == 'list') {
			$fields = array('User.id', 'User.username');
		}
		$list = $this->find($type,
			array(
				'fields'=>$fields,
				'conditions'=>array('NOT'=>array('User.user_type' => $this->userTypes['Admin'])),
				'order'=>array('User.username')
			)
		);
		return $list;
	}
	
	function updateUser($data, $hashOfEmptyStringPassword) {
		$user = $this->read(null, $data['User']['id']);
		if($user['User']['password'] == $data['User']['password'] ||
			$data['User']['password'] == $hashOfEmptyStringPassword) {
			unset($data['User']['password']);
		}
		return $this->save($data);
	}
}
?>