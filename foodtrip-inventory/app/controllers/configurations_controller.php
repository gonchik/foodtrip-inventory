<?php
class ConfigurationsController extends AppController {

	var $name = 'Configurations';
	var $uses = array('Configuration', 'User');
	var $components = array('Auth');

	function beforeFilter() {
		parent::beforeFilter();
		if($this->Auth->user('user_type') != $this->User->userTypes['Admin']) {
			$this->Session->setFlash(__('You are not authorized to view this page', true));
			$this->redirect(array('controller'=>'pages','action' => 'display','home'));
		}
	}
	
	function index() {
		$this->Configuration->recursive = 0;
		$this->set('configurations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid configuration', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('configuration', $this->Configuration->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Configuration->create();
			if ($this->Configuration->save($this->data)) {
				$this->Session->setFlash(__('The configuration has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configuration could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid configuration', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Configuration->save($this->data)) {
				$this->Session->setFlash(__('The configuration has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configuration could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Configuration->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for configuration', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Configuration->delete($id)) {
			$this->Session->setFlash(__('Configuration deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Configuration was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Configuration->recursive = 0;
		$this->set('configurations', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid configuration', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('configuration', $this->Configuration->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Configuration->create();
			if ($this->Configuration->save($this->data)) {
				$this->Session->setFlash(__('The configuration has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configuration could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid configuration', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Configuration->save($this->data)) {
				$this->Session->setFlash(__('The configuration has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configuration could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Configuration->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for configuration', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Configuration->delete($id)) {
			$this->Session->setFlash(__('Configuration deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Configuration was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>