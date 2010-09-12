<?php 
$assignUsersJson = $this->Javascript->object($assignedUsers);
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
		<li><?php echo $this->Html->link(__('Back to Stations', true), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout', true), array('controller'=>'users', 'action'=>'logout')); ?></li>
	</ul>
</div>

<script type = "text/javascript">
$(document).ready(function(){
	var assignedUsers = <?php echo $assignUsersJson; ?>;
	for (var id in assignedUsers) {
		var assignedUser = assignedUsers[id];
		$('#StationAssignmentUser > option[value='+assignedUser+']').attr('selected', 'selected');
	}
});
</script>