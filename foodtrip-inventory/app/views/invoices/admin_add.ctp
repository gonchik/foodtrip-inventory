<div class="invoices form">
<?php echo $this->Form->create('Invoice');?>
	<fieldset>
 		<legend><?php __('Admin Add Invoice'); ?></legend>
	<?php
		echo $this->Form->input('total_net_price');
		echo $this->Form->input('total_gross_price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Invoices', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Invoice Items', true), array('controller' => 'invoice_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice Item', true), array('controller' => 'invoice_items', 'action' => 'add')); ?> </li>
	</ul>
</div>