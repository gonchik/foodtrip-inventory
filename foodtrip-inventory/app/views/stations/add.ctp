<div class="stations form">
<?php echo $this->Form->create('Station');?>
	<fieldset>
 		<legend><?php __('Add Station'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Manage Stations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout', true), array('controller'=>'users', 'action'=>'logout')); ?></li>
	</ul>
</div>