<div class="purchaseOrderRequestItems form">
<?php echo $this->Form->create('PurchaseOrderRequestItem');?>
	<fieldset>
 		<legend><?php __('Edit Purchase Order Request Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Back to Purchase Order Requests', true), array('controller' => 'purchase_order_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Manage Purchase Order Request Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PurchaseOrderRequestItem.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PurchaseOrderRequestItem.id'))); ?></li>
	</ul>
</div>