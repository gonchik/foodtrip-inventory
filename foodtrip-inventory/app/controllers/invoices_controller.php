<?php
class InvoicesController extends AppController {

	var $name = 'Invoices';
	var $components = array('Auth');
	var $uses = array('Invoice','Station');

	function index() {
		$this->Invoice->recursive = 0;
		$this->set('invoices', $this->paginate());
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
				'conditions'=>array('Invoice.station_id'=>$stationId)
			);
			$this->set('invoices', $this->paginate());
			$this->set('station', $station);	
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid invoice', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('invoice', $this->Invoice->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Invoice->create();
			if ($this->Invoice->save($this->data)) {
				$this->Session->setFlash(__('The invoice has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid invoice', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Invoice->save($this->data)) {
				$this->Session->setFlash(__('The invoice has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Invoice->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for invoice', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Invoice->delete($id)) {
			$this->Session->setFlash(__('Invoice deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Invoice was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Invoice->recursive = 0;
		$this->set('invoices', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid invoice', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('invoice', $this->Invoice->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Invoice->create();
			if ($this->Invoice->save($this->data)) {
				$this->Session->setFlash(__('The invoice has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid invoice', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Invoice->save($this->data)) {
				$this->Session->setFlash(__('The invoice has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Invoice->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for invoice', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Invoice->delete($id)) {
			$this->Session->setFlash(__('Invoice deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Invoice was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>