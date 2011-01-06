<div class="supplierProducts form">
<?php echo $this->Form->create('SupplierProduct', array('url'=>array('action'=>'add', $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name']))));?>
	<fieldset>
 		<legend><?php __('Add Supplier Product'); ?></legend>
	<?php
		echo $this->Form->input('supplier_id', 
			array('type'=>'hidden','value'=>$supplier['Supplier']['id'])
		);
		echo $this->Form->input('product_id');
		echo $this->Form->input('cost');
	?>
	</fieldset>
	
<?php
if($addMore) {
	echo $this->Form->input('add_more', array('type'=>'checkbox','value'=>'addMore', 'checked'=>'checked'));	
}
else {
	echo $this->Form->input('add_more', array('type'=>'checkbox','value'=>'addMore'));
}
?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to '.$supplier['Supplier']['name'].' Supplier Products', true), array('action' => 'product_list', $supplier['Supplier']['id'], Inflector::slug($supplier['Supplier']['name'])));?></li>
	</ul>
</div>
<?php
$this->Js->buffer("
	updateCost();
	$('#SupplierProductProductId').bind('change', function() {
		updateCost();
	});
	
	function updateCost() {
		var productId = $('#SupplierProductProductId').val();
		var submit = $('div.submit > input[type=submit]');
		$.ajax({
			url: '". $this->Html->url(array('action'=>'getDefaultProductCost')) ."' + '/' + productId,
			success: function(msg) {
				setCost(parseFloat(msg));
			}
		});
	}
	
	function setCost(cost) {
		$('#SupplierProductCost').val(cost.toFixed(2));	
	}
");
?>