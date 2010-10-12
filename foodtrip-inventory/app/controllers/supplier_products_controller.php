<?php
class SupplierProductsController extends AppController {

	var $name = 'SupplierProducts';
	var $uses = array('SupplierProduct', 'Product', 'Supplier', 'User');
	var $components = array('Auth', 'RequestHandler');

	function beforeFilter() {
		parent::beforeFilter();
		if($this->Auth->user('user_type') != $this->User->userTypes['Admin'] && 
			$this->Auth->user('user_type') != $this->User->userTypes['Supervisor']) {
			$this->Session->setFlash(__('You are not authorized to view this page', true));
			$this->redirect(array('controller'=>'pages','action' => 'display','home'));
		}
	}
	
	function getDefaultProductCost($productId = null) {
		$product = $this->Product->getProduct($productId);
		if ($this->RequestHandler->isAjax()) {
		    $this->disableCache();
		    $this->RequestHandler->setContent('json');
		    $this->layout = 'ajax';
		    $this->viewPath = 'ajax';
		}
		$this->set('product', $product);
	}
	
	
	function index() {
		$this->SupplierProduct->recursive = 0;
		$this->set('supplierProducts', $this->paginate());
	}

	function view($id = null, $supplierId = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid supplier product', true));
			$this->redirect(array('controller' => 'suppliers', 'action' => 'index'));
		}
		if (!$supplierId) {
			$this->Session->setFlash(__('Invalid supplier', true));
			$this->redirect(array('controller' => 'suppliers', 'action' => 'index'));
		}
		$supplier = $this->Supplier->read(null, $supplierId);
		$this->set('supplier', $supplier);
		$this->set('supplierProduct', $this->SupplierProduct->read(null, $id));
	}

	function product_list($supplierId = null) {
		if (!$supplierId) {
			$this->Session->setFlash(__('Invalid supplier', true));
			$this->redirect(array('controller' => 'suppliers', 'action' => 'index'));
		}
		$supplier = $this->Supplier->read(null, $supplierId);
		$this->set('supplier', $supplier);
		$this->paginate=array(
			'conditions' => array('supplier_id' => $supplier['Supplier']['id'])
		);
		$this->set('supplierProducts', $this->paginate());
	}

	function add($supplierId = null) {
		if(empty($this->data) && !$supplierId) {
			$this->Session->setFlash(__('Invalid supplier', true));
			$this->redirect(array('controller' => 'suppliers', 'action' => 'index'));
		}
		if(!empty($this->data)) {
			$supplierId = $this->data['SupplierProduct']['supplier_id'];
		}
		$addMore = true;
		$supplier = $this->Supplier->read(null, $supplierId);
		if (!empty($this->data)) {
			$addMore = $this->data['SupplierProduct']['add_more'];
			if ($this->SupplierProduct->saveSupplierProduct($this->data)) {
				$this->Session->setFlash(__('The supplier product has been saved', true));
				if($addMore) {
					$this->redirect(array('action' => 'add', $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name'])));
				}
				else {
					$this->redirect(array('action' => 'product_list', $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name'])));	
				}
			} else {
				$this->Session->setFlash(__('The supplier product could not be saved. Please, try again.', true));
			}
		}
		$suppliers = $this->SupplierProduct->Supplier->find('list');
		$products = $this->SupplierProduct->Product->find('list');
		$this->set('addMore', $addMore);
		$this->set('supplier', $supplier);
		$this->set(compact('suppliers', 'products'));
	}

	function edit($id = null, $supplierId = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid supplier product', true));
			$this->redirect(array('controller' => 'suppliers', 'action' => 'index'));
		}
		if(empty($this->data) && !$supplierId) {
			$this->Session->setFlash(__('Invalid supplier', true));
			$this->redirect(array('controller' => 'suppliers', 'action' => 'index'));
		}
		if(!empty($this->data)) {
			$supplierId = $this->data['SupplierProduct']['supplier_id'];
		}
		$supplier = $this->Supplier->read(null, $supplierId);
		$this->set('supplier', $supplier);
		if (!empty($this->data)) {
			if ($this->SupplierProduct->save($this->data)) {
				$this->Session->setFlash(__('The supplier product has been saved', true));
				$this->redirect(array('action' => 'product_list', $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name'])));
			} else {
				$this->Session->setFlash(__('The supplier product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SupplierProduct->read(null, $id);
		}
		$suppliers = $this->SupplierProduct->Supplier->find('list');
		$products = $this->SupplierProduct->Product->find('list');
		$this->set(compact('suppliers', 'products'));
	}

	function delete($id = null, $supplierId = null) {
		if (!$supplierId) {
			$this->Session->setFlash(__('Invalid supplier', true));
			$this->redirect(array('controller' => 'suppliers', 'action' => 'index'));
		}
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for supplier product', true));
			$this->redirect(array('controller' => 'suppliers', 'action' => 'index'));
		}
		$supplier = $this->Supplier->read(null, $supplierId);
		$this->set('supplier', $supplier);
		if ($this->SupplierProduct->delete($id)) {
			$this->Session->setFlash(__('Supplier product deleted', true));
			$this->redirect(array('action' => 'product_list', $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name'])));
		}
		$this->Session->setFlash(__('Supplier product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->SupplierProduct->recursive = 0;
		$this->set('supplierProducts', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid supplier product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('supplierProduct', $this->SupplierProduct->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->SupplierProduct->create();
			if ($this->SupplierProduct->save($this->data)) {
				$this->Session->setFlash(__('The supplier product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplier product could not be saved. Please, try again.', true));
			}
		}
		$suppliers = $this->SupplierProduct->Supplier->find('list');
		$products = $this->SupplierProduct->Product->find('list');
		$this->set(compact('suppliers', 'products'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid supplier product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SupplierProduct->save($this->data)) {
				$this->Session->setFlash(__('The supplier product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The supplier product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SupplierProduct->read(null, $id);
		}
		$suppliers = $this->SupplierProduct->Supplier->find('list');
		$products = $this->SupplierProduct->Product->find('list');
		$this->set(compact('suppliers', 'products'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for supplier product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SupplierProduct->delete($id)) {
			$this->Session->setFlash(__('Supplier product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Supplier product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>