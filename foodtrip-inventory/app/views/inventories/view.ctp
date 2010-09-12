<div class="inventories view">
<h2><?php  __('Inventory');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $inventory['Inventory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Product'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($inventory['Product']['name'], array('controller' => 'products', 'action' => 'view', $inventory['Product']['id'], Inflector::slug($inventory['Product']['name']))); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cost'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $inventory['Inventory']['cost']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Quantity'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $inventory['Inventory']['quantity']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Station'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($inventory['Station']['name'], array('controller' => 'inventories', 'action' => 'station', $inventory['Station']['id'], Inflector::slug($inventory['Station']['name']))); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $inventory['Inventory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $inventory['Inventory']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to Station: '.$station['Station']['name'], true), array('controller' => 'inventories', 'action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Inventory', true), array('action' => 'edit', $inventory['Inventory']['id'], $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Inventory', true), array('action' => 'delete', $inventory['Inventory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $inventory['Inventory']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Transactions');?></h3>
	<?php if (!empty($inventory['Transaction'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Inventory Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Transaction Type'); ?></th>
		<th><?php __('Old Cost'); ?></th>
		<th><?php __('Old Quantity'); ?></th>
		<th><?php __('New Cost'); ?></th>
		<th><?php __('New Quantity'); ?></th>
		<th><?php __('Remarks'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($inventory['Transaction'] as $transaction):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $transaction['id'];?></td>
			<td><?php echo $transaction['inventory_id'];?></td>
			<td><?php echo $transaction['user_id']; //TODO: display username and link to user's page ?></td>	
			<td><?php echo $transaction['transaction_type'];?></td>
			<td><?php echo $transaction['old_cost'];?></td>
			<td><?php echo $transaction['old_quantity'];?></td>
			<td><?php echo $transaction['new_cost'];?></td>
			<td><?php echo $transaction['new_quantity'];?></td>
			<td><?php echo $transaction['remarks'];?></td>
			<td><?php echo $transaction['created'];?></td>
			<td><?php echo $transaction['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'transactions', 'action' => 'view', $transaction['id'])); ?>
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
