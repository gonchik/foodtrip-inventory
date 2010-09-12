<?php
$stations = $this->requestAction("/stations/get/".$session->read('Auth.User.id'));
?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('View My Profile', true), array('controller'=>'users', 'action'=>'view', $session->read('Auth.User.id'), Inflector::slug($session->read('Auth.User.username')))); ?></li>
	</ul>
	<?php
	foreach ($stations as $station) {
		echo '<ul>';
			echo '<li>'.$this->Html->link(__('Manage Station:'.$station['Station']['name'], true), array('controller'=>'stations', 'action'=>'view', $station['Station']['id'], Inflector::slug($station['Station']['name']))).'</li>';
		echo '</ul>';	
	}
	?>
</div>