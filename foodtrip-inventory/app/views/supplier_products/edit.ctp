<div class="supplierProducts form">
<?php echo $this->Form->create('SupplierProduct');?>
	<fieldset>
 		<legend><?php __('Edit Supplier Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('supplier_id', 
			array('type'=>'hidden','value'=>$supplier['Supplier']['id'])
		);
		echo $this->Form->input('product_id', array('disabled'=>'disabled'));
		echo $this->Form->input('cost');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to '.$supplier['Supplier']['name'].' Supplier Products', true), array('action' => 'product_list', $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name'])));?></li>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SupplierProduct.id'), $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name'])), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('SupplierProduct.id'))); ?></li>
	</ul>
</div>