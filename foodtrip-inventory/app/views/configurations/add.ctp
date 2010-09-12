<div class="configurations form">
<?php echo $this->Form->create('Configuration');?>
	<fieldset>
 		<legend><?php __('Add Configuration'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('value');
		echo $this->Form->input('defaultValue');
		echo $this->Form->input('isVisible');
		echo $this->Form->input('isRequired');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Manage Configurations', true), array('action' => 'index'));?></li>
	</ul>
</div>