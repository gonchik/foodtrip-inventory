<div class="supplierProducts form">
<?php echo $this->Form->create('SupplierProduct');?>
	<fieldset>
 		<legend><?php __('Admin Edit Supplier Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('supplier_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('cost');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SupplierProduct.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('SupplierProduct.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Supplier Products', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Suppliers', true), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier', true), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>