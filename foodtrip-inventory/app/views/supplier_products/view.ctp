<div class="supplierProducts view">
<h2><?php  __('Supplier Product');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplierProduct['SupplierProduct']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Supplier'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($supplierProduct['Supplier']['name'], array('controller' => 'suppliers', 'action' => 'view', $supplierProduct['Supplier']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Product'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($supplierProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $supplierProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cost'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplierProduct['SupplierProduct']['cost']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplierProduct['SupplierProduct']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $supplierProduct['SupplierProduct']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Supplier Products', true), array('action' => 'product_list', $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Supplier Product', true), array('action' => 'edit', $supplierProduct['SupplierProduct']['id'], $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Supplier Product', true), array('action' => 'delete', $supplierProduct['SupplierProduct']['id'], $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name'])), null, sprintf(__('Are you sure you want to delete # %s?', true), $supplierProduct['SupplierProduct']['id'])); ?> </li>
	</ul>
</div>
