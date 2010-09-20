<?php
class StationAssignmentsController extends AppController {

	var $name = 'StationAssignments';
	var $uses = array('StationAssignment', 'Station');
	var $components = array('Auth');

	function index() {
		$this->StationAssignment->recursive = 0;
		$this->set('stationAssignments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid station assignment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stationAssignment', $this->StationAssignment->read(null, $id));
	}

	function add($stationId = null) {
		if(empty($this->data) && !$stationId) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		if(!empty($this->data)) {
			$stationId = $this->data['StationAssignment']['station_id'];
		}
		$station = $this->Station->read(null, $stationId);
		if (!empty($this->data)) {
			$this->StationAssignment->deleteAssignmentsAt($this->data['StationAssignment']['station_id']);
			if ($this->StationAssignment->addAssignmentsAt($this->data['StationAssignment']['station_id'], $this->data['StationAssignment']['User'])) {
				$this->Session->setFlash(__('Assignments has been saved', true));
				$this->redirect(array('controller'=>'stations','action' => 'view', $station['Station']['id'], Inflector::slug($station['Station']['name'])));
			} else {
				$this->Session->setFlash(__('Assignments could not be saved. Please, try again.', true));
			}
		}
		$users = $this->StationAssignment->User->getAssignableUsers('list');
		$assignedUsers = $this->StationAssignment->getAssignmentsAt('list',$stationId);
		$this->set('station', $station);
		$this->set(compact('users'));
		$this->set(compact('assignedUsers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid station assignment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->StationAssignment->save($this->data)) {
				$this->Session->setFlash(__('The station assignment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station assignment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StationAssignment->read(null, $id);
		}
		$stations = $this->StationAssignment->Station->find('list');
		$users = $this->StationAssignment->User->find('list');
		$this->set(compact('stations', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for station assignment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StationAssignment->delete($id)) {
			$this->Session->setFlash(__('Station assignment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Station assignment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->StationAssignment->recursive = 0;
		$this->set('stationAssignments', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid station assignment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stationAssignment', $this->StationAssignment->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->StationAssignment->create();
			if ($this->StationAssignment->save($this->data)) {
				$this->Session->setFlash(__('The station assignment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station assignment could not be saved. Please, try again.', true));
			}
		}
		$stations = $this->StationAssignment->Station->find('list');
		$users = $this->StationAssignment->User->find('list');
		$this->set(compact('stations', 'users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid station assignment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->StationAssignment->save($this->data)) {
				$this->Session->setFlash(__('The station assignment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The station assignment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StationAssignment->read(null, $id);
		}
		$stations = $this->StationAssignment->Station->find('list');
		$users = $this->StationAssignment->User->find('list');
		$this->set(compact('stations', 'users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for station assignment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StationAssignment->delete($id)) {
			$this->Session->setFlash(__('Station assignment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Station assignment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>