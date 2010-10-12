<div class="inventories index">
	<h2><?php __($station['Station']['name'].' Price List');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('station_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stationPrices as $stationPrice):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $stationPrice['StationPrice']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stationPrice['Product']['name'], array('controller' => 'products', 'action' => 'view', $stationPrice['Product']['id'], Inflector::slug($stationPrice['Product']['name']))); ?>
		</td>
		<td><?php echo $stationPrice['StationPrice']['price']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stationPrice['Station']['name'], array('controller' => 'stations', 'action' => 'view', $stationPrice['Station']['id'], Inflector::slug($stationPrice['Station']['name']))); ?>
		</td>
		<td><?php echo $stationPrice['StationPrice']['created']; ?>&nbsp;</td>
		<td><?php echo $stationPrice['StationPrice']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $stationPrice['StationPrice']['id'], $stationPrice['Station']['id'], Inflector::slug($stationPrice['Station']['name']))); ?>
			<?php echo $this->Html->link(__('Modify', true), array('action' => 'edit', $stationPrice['StationPrice']['id'], $stationPrice['Station']['id'], Inflector::slug($stationPrice['Station']['name']))); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $stationPrice['StationPrice']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stationPrice['StationPrice']['id'])); ?>
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