<?php 
$assignUsersJson = $this->Js->object($assignedUsers);
?>
<div class="stationAssignments form">
<?php echo $this->Form->create('StationAssignment');?>
	<fieldset>
 		<legend><?php __('Add Station Assignment'); ?></legend>
	<?php
		echo $this->Form->input('station_id', 
			array('type'=>'hidden','value'=>$station['Station']['id'])
		);
		echo $this->Form->input('User', 
			array('type'=>'select', 'multiple'=>true, )
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to Station: '.$station['Station']['name'], true), array('controller' => 'stations', 'action' => 'view', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
	</ul>
</div>

<?php
$this->Js->buffer("
	var assignedUsers = " . $assignUsersJson . "
	for (var i in assignedUsers) {
		var assignedUser = assignedUsers[i];
		$('#StationAssignmentUser > option[value='+assignedUser+']').attr('selected', 'selected');
	}
");
?>