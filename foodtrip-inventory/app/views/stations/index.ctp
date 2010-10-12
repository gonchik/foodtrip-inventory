<div class="stations index">
	<h2><?php __('Stations');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stations as $station):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $station['Station']['id']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link(__($station['Station']['name'], true), array('action' => 'view', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?>&nbsp;</td>
		<td><?php echo $station['Station']['description']; ?>&nbsp;</td>
		<td><?php echo $station['Station']['created']; ?>&nbsp;</td>
		<td><?php echo $station['Station']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $station['Station']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $station['Station']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Station', true), array('action' => 'add')); ?></li>
	</ul>
</div>