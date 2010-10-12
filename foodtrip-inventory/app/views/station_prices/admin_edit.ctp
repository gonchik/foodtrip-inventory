<div class="stationPrices form">
<?php echo $this->Form->create('StationPrice');?>
	<fieldset>
 		<legend><?php __('Admin Edit Station Price'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('station_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('StationPrice.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('StationPrice.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Station Prices', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Stations', true), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Station', true), array('controller' => 'stations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>