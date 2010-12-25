<?php
class PurchaseOrderRequestsController extends AppController {

	var $name = 'PurchaseOrderRequests';
	var $uses = array('PurchaseOrderRequest', 'PurchaseOrderRequestItem', 'SupplierProduct', 'User');
	var $components = array('Auth', 'RequestHandler');

	function index() {
		$this->PurchaseOrderRequest->recursive = 0;
		$this->set('purchaseOrderRequests', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid purchase order request', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('purchaseOrderRequest', $this->PurchaseOrderRequest->getPurchaseOrderRequest($id));
	}
	
	function getSupplierSpecificAvailablePurchaseOrderRequestItems($supplierId = null, $purchaseOrderRequestId = null) {
		if ($this->RequestHandler->isAjax()) {
		    $this->disableCache();
		    $this->RequestHandler->setContent('json');
		    $this->layout = 'ajax';
		    $this->viewPath = 'ajax';
		}
		$supplierProducts = $this->SupplierProduct->getProducts($supplierId);
		$availablePurchaseOrderRequestItems = $this->PurchaseOrderRequestItem->getAvailable($supplierProducts, $purchaseOrderRequestId);
		
		$this->set('availablePurchaseOrderRequestItems', $availablePurchaseOrderRequestItems);
	}

	function add() {
		if (!empty($this->data)) {
			$this->data['PurchaseOrderRequest']['user_id'] = $this->Auth->user('id');
			if ($this->PurchaseOrderRequest->savePurchaseOrderRequest($this->data)) {
				$this->Session->setFlash(__('The purchase order request has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase order request could not be saved. Please, try again.', true));
			}
		}
		$suppliers = $this->PurchaseOrderRequest->Supplier->find('list');
		$users = $this->PurchaseOrderRequest->User->find('list');
		$this->set(compact('suppliers', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid purchase order request', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['PurchaseOrderRequest']['user_id'] = $this->Auth->user('id');
			$this->PurchaseOrderRequest->create();
			if ($this->PurchaseOrderRequest->savePurchaseOrderRequest($this->data)) {
				$this->Session->setFlash(__('The purchase order request has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase order request could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->PurchaseOrderRequest->contain();
			$this->data = $this->PurchaseOrderRequest->read(null, $id);
			$purchaseOrderRequest = $this->PurchaseOrderRequest->getPurchaseOrderRequest($id);
		}
		$suppliers = $this->PurchaseOrderRequest->Supplier->find('list');
		$users = $this->PurchaseOrderRequest->User->find('list');
		$this->PurchaseOrderRequestItem->getAvailable(array(), 2);
		$this->set(compact('suppliers', 'users'));
		$this->set('purchaseOrderRequest', $purchaseOrderRequest);
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for purchase order request', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PurchaseOrderRequest->delete($id)) {
			$this->Session->setFlash(__('Purchase order request deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Purchase order request was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function approve($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for purchase order request', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PurchaseOrderRequest->approve($id, $this->Auth->user('id'))) {
			$this->Session->setFlash(__('Purchase order request approved', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Purchase order request was not approved', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function cancel($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for purchase order request', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PurchaseOrderRequest->cancel($id, $this->Auth->user('id'))) {
			$this->Session->setFlash(__('Purchase order request cancelled', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Purchase order request was not cancelled', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_index() {
		$this->PurchaseOrderRequest->recursive = 0;
		$this->set('purchaseOrderRequests', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid purchase order request', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('purchaseOrderRequest', $this->PurchaseOrderRequest->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->PurchaseOrderRequest->create();
			if ($this->PurchaseOrderRequest->save($this->data)) {
				$this->Session->setFlash(__('The purchase order request has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase order request could not be saved. Please, try again.', true));
			}
		}
		$suppliers = $this->PurchaseOrderRequest->Supplier->find('list');
		$users = $this->PurchaseOrderRequest->User->find('list');
		$cancelledBies = $this->PurchaseOrderRequest->CancelledBy->find('list');
		$approvedBies = $this->PurchaseOrderRequest->ApprovedBy->find('list');
		$this->set(compact('suppliers', 'users', 'cancelledBies', 'approvedBies'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid purchase order request', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PurchaseOrderRequest->save($this->data)) {
				$this->Session->setFlash(__('The purchase order request has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchase order request could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PurchaseOrderRequest->read(null, $id);
		}
		$suppliers = $this->PurchaseOrderRequest->Supplier->find('list');
		$users = $this->PurchaseOrderRequest->User->find('list');
		$cancelledBies = $this->PurchaseOrderRequest->CancelledBy->find('list');
		$approvedBies = $this->PurchaseOrderRequest->ApprovedBy->find('list');
		$this->set(compact('suppliers', 'users', 'cancelledBies', 'approvedBies'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for purchase order request', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PurchaseOrderRequest->delete($id)) {
			$this->Session->setFlash(__('Purchase order request deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Purchase order request was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>