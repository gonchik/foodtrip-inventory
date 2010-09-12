<?php
class InventoriesController extends AppController {

	var $name = 'Inventories';
	var $uses = array('Inventory', 'Product', 'Station');
	var $components = array('Auth');

	function index($stationId = null) {
		$this->Inventory->recursive = 0;
		$this->set('inventories', $this->paginate());
	}
	
	function station($stationId = null) {
		$this->Inventory->recursive = 0;
		if($stationId == null) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		else {
			$station = $this->Station->getStation($stationId);
			$this->paginate=array(
				'conditions'=>array('Inventory.station_id'=>$stationId)
			);
			$this->set('inventories', $this->paginate());
			$this->set('station', $station);	
		}
	}

	function view($id = null, $stationId = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid inventory', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		else if (!$stationId) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		$this->set('inventory', $this->Inventory->read(null, $id));
		$this->set('station', $this->Station->getStation($stationId));
	}

	function add($stationId = null) {
		if(empty($this->data) && !$stationId) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		else {
			if($stationId == null) {
				$stationId = $this->data['Inventory']['station_id'];
			}
			$station = $this->Station->getStation($stationId);
			if (!empty($this->data)) {
				$user = $this->Auth->user();
				if ($this->Inventory->receiveGoods($this->data, $user)) {
					$this->Session->setFlash(__('The inventory has been saved', true));
					$this->redirect(array('action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name'])));
				} else {
					$this->Session->setFlash(__('The inventory could not be saved. Please, try again.', true));
				}
			}
			$products = $this->Inventory->Product->find('list');
			$this->set(compact('products'));
			$this->set('station', $station);
		}
	}

	function edit($id = null, $stationId = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid inventory', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		else if(empty($this->data) && !$stationId) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		else {
			if($stationId == null) {
				$stationId = $this->data['Inventory']['station_id'];
			}
			$station = $this->Station->getStation($stationId);
			if (!empty($this->data)) {
				$user = $this->Auth->user();
				if ($this->Inventory->modifyInventory($this->data, $user)) {
					$this->Session->setFlash(__('The inventory has been saved', true));
					$this->redirect(array('action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name'])));
				} else {
					$this->Session->setFlash(__('The inventory could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Inventory->read(null, $id);
			}
			$this->set(compact('products', 'stations'));
			$this->set('station', $station);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for inventory', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		$inventory = $this->Inventory->read(null, $id);
		$station = $this->Station->read(null, $inventory['Inventory']['station_id']);
		if ($this->Inventory->delete($id)) {
			$this->Session->setFlash(__('Inventory deleted', true));
			$this->redirect(array('action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name'])));
		}
		$this->Session->setFlash(__('Inventory was not deleted', true));
		$this->redirect(array('action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name'])));
	}
	function admin_index() {
		$this->Inventory->recursive = 0;
		$this->set('inventories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid inventory', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('inventory', $this->Inventory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Inventory->create();
			if ($this->Inventory->save($this->data)) {
				$this->Session->setFlash(__('The inventory has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventory could not be saved. Please, try again.', true));
			}
		}
		$products = $this->Inventory->Product->find('list');
		$stations = $this->Inventory->Station->find('list');
		$this->set(compact('products', 'stations'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid inventory', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Inventory->save($this->data)) {
				$this->Session->setFlash(__('The inventory has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventory could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Inventory->read(null, $id);
		}
		$products = $this->Inventory->Product->find('list');
		$stations = $this->Inventory->Station->find('list');
		$this->set(compact('products', 'stations'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for inventory', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Inventory->delete($id)) {
			$this->Session->setFlash(__('Inventory deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Inventory was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>