<div class="supplierProducts index">
	<h2><?php __($supplier['Supplier']['name'].' Product List');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('supplier_id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('cost');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($supplierProducts as $supplierProduct):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $supplierProduct['SupplierProduct']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($supplierProduct['Supplier']['name'], array('controller' => 'suppliers', 'action' => 'view', $supplierProduct['Supplier']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($supplierProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $supplierProduct['Product']['id'])); ?>
		</td>
		<td><?php echo $supplierProduct['SupplierProduct']['cost']; ?>&nbsp;</td>
		<td><?php echo $supplierProduct['SupplierProduct']['created']; ?>&nbsp;</td>
		<td><?php echo $supplierProduct['SupplierProduct']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $supplierProduct['SupplierProduct']['id'], $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name']))); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $supplierProduct['SupplierProduct']['id'], $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name']))); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $supplierProduct['SupplierProduct']['id'], $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name'])), null, sprintf(__('Are you sure you want to delete # %s?', true), $supplierProduct['SupplierProduct']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Back to Supplier: '.$supplier['Supplier']['name'], true), array('controller' => 'suppliers', 'action' => 'view', $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('Add Supplier Product', true), array('action' => 'add', $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name']))); ?></li>
	</ul>
</div>