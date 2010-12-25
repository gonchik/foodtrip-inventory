<div class="purchaseOrderRequests form">
<?php echo $this->Form->create('PurchaseOrderRequest');?>
	<fieldset>
 		<legend><?php __('Add Purchase Order Request'); ?></legend>
	<?php
		echo $this->Form->input('code', array('type'=>'text'));
		echo $this->Form->input('supplier_id');
		echo $this->Form->input('remarks');
		echo $this->Form->input('PurchaseOrderRequestItem', 
			array('type'=>'select', 'multiple'=>true, )
		);
	?>
	
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Back to Purchase Order Requests', true), array('action' => 'index'));?></li>
	</ul>
</div>

<?php
$this->Js->buffer("
	var submit = $('div.submit > input[type=submit]');
	refreshAvailableRequestItems();
	$('#PurchaseOrderRequestSupplierId').bind('change', refreshAvailableRequestItems);
	
	function refreshAvailableRequestItems() {
		var supplierId = $('#PurchaseOrderRequestSupplierId').val();
		var options = '';
		submit.attr('disabled', true);
		$.ajax({
			dataType: 'json',
			url: '". $this->Html->url(array('action'=>'getSupplierSpecificAvailablePurchaseOrderRequestItems')) ."/' + supplierId,
			success: function(items) {
				for (var id in items) {
					var item = items[id].PurchaseOrderRequestItem;
					options += '<option value=\"' + item.id + '\">' + item.details + '</option>'	
				}
				$('#PurchaseOrderRequestPurchaseOrderRequestItem').html(options);
				submit.attr('disabled', false);
			}
		});
	}
");
?>