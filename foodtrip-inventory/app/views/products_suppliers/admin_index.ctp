<div class="productsSuppliers index">
	<h2><?php __('Products Suppliers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('supplier_id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($productsSuppliers as $productsSupplier):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $productsSupplier['ProductsSupplier']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($productsSupplier['Supplier']['name'], array('controller' => 'suppliers', 'action' => 'view', $productsSupplier['Supplier']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($productsSupplier['Product']['name'], array('controller' => 'products', 'action' => 'view', $productsSupplier['Product']['id'])); ?>
		</td>
		<td><?php echo $productsSupplier['ProductsSupplier']['price']; ?>&nbsp;</td>
		<td><?php echo $productsSupplier['ProductsSupplier']['created']; ?>&nbsp;</td>
		<td><?php echo $productsSupplier['ProductsSupplier']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $productsSupplier['ProductsSupplier']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $productsSupplier['ProductsSupplier']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $productsSupplier['ProductsSupplier']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productsSupplier['ProductsSupplier']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Products Supplier', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Suppliers', true), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier', true), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>