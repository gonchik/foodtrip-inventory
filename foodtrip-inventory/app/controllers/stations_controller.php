<?php
class StationsController extends AppController {

	var $name = 'Stations';
	var $uses = array('Station', 'Invoice', 'InvoiceItem', 'User', 'StationAssignment');
	var $components = array('Auth');

	function index() {
		$this->Station->recursive = 0;
		$this->set('stations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('station', $this->Station->read(null, $id));
		$this->set('stationAssignments', $this->StationAssignment->getAssignmentsAt('all',$id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Station->create();
			if ($this->Station->save($this->data)) {
				$this->Session->setFlash(__('The station has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Station->save($this->data)) {
				$this->Session->setFlash(__('The station has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Station->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for station', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Station->delete($id)) {
			$this->Session->setFlash(__('Station deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Station was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Station->recursive = 0;
		$this->set('stations', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('station', $this->Station->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Station->create();
			if ($this->Station->save($this->data)) {
				$this->Session->setFlash(__('The station has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Station->User->find('list');
		$this->set(compact('users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Station->save($this->data)) {
				$this->Session->setFlash(__('The station has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Station->read(null, $id);
		}
		$users = $this->Station->User->find('list');
		$this->set(compact('users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for station', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Station->delete($id)) {
			$this->Session->setFlash(__('Station deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Station was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function assignments($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			$this->StationAssignment->deleteAssignmentsAt($this->data['StationAssignment']['station_id']);
			if ($this->StationAssignment->addAssignmentsAt($this->data['StationAssignment']['station_id'], $this->data['StationAssignment']['User'])) {
				$this->Session->setFlash(__('Assignments has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Assignments could not be saved. Please, try again.', true));
			}
		}
		$stations = $this->StationAssignment->Station->find('list');
		$users = $this->StationAssignment->User->find('list');
		$this->set(compact('stations', 'users'));
	}
	
	function sales($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('invoices', $this->Invoice->getInvoicesFrom($id));
		$this->set('station', $this->Station->read(null, $id));
	}
	
	function get($userId) {
		return $this->StationAssignment->getAssignments($userId);
	}
	
}
?>