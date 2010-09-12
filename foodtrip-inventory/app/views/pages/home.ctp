<?php
if($session->read('Auth.User')) {
	if($session->read('Auth.User.user_type') == 'Admin') {
		echo $this->element('adminPanel');
	}
	else {
		echo $this->element('userPanel');
	}
}
else {
	echo $session->flash('auth');
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username');
    echo $form->input('password');
    echo $form->end('Login');
}
?>