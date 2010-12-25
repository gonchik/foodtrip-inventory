<div class="purchaseOrderRequests view">
<h2><?php  __('Purchase Order Request');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrderRequest['PurchaseOrderRequest']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Supplier'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($purchaseOrderRequest['Supplier']['name'], array('controller' => 'suppliers', 'action' => 'view', $purchaseOrderRequest['Supplier']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($purchaseOrderRequest['User']['username'], array('controller' => 'users', 'action' => 'view', $purchaseOrderRequest['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Approved By'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($purchaseOrderRequest['ApprovedBy']['username'], array('controller' => 'users', 'action' => 'view', $purchaseOrderRequest['ApprovedBy']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cancelled By'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($purchaseOrderRequest['CancelledBy']['username'], array('controller' => 'users', 'action' => 'view', $purchaseOrderRequest['CancelledBy']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('DateCancelled'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrderRequest['PurchaseOrderRequest']['dateCancelled']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('DateApproved'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrderRequest['PurchaseOrderRequest']['dateApproved']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Remarks'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrderRequest['PurchaseOrderRequest']['remarks']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrderRequest['PurchaseOrderRequest']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrderRequest['PurchaseOrderRequest']['updated']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrderRequest['PurchaseOrderRequest']['code']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to Purchase Order Requests', true), array('action' => 'index')); ?> </li>		
		<?php
			if($purchaseOrderRequest['PurchaseOrderRequest']['dateApproved'] == null) {
				echo '<li>'. $this->Html->link(__('Edit Purchase Order Request', true), array('action' => 'edit', $purchaseOrderRequest['PurchaseOrderRequest']['id'])) .'</li>';
				echo '<li>'. $this->Html->link(__('Approve', true), array('action' => 'approve', $purchaseOrderRequest['PurchaseOrderRequest']['id']), null, sprintf(__('Are you sure you want to approve # %s?', true), $purchaseOrderRequest['PurchaseOrderRequest']['id'])).'</li>';	
			}
		?>
		<li><?php echo $this->Html->link(__('Cancel', true), array('action' => 'cancel', $purchaseOrderRequest['PurchaseOrderRequest']['id']), null, sprintf(__('Are you sure you want to cancel # %s?', true), $purchaseOrderRequest['PurchaseOrderRequest']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Purchase Order Request Items');?></h3>
	<?php if (!empty($purchaseOrderRequest['PurchaseOrderRequestItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th><?php __('Quantity'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($purchaseOrderRequest['PurchaseOrderRequestItem'] as $purchaseOrderRequestItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $purchaseOrderRequestItem['id'];?></td>
			<td><?php echo $this->Html->link(__($purchaseOrderRequestItem['Product']['name'], true), array('controller' => 'purchase_order_request_items', 'action' => 'view', $purchaseOrderRequestItem['product_id'], Inflector::slug($purchaseOrderRequestItem['Product']['name'])));?></td>
			<td><?php echo $purchaseOrderRequestItem['quantity'];?></td>
			<td><?php echo $purchaseOrderRequestItem['created'];?></td>
			<td><?php echo $purchaseOrderRequestItem['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'purchase_order_request_items', 'action' => 'view', $purchaseOrderRequestItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
		</ul>
	</div>
</div>
