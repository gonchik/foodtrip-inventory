<div class="inventories form">
<?php echo $this->Form->create('Inventory');?>
	<fieldset>
 		<legend><?php __('Edit Inventory'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cost');
		echo $this->Form->input('quantity');
		echo $this->Form->input('Transaction.remarks', array('title'=>'Describe the reason for modifying this inventory'));
		echo $this->Form->input('station_id', array('type'=>'hidden','value'=>$station['Station']['id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to Station: '.$station['Station']['name'], true), array('controller' => 'inventories', 'action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
	</ul>
</div>