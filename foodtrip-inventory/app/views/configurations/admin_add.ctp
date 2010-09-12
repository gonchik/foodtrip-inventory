<div class="configurations form">
<?php echo $this->Form->create('Configuration');?>
	<fieldset>
 		<legend><?php __('Admin Add Configuration'); ?></legend>
	<?php
		echo $this->Form->input('value');
		echo $this->Form->input('defaultValue');
		echo $this->Form->input('isVisible');
		echo $this->Form->input('isRequired');
		echo $this->Form->input('type');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Configurations', true), array('action' => 'index'));?></li>
	</ul>
</div>