<div class="purchaseOrderRequestItems form">
<?php echo $this->Form->create('PurchaseOrderRequestItem');?>
	<fieldset>
 		<legend><?php __('Admin Add Purchase Order Request Item'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('purchase_order_request_id');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Purchase Order Request Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Order Requests', true), array('controller' => 'purchase_order_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order Request', true), array('controller' => 'purchase_order_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>