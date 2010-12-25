<div class="purchaseOrderRequestItems view">
<h2><?php  __('Purchase Order Request Item');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrderRequestItem['PurchaseOrderRequestItem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Product'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($purchaseOrderRequestItem['Product']['name'], array('controller' => 'products', 'action' => 'view', $purchaseOrderRequestItem['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Purchase Order Request'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($purchaseOrderRequestItem['PurchaseOrderRequest']['code'], array('controller' => 'purchase_order_requests', 'action' => 'view', $purchaseOrderRequestItem['PurchaseOrderRequest']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Quantity'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrderRequestItem['PurchaseOrderRequestItem']['quantity']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrderRequestItem['PurchaseOrderRequestItem']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $purchaseOrderRequestItem['PurchaseOrderRequestItem']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Purchase Order Request Item', true), array('action' => 'edit', $purchaseOrderRequestItem['PurchaseOrderRequestItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Purchase Order Request Item', true), array('action' => 'delete', $purchaseOrderRequestItem['PurchaseOrderRequestItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $purchaseOrderRequestItem['PurchaseOrderRequestItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Order Request Items', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order Request Item', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Order Requests', true), array('controller' => 'purchase_order_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order Request', true), array('controller' => 'purchase_order_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
