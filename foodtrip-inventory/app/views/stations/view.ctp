<?php 
//TODO: move to controller?
$isSeller = $session->read('Auth.User.user_type') == 'Seller';
?>
<div class="stations view">
<h2><?php  __('Station');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $station['Station']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $station['Station']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $station['Station']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $station['Station']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $station['Station']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to Stations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Manage Assignments', true), array('controller'=>'station_assignments','action' => 'add', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?></li>
		<li><?php echo $this->Html->link(__('Edit Station', true), array('action' => 'edit', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Station', true), array('action' => 'delete', $station['Station']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $station['Station']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('View Station Inventory', true), array('controller' => 'inventories', 'action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
		<li><?php echo $this->Html->link(__('View Sales', true), array('controller' => 'invoices', 'action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Personnel');?></h3>
	<?php if (!empty($stationAssignments)):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Username'); ?></th>
		<th><?php __('Password'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th><?php __('Supervisor Id'); ?></th>
		<th><?php __('User Type'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach($stationAssignments as $stationAssignment):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		
		<tr<?php echo $class;?>>
			<td><?php echo $stationAssignment['User']['id'];?></td>
			<td><?php echo $stationAssignment['User']['username'];?></td>
			<td><?php echo $stationAssignment['User']['password'];?></td>
			<td><?php echo $stationAssignment['User']['created'];?></td>
			<td><?php echo $stationAssignment['User']['updated'];?></td>
			<td><?php echo $stationAssignment['User']['supervisor_id'];?></td>
			<td><?php echo $stationAssignment['User']['user_type'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'users', 'action' => 'view', $stationAssignment['User']['id'], Inflector::slug($stationAssignment['User']['username']))); ?>
				<?php 
				if(!$isSeller) { 
					echo $this->Html->link(__('Edit', true), array('controller' => 'users', 'action' => 'edit', $stationAssignment['User']['id'], Inflector::slug($stationAssignment['User']['username'])));
					echo $this->Html->link(__('Delete', true), array('controller' => 'users', 'action' => 'delete', $stationAssignment['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stationAssignment['User']['id']));
				}
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Inventory');?></h3>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Receive Goods', true), array('controller' => 'inventories', 'action' => 'add', $station['Station']['id']));?> </li>
			<li><?php echo $this->Html->link(__('View Station Inventory', true), array('controller' => 'inventories', 'action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
		</ul>
	</div>
	<?php if (!empty($station['Inventory'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th><?php __('Cost'); ?></th>
		<th><?php __('Quantity'); ?></th>
		<th><?php __('Station Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($station['Inventory'] as $inventory):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $inventory['id'];?></td>
			<td><?php echo $inventory['product_id'];?></td>
			<td><?php echo $inventory['cost'];?></td>
			<td><?php echo $inventory['quantity'];?></td>
			<td><?php echo $inventory['station_id'];?></td>
			<td><?php echo $inventory['created'];?></td>
			<td><?php echo $inventory['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'inventories', 'action' => 'view', $inventory['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'inventories', 'action' => 'edit', $inventory['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'inventories', 'action' => 'delete', $inventory['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $inventory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table><div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Receive Goods', true), array('controller' => 'inventories', 'action' => 'add', $station['Station']['id']));?> </li>
			<li><?php echo $this->Html->link(__('View Station Inventory', true), array('controller' => 'inventories', 'action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name']))); ?> </li>
		</ul>
	</div>
<?php endif; ?>
</div>
