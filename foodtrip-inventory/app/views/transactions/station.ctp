<div class="transactions index">
	<h2><?php __('Transactions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('inventory_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('transaction_type');?></th>
			<th><?php echo $this->Paginator->sort('old_cost');?></th>
			<th><?php echo $this->Paginator->sort('old_quantity');?></th>
			<th><?php echo $this->Paginator->sort('new_cost');?></th>
			<th><?php echo $this->Paginator->sort('new_quantity');?></th>
			<th><?php echo $this->Paginator->sort('remarks');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('transaction_number');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($transactions as $transaction):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $transaction['Transaction']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transaction['Inventory']['id'], array('controller' => 'inventories', 'action' => 'view', $transaction['Inventory']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transaction['User']['username'], array('controller' => 'users', 'action' => 'view', $transaction['User']['id'])); ?>
		</td>
		<td><?php echo $transaction['Transaction']['transaction_type']; ?>&nbsp;</td>
		<td><?php echo $transaction['Transaction']['old_cost']; ?>&nbsp;</td>
		<td><?php echo $transaction['Transaction']['old_quantity']; ?>&nbsp;</td>
		<td><?php echo $transaction['Transaction']['new_cost']; ?>&nbsp;</td>
		<td><?php echo $transaction['Transaction']['new_quantity']; ?>&nbsp;</td>
		<td><?php echo $transaction['Transaction']['remarks']; ?>&nbsp;</td>
		<td><?php echo $transaction['Transaction']['created']; ?>&nbsp;</td>
		<td><?php echo $transaction['Transaction']['updated']; ?>&nbsp;</td>
		<td><?php echo $transaction['Transaction']['transaction_number']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $transaction['Transaction']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Back to Station: '.$station['Station']['name'], true), array('controller' => 'stations', 'action' => 'view', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
	</ul>
</div>