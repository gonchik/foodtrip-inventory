<?php
class TransactionsController extends AppController {

	var $name = 'Transactions';
	var $uses = array('Transaction', 'Inventory', 'Station');
	var $components = array('Auth');

	function index() {
		$this->Transaction->recursive = 0;
		$this->set('transactions', $this->paginate());
	}
	
	function station($stationId = null) {
		$this->Transaction->recursive = 0;
		if($stationId == null) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		else {
			$station = $this->Station->getStation($stationId);
			$inventoryIds = array();
			$inventories = $this->Transaction->Inventory->find('all',  
				array(
					'fields'=>array('Inventory.id'),
					'conditions'=>array('Inventory.station_id' => $stationId)
				)
				
			);
			foreach($inventories as $inventory) {
				array_push($inventoryIds, $inventory['Inventory']['id']);
			}
			$this->paginate=array(
				'conditions'=>array('Transaction.inventory_id'=>$inventoryIds)
			);
			$this->set('transactions', $this->paginate());
			$this->set('station', $station);	
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid transaction', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('transaction', $this->Transaction->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Transaction->create();
			if ($this->Transaction->save($this->data)) {
				$this->Session->setFlash(__('The transaction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.', true));
			}
		}
		$inventories = $this->Transaction->Inventory->find('list');
		$users = $this->Transaction->User->find('list');
		$this->set(compact('inventories', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid transaction', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Transaction->save($this->data)) {
				$this->Session->setFlash(__('The transaction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Transaction->read(null, $id);
		}
		$inventories = $this->Transaction->Inventory->find('list');
		$users = $this->Transaction->User->find('list');
		$this->set(compact('inventories', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for transaction', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Transaction->delete($id)) {
			$this->Session->setFlash(__('Transaction deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Transaction was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Transaction->recursive = 0;
		$this->set('transactions', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid transaction', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('transaction', $this->Transaction->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Transaction->create();
			if ($this->Transaction->save($this->data)) {
				$this->Session->setFlash(__('The transaction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.', true));
			}
		}
		$inventories = $this->Transaction->Inventory->find('list');
		$users = $this->Transaction->User->find('list');
		$this->set(compact('inventories', 'users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid transaction', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Transaction->save($this->data)) {
				$this->Session->setFlash(__('The transaction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Transaction->read(null, $id);
		}
		$inventories = $this->Transaction->Inventory->find('list');
		$users = $this->Transaction->User->find('list');
		$this->set(compact('inventories', 'users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for transaction', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Transaction->delete($id)) {
			$this->Session->setFlash(__('Transaction deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Transaction was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>