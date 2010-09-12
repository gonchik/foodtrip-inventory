<?php
class ProductsSuppliersController extends AppController {

	var $name = 'ProductsSuppliers';
	var $components = array('Auth');

	function index() {
		$this->ProductsSupplier->recursive = 0;
		$this->set('productsSuppliers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid products supplier', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('productsSupplier', $this->ProductsSupplier->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProductsSupplier->create();
			if ($this->ProductsSupplier->save($this->data)) {
				$this->Session->setFlash(__('The products supplier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products supplier could not be saved. Please, try again.', true));
			}
		}
		$suppliers = $this->ProductsSupplier->Supplier->find('list');
		$products = $this->ProductsSupplier->Product->find('list');
		$this->set(compact('suppliers', 'products'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid products supplier', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProductsSupplier->save($this->data)) {
				$this->Session->setFlash(__('The products supplier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products supplier could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProductsSupplier->read(null, $id);
		}
		$suppliers = $this->ProductsSupplier->Supplier->find('list');
		$products = $this->ProductsSupplier->Product->find('list');
		$this->set(compact('suppliers', 'products'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for products supplier', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProductsSupplier->delete($id)) {
			$this->Session->setFlash(__('Products supplier deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Products supplier was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->ProductsSupplier->recursive = 0;
		$this->set('productsSuppliers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid products supplier', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('productsSupplier', $this->ProductsSupplier->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ProductsSupplier->create();
			if ($this->ProductsSupplier->save($this->data)) {
				$this->Session->setFlash(__('The products supplier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products supplier could not be saved. Please, try again.', true));
			}
		}
		$suppliers = $this->ProductsSupplier->Supplier->find('list');
		$products = $this->ProductsSupplier->Product->find('list');
		$this->set(compact('suppliers', 'products'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid products supplier', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProductsSupplier->save($this->data)) {
				$this->Session->setFlash(__('The products supplier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products supplier could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProductsSupplier->read(null, $id);
		}
		$suppliers = $this->ProductsSupplier->Supplier->find('list');
		$products = $this->ProductsSupplier->Product->find('list');
		$this->set(compact('suppliers', 'products'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for products supplier', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProductsSupplier->delete($id)) {
			$this->Session->setFlash(__('Products supplier deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Products supplier was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>