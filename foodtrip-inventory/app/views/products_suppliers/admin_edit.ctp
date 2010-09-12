<div class="productsSuppliers form">
<?php echo $this->Form->create('ProductsSupplier');?>
	<fieldset>
 		<legend><?php __('Admin Edit Products Supplier'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('supplier_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ProductsSupplier.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ProductsSupplier.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Products Suppliers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Suppliers', true), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier', true), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>