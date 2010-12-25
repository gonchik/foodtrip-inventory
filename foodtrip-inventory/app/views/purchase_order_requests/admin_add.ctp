<div class="purchaseOrderRequests form">
<?php echo $this->Form->create('PurchaseOrderRequest');?>
	<fieldset>
 		<legend><?php __('Admin Add Purchase Order Request'); ?></legend>
	<?php
		echo $this->Form->input('supplier_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('approvedBy');
		echo $this->Form->input('cancelledBy');
		echo $this->Form->input('dateCancelled');
		echo $this->Form->input('dateApproved');
		echo $this->Form->input('remarks');
		echo $this->Form->input('code');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Purchase Order Requests', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Suppliers', true), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier', true), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Order Request Items', true), array('controller' => 'purchase_order_request_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order Request Item', true), array('controller' => 'purchase_order_request_items', 'action' => 'add')); ?> </li>
	</ul>
</div>