<div class="products form">
<?php echo $this->Form->create('Product');?>
	<fieldset>
 		<legend><?php __('Add Product'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('unit_cost');
		echo $this->Form->input('unit_price');
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
		<li><?php echo $this->Html->link(__('Back to Products', true), array('action' => 'index'));?></li>
	</ul>
</div>

<?php 
$this->Js->buffer("
	$('#ProductUnitCost').bind('change', setDefaultPrice);
	$('#ProductUnitCost').bind('keyup', setDefaultPrice);
	
	function setDefaultPrice() {
		var markup = ". $markUp['Configuration']['value'] .";
		var cost = Number($('#ProductUnitCost').val());
		$('#ProductUnitPrice').val((cost * markup).toFixed(2));
	}
");
?>