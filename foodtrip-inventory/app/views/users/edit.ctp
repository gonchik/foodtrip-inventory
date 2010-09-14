<div class="users form">
<?php echo $this->data['Supervisor']['username'];echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password', array('value'=>'', 'label'=>'Password <a title="No need to input a password if you dont want to change it">?</a>'));
		if($session->read('Auth.User.user_type') == 'Admin') {
			echo $this->Form->input('supervisor_id');
			echo $this->Form->input('user_type', array(
				'type' => 'select',
				'options' => $userTypes
			));
		}
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Manage Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('User.id'))); ?></li>
	</ul>
</div>