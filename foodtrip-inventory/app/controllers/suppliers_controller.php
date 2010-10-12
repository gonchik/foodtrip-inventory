<?php
class SuppliersController extends AppController {

	var $name = 'Suppliers';
	var $uses = array('Supplier', 'User');
	var $components = array('Auth');

	function beforeFilter() {
		parent::beforeFilter();
		if($this->Auth->user('user_type') != $this->User->userTypes['Admin']) {
			$this->Session->setFlash(__('You are not authorized to view this page', true));
			$this->redirect(array('controller'=>'pages','action' => 'display','home'));
		}
	}
	
	function index() {
		$this->Supplier->recursive = 0;
		$this->set('suppliers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid supplier', true));
			$this->redirect(array('action' => 'index'));
		}
		$supplier = $this->Supplier->read(null, $id);
		$this->set('supplier', $supplier);
	}

	function add() {
		if (!empty($this->data)) {
			$this->Supplier->create();
			if ($this->Supplier->save($this->data)) {
				$this->Session->setFlash(__('The supplier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplier could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid supplier', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Supplier->save($this->data)) {
				$this->Session->setFlash(__('The supplier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplier could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Supplier->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for supplier', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Supplier->delete($id)) {
			$this->Session->setFlash(__('Supplier deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Supplier was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Supplier->recursive = 0;
		$this->set('suppliers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid supplier', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('supplier', $this->Supplier->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Supplier->create();
			if ($this->Supplier->save($this->data)) {
				$this->Session->setFlash(__('The supplier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplier could not be saved. Please, try again.', true));
			}
		}
		$products = $this->Supplier->Product->find('list');
		$this->set(compact('products'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid supplier', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Supplier->save($this->data)) {
				$this->Session->setFlash(__('The supplier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplier could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Supplier->read(null, $id);
		}
		$products = $this->Supplier->Product->find('list');
		$this->set(compact('products'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for supplier', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Supplier->delete($id)) {
			$this->Session->setFlash(__('Supplier deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Supplier was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>