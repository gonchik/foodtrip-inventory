<div class="invoiceItems form">
<?php echo $this->Form->create('InvoiceItem', array('url'=>array('action'=>'add', $station['Station']['id'], Inflector::slug($station['Station']['name']))));?>
	<fieldset>
 		<legend><?php __('Add Invoice Item'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('quantity');
		echo $this->Form->input('price');
		echo $this->Form->input('invoice_id', array('type'=>'hidden','value'=>$invoice['Invoice']['id']));
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
		<li><?php echo $this->Html->link(__('Back to Station: '.$station['Station']['name'], true), array('controller'=>'stations','action' => 'view', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('Back to Invoices', true), array('controller'=>'invoices','action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
	</ul>
</div>

<?php
$this->Js->buffer("
	var submit = $('div.submit > input[type=submit]');
	updateCost();
	$('#InvoiceItemProductId').bind('change', function() {
		updateCost();
	});

	function updateCost() {
		var productId = $('#InvoiceItemProductId').val();
		var invoiceId = $('#InvoiceItemInvoiceId').val();
		submit.attr('disabled', true);
		$.ajax({
			url: '". $this->Html->url(array('action'=>'getDefaultStationPricePrice')) ."/' + productId + '/' + invoiceId,
			success: function(msg) {
				setCost(parseFloat(msg));
				submit.attr('disabled', false);
			}
		});
	}

	function setCost(cost) {
		$('#InvoiceItemPrice').val(cost.toFixed(2));
	}
");
?>