<div class="transactions form">
<?php echo $this->Form->create('Transaction');?>
	<fieldset>
 		<legend><?php __('Admin Edit Transaction'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('inventory_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('transaction_type');
		echo $this->Form->input('old_cost');
		echo $this->Form->input('old_quantity');
		echo $this->Form->input('new_cost');
		echo $this->Form->input('new_quantity');
		echo $this->Form->input('remarks');
		echo $this->Form->input('transaction_number');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Transaction.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Transaction.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transactions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Inventories', true), array('controller' => 'inventories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory', true), array('controller' => 'inventories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>