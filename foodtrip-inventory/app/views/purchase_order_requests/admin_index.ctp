<div class="purchaseOrderRequests index">
	<h2><?php __('Purchase Order Requests');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('supplier_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('approvedBy');?></th>
			<th><?php echo $this->Paginator->sort('cancelledBy');?></th>
			<th><?php echo $this->Paginator->sort('dateCancelled');?></th>
			<th><?php echo $this->Paginator->sort('dateApproved');?></th>
			<th><?php echo $this->Paginator->sort('remarks');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('code');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($purchaseOrderRequests as $purchaseOrderRequest):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $purchaseOrderRequest['PurchaseOrderRequest']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($purchaseOrderRequest['Supplier']['name'], array('controller' => 'suppliers', 'action' => 'view', $purchaseOrderRequest['Supplier']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseOrderRequest['User']['username'], array('controller' => 'users', 'action' => 'view', $purchaseOrderRequest['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseOrderRequest['ApprovedBy']['username'], array('controller' => 'users', 'action' => 'view', $purchaseOrderRequest['ApprovedBy']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseOrderRequest['CancelledBy']['username'], array('controller' => 'users', 'action' => 'view', $purchaseOrderRequest['CancelledBy']['id'])); ?>
		</td>
		<td><?php echo $purchaseOrderRequest['PurchaseOrderRequest']['dateCancelled']; ?>&nbsp;</td>
		<td><?php echo $purchaseOrderRequest['PurchaseOrderRequest']['dateApproved']; ?>&nbsp;</td>
		<td><?php echo $purchaseOrderRequest['PurchaseOrderRequest']['remarks']; ?>&nbsp;</td>
		<td><?php echo $purchaseOrderRequest['PurchaseOrderRequest']['created']; ?>&nbsp;</td>
		<td><?php echo $purchaseOrderRequest['PurchaseOrderRequest']['updated']; ?>&nbsp;</td>
		<td><?php echo $purchaseOrderRequest['PurchaseOrderRequest']['code']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $purchaseOrderRequest['PurchaseOrderRequest']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $purchaseOrderRequest['PurchaseOrderRequest']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $purchaseOrderRequest['PurchaseOrderRequest']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $purchaseOrderRequest['PurchaseOrderRequest']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Purchase Order Request', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Suppliers', true), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier', true), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Order Request Items', true), array('controller' => 'purchase_order_request_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order Request Item', true), array('controller' => 'purchase_order_request_items', 'action' => 'add')); ?> </li>
	</ul>
</div>