<div class="inventories form">
<?php echo $this->Form->create('Inventory');?>
	<fieldset>
 		<legend><?php __('Add Inventory'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('quantity');
		echo $this->Form->input('station_id', array('type'=>'hidden','value'=>$station['Station']['id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to Station: '.$station['Station']['name'], true), array('controller' => 'stations', 'action' => 'view', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
	</ul>
</div>