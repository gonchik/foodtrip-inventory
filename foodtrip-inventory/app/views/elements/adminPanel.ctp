<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Manage Reports', true), array('controller'=>'pages', 'action'=>'display', 'reports')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('Manage Configurations', true), array('controller'=>'configurations', 'action'=>'index')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('Manage Users', true), array('controller'=>'users', 'action'=>'index')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('Manage Stations', true), array('controller'=>'stations', 'action'=>'index')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('Manage Suppliers', true), array('controller'=>'suppliers', 'action'=>'index')); ?></li>
	</ul>
	<ul>
		<li><?php echo $this->Html->link(__('Manage Products', true), array('controller'=>'products', 'action'=>'index')); ?></li>
	</ul>
</div>