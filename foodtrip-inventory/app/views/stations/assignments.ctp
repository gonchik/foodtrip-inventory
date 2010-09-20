<div class="stations form">
	<?php echo $this->Form->create('Station');?>
		<fieldset>
	 		<legend><?php __('Add Station'); ?></legend>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('description');
			echo $this->Form->input('User');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Save Assignments', true));?>

	<h2><?php __('Assignments');?></h2>
	<select name="stations">
	<?php
	foreach($stations as $station) {
		echo '<option value="'.$station['Station']['id'].'">'.$station['Station']['name'].'</option>';
	}
	?>
	</select>
	<select name="users" multiple="multiple">
	<?php
	foreach($users as $user) {
		echo '<option value="'.$user['User']['id'].'">'.$user['User']['username'].'</option>';
	}
	?>
	</select>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to Stations', true), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Back to Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Station', true), array('action' => 'add')); ?></li>
	</ul>
</div>

<div class="stationAssignments form">
<?php echo $this->Form->create('StationAssignment');?>
	<fieldset>
 		<legend><?php __('Add Station Assignment'); ?></legend>
	<?php
		echo $this->Form->input('station_id', array('value'=>$station['station']['id']));
		echo $this->Form->input('User', 
			array('type'=>'select', 'multiple'=>'multiple')
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to Stations', true), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Back to Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Station', true), array('action' => 'add')); ?></li>
	</ul>
</div>