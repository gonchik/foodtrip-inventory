<div class="suppliers form">
<?php echo $this->Form->create('Supplier');?>
	<fieldset>
 		<legend><?php __('Edit Supplier'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('Product');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Manage Suppliers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Supplier.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Supplier.id'))); ?></li>
	</ul>
</div>