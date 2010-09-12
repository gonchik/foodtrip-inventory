<div class="configurations form">
<?php echo $this->Form->create('Configuration');?>
	<fieldset>
 		<legend><?php __('Admin Edit Configuration'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('value');
		echo $this->Form->input('defaultValue');
		echo $this->Form->input('isVisible');
		echo $this->Form->input('isRequired');
		echo $this->Form->input('type');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Configuration.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Configuration.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Configurations', true), array('action' => 'index'));?></li>
	</ul>
</div>