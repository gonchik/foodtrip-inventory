<?php
class PurchaseOrderRequestItemsController extends AppController {

	var $name = 'PurchaseOrderRequestItems';
	var $components = array('Auth');

	function index() {
		$this->PurchaseOrderRequestItem->recursive = 0;
		$this->paginate = array(
			'conditions' => array('purchase_order_request_id' => null)
		);
		$this->set('purchaseOrderRequestItems', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid purchase order request item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('purchaseOrderRequestItem', $this->PurchaseOrderRequestItem->read(null, $id));
	}

	function add() {
		$addMore = true;
		if (!empty($this->data)) {
			$addMore = $this->data['PurchaseOrderRequestItem']['add_more'];
			$this->PurchaseOrderRequestItem->create();
			if ($this->PurchaseOrderRequestItem->save($this->data)) {
				$this->Session->setFlash(__('The purchase order request item has been saved', true));
				if(!$addMore) {
					$this->redirect(array('action' => 'index'));	
				}
				else {
					$this->redirect(array('action' => 'add'));
				}
			} else {
				$this->Session->setFlash(__('The purchase order request item could not be saved. Please, try again.', true));
			}
		}
		$products = $this->PurchaseOrderRequestItem->Product->find('list');
		$this->set(compact('products'));
		$this->set('addMore', $addMore);
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid purchase order request item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PurchaseOrderRequestItem->save($this->data)) {
				$this->Session->setFlash(__('The purchase order request item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase order request item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PurchaseOrderRequestItem->read(null, $id);
		}
		$products = $this->PurchaseOrderRequestItem->Product->find('list');
		$this->set(compact('products'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for purchase order request item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PurchaseOrderRequestItem->delete($id)) {
			$this->Session->setFlash(__('Purchase order request item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Purchase order request item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->PurchaseOrderRequestItem->recursive = 0;
		$this->set('purchaseOrderRequestItems', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid purchase order request item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('purchaseOrderRequestItem', $this->PurchaseOrderRequestItem->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->PurchaseOrderRequestItem->create();
			if ($this->PurchaseOrderRequestItem->save($this->data)) {
				$this->Session->setFlash(__('The purchase order request item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase order request item could not be saved. Please, try again.', true));
			}
		}
		$products = $this->PurchaseOrderRequestItem->Product->find('list');
		$purchaseOrderRequests = $this->PurchaseOrderRequestItem->PurchaseOrderRequest->find('list');
		$this->set(compact('products', 'purchaseOrderRequests'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid purchase order request item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PurchaseOrderRequestItem->save($this->data)) {
				$this->Session->setFlash(__('The purchase order request item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase order request item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PurchaseOrderRequestItem->read(null, $id);
		}
		$products = $this->PurchaseOrderRequestItem->Product->find('list');
		$purchaseOrderRequests = $this->PurchaseOrderRequestItem->PurchaseOrderRequest->find('list');
		$this->set(compact('products', 'purchaseOrderRequests'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for purchase order request item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PurchaseOrderRequestItem->delete($id)) {
			$this->Session->setFlash(__('Purchase order request item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Purchase order request item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>