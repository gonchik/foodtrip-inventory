<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Auth', 'Cookie');

	function beforeFilter() {
//		$this->Auth->allow('index','view', 'add', 'edit');
   	}
	
	/**
     *  The AuthComponent provides the needed functionality
     *  for login, so you can leave this function blank.
     */
    function login() {
//		//-- code inside this function will execute only when autoRedirect was set to false (i.e. in a beforeFilter).
//		if ($this->Auth->user()) {
//			if (!empty($this->data['User']['remember_me'])) {
//				$cookie = array();
//				$cookie['username'] = $this->data['User']['username'];
//				$cookie['password'] = $this->data['User']['password'];
//				$this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
//				unset($this->data['User']['remember_me']);
//			}
//			if($this->Auth->user('user_type') == $this->User->userTypes['Admin']) {
//				$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index');
//			}
//			$this->redirect($this->Auth->redirect());
//		}
//		if (empty($this->data)) {
//			$cookie = $this->Cookie->read('Auth.User');
//			if (!is_null($cookie)) {
//				if ($this->Auth->login($cookie)) {
//					//  Clear auth message, just in case we use it.
//					$this->Session->delete('Message.auth');
//					$this->redirect($this->Auth->redirect());
//				}
//			}
//		}
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }
	
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		$this->set('supervisors', $this->User->getSupervisors());
		$this->set('userTypes', $this->User->userTypes);
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		$this->set('supervisors', $this->User->getSupervisors());
		$this->set('userTypes', $this->User->userTypes);
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
		$this->set('supervisors', $this->User->getSupervisors());
		$this->set('userTypes', $this->User->userTypes);

		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		$this->set('supervisors', $this->User->getSupervisors());
		$this->set('userTypes', $this->User->userTypes);
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
}
?>