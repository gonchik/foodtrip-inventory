<div class="purchaseOrderRequestItems form">
<?php echo $this->Form->create('PurchaseOrderRequestItem');?>
	<fieldset>
 		<legend><?php __('Add Purchase Order Request Item'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
	
<?php
if($addMore) {
	echo $this->Form->input('add_more', array('type'=>'checkbox','value'=>'addMore', 'checked'=>'checked'));	
}
else {
	echo $this->Form->input('add_more', array('type'=>'checkbox','value'=>'addMore'));
}
?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Back to Purchase Order Requests', true), array('controller' => 'purchase_order_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Manage Purchase Order Request Items', true), array('action' => 'index'));?></li>
	</ul>
</div>