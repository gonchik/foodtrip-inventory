<div class="configurations index">
	<h2><?php __('Configurations');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('value');?></th>
			<th><?php echo $this->Paginator->sort('defaultValue');?></th>
			<th><?php echo $this->Paginator->sort('isVisible');?></th>
			<th><?php echo $this->Paginator->sort('isRequired');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($configurations as $configuration):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $configuration['Configuration']['id']; ?>&nbsp;</td>
		<td><?php echo $configuration['Configuration']['name']; ?>&nbsp;</td>
		<td><?php echo $configuration['Configuration']['value']; ?>&nbsp;</td>
		<td><?php echo $configuration['Configuration']['defaultValue']; ?>&nbsp;</td>
		<td><?php echo $configuration['Configuration']['isVisible']; ?>&nbsp;</td>
		<td><?php echo $configuration['Configuration']['isRequired']; ?>&nbsp;</td>
		<td><?php echo $configuration['Configuration']['type']; ?>&nbsp;</td>
		<td><?php echo $configuration['Configuration']['created']; ?>&nbsp;</td>
		<td><?php echo $configuration['Configuration']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $configuration['Configuration']['id'], Inflector::slug($configuration['Configuration']['name']))); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $configuration['Configuration']['id'], Inflector::slug($configuration['Configuration']['name']))); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $configuration['Configuration']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $configuration['Configuration']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Configuration', true), array('action' => 'add')); ?></li>
	</ul>
</div>