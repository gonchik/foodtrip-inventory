<div class="suppliers form">
<?php echo $this->Form->create('Supplier');?>
	<fieldset>
 		<legend><?php __('Add Supplier'); ?></legend>
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
		<li><?php echo $this->Html->link(__('Manage Suppliers', true), array('action' => 'index'));?></li>
	</ul>
</div>