<?php
class StationPricesController extends AppController {

	var $name = 'StationPrices';
	var $uses = array('StationPrice', 'Product', 'Station', 'User');
	var $components = array('Auth');

	function beforeFilter() {
		parent::beforeFilter();
		if($this->Auth->user('user_type') != $this->User->userTypes['Admin'] && 
			$this->Auth->user('user_type') != $this->User->userTypes['Supervisor']) {
			$this->Session->setFlash(__('You are not authorized to view this page', true));
			$this->redirect(array('controller'=>'pages','action' => 'display','home'));
		}
	}
	
	function index() {
		$this->StationPrice->recursive = 0;
		$this->set('stationPrices', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid station price', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stationPrice', $this->StationPrice->read(null, $id));
	}
	
	function station($stationId = null) {
		$this->StationPrice->recursive = 0;
		if($stationId == null) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		else {
			$station = $this->Station->getStation($stationId);
			$this->paginate=array(
				'conditions'=>array('StationPrice.station_id'=>$stationId)
			);
			$this->set('stationPrices', $this->paginate());
			$this->set('station', $station);	
		}
	}

	function add() {
		if (!empty($this->data)) {
			$this->StationPrice->create();
			if ($this->StationPrice->save($this->data)) {
				$this->Session->setFlash(__('The station price has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station price could not be saved. Please, try again.', true));
			}
		}
		$stations = $this->StationPrice->Station->find('list');
		$products = $this->StationPrice->Product->find('list');
		$this->set(compact('stations', 'products'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid station price', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->StationPrice->save($this->data)) {
				$this->Session->setFlash(__('The station price has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station price could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StationPrice->read(null, $id);
		}
		$stations = $this->StationPrice->Station->find('list');
		$products = $this->StationPrice->Product->find('list');
		$this->set(compact('stations', 'products'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for station price', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StationPrice->delete($id)) {
			$this->Session->setFlash(__('Station price deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Station price was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->StationPrice->recursive = 0;
		$this->set('stationPrices', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid station price', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stationPrice', $this->StationPrice->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->StationPrice->create();
			if ($this->StationPrice->save($this->data)) {
				$this->Session->setFlash(__('The station price has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station price could not be saved. Please, try again.', true));
			}
		}
		$stations = $this->StationPrice->Station->find('list');
		$products = $this->StationPrice->Product->find('list');
		$this->set(compact('stations', 'products'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid station price', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->StationPrice->save($this->data)) {
				$this->Session->setFlash(__('The station price has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station price could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StationPrice->read(null, $id);
		}
		$stations = $this->StationPrice->Station->find('list');
		$products = $this->StationPrice->Product->find('list');
		$this->set(compact('stations', 'products'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for station price', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StationPrice->delete($id)) {
			$this->Session->setFlash(__('Station price deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Station price was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>