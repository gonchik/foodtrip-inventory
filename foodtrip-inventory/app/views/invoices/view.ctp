<div class="invoices view">
<h2><?php  __('Invoice');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Net Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['total_net_price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Gross Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['total_gross_price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $invoice['Invoice']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Invoice', true), array('action' => 'edit', $invoice['Invoice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Invoice', true), array('action' => 'delete', $invoice['Invoice']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $invoice['Invoice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Invoices', true), array('action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Invoice Items');?></h3>
	<?php if (!empty($invoice['InvoiceItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th><?php __('Quantity'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Invoice Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($invoice['InvoiceItem'] as $invoiceItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $invoiceItem['id'];?></td>
			<td><?php echo $invoiceItem['product_id'];?></td>
			<td><?php echo $invoiceItem['quantity'];?></td>
			<td><?php echo $invoiceItem['price'];?></td>
			<td><?php echo $invoiceItem['invoice_id'];?></td>
			<td><?php echo $invoiceItem['created'];?></td>
			<td><?php echo $invoiceItem['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'invoice_items', 'action' => 'view', $invoiceItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'invoice_items', 'action' => 'edit', $invoiceItem['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'invoice_items', 'action' => 'delete', $invoiceItem['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $invoiceItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Invoice Item', true), array('controller' => 'invoice_items', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
