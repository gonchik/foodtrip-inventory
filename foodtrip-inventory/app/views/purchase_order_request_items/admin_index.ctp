<div class="purchaseOrderRequestItems index">
	<h2><?php __('Purchase Order Request Items');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('purchase_order_request_id');?></th>
			<th><?php echo $this->Paginator->sort('quantity');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($purchaseOrderRequestItems as $purchaseOrderRequestItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $purchaseOrderRequestItem['PurchaseOrderRequestItem']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($purchaseOrderRequestItem['Product']['name'], array('controller' => 'products', 'action' => 'view', $purchaseOrderRequestItem['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseOrderRequestItem['PurchaseOrderRequest']['code'], array('controller' => 'purchase_order_requests', 'action' => 'view', $purchaseOrderRequestItem['PurchaseOrderRequest']['id'])); ?>
		</td>
		<td><?php echo $purchaseOrderRequestItem['PurchaseOrderRequestItem']['quantity']; ?>&nbsp;</td>
		<td><?php echo $purchaseOrderRequestItem['PurchaseOrderRequestItem']['created']; ?>&nbsp;</td>
		<td><?php echo $purchaseOrderRequestItem['PurchaseOrderRequestItem']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $purchaseOrderRequestItem['PurchaseOrderRequestItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $purchaseOrderRequestItem['PurchaseOrderRequestItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $purchaseOrderRequestItem['PurchaseOrderRequestItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $purchaseOrderRequestItem['PurchaseOrderRequestItem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Purchase Order Request Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Order Requests', true), array('controller' => 'purchase_order_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order Request', true), array('controller' => 'purchase_order_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>