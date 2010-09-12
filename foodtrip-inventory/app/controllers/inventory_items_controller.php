<?php
class InventoryItemsController extends AppController {

	var $name = 'InventoryItems';
	var $components = array('Auth');

	function index() {
		$this->InventoryItem->recursive = 0;
		$this->set('inventoryItems', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid inventory item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('inventoryItem', $this->InventoryItem->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->InventoryItem->create();
			if ($this->InventoryItem->save($this->data)) {
				$this->Session->setFlash(__('The inventory item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventory item could not be saved. Please, try again.', true));
			}
		}
		$products = $this->InventoryItem->Product->find('list');
		$suppliers = $this->InventoryItem->Supplier->find('list');
		$this->set(compact('products', 'suppliers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid inventory item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->InventoryItem->save($this->data)) {
				$this->Session->setFlash(__('The inventory item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventory item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->InventoryItem->read(null, $id);
		}
		$products = $this->InventoryItem->Product->find('list');
		$suppliers = $this->InventoryItem->Supplier->find('list');
		$this->set(compact('products', 'suppliers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for inventory item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->InventoryItem->delete($id)) {
			$this->Session->setFlash(__('Inventory item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Inventory item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->InventoryItem->recursive = 0;
		$this->set('inventoryItems', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid inventory item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('inventoryItem', $this->InventoryItem->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->InventoryItem->create();
			if ($this->InventoryItem->save($this->data)) {
				$this->Session->setFlash(__('The inventory item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventory item could not be saved. Please, try again.', true));
			}
		}
		$products = $this->InventoryItem->Product->find('list');
		$suppliers = $this->InventoryItem->Supplier->find('list');
		$this->set(compact('products', 'suppliers'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid inventory item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->InventoryItem->save($this->data)) {
				$this->Session->setFlash(__('The inventory item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventory item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->InventoryItem->read(null, $id);
		}
		$products = $this->InventoryItem->Product->find('list');
		$suppliers = $this->InventoryItem->Supplier->find('list');
		$this->set(compact('products', 'suppliers'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for inventory item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->InventoryItem->delete($id)) {
			$this->Session->setFlash(__('Inventory item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Inventory item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>