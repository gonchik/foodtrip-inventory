<div class="invoices index">
	<h2><?php __('Invoices');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('total_net_price');?></th>
			<th><?php echo $this->Paginator->sort('total_gross_price');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($invoices as $invoice):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $invoice['Invoice']['id']; ?>&nbsp;</td>
		<td><?php echo $invoice['Invoice']['total_net_price']; ?>&nbsp;</td>
		<td><?php echo $invoice['Invoice']['total_gross_price']; ?>&nbsp;</td>
		<td><?php echo $invoice['Invoice']['created']; ?>&nbsp;</td>
		<td><?php echo $invoice['Invoice']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $invoice['Invoice']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $invoice['Invoice']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $invoice['Invoice']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $invoice['Invoice']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Invoice', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Invoice Items', true), array('controller' => 'invoice_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice Item', true), array('controller' => 'invoice_items', 'action' => 'add')); ?> </li>
	</ul>
</div>