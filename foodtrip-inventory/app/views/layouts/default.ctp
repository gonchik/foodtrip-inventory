<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		
		echo $this->Javascript->link('jquery-1.4.2.min');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Inventory Management</h1>
		</div>
		<div id="content">
			<?php  
			if($session->read('Auth.User')) {
				echo 'Currently logged in as: '.$this->Html->link(__($session->read('Auth.User.username'), true), array('controller'=>'users', 'action'=>'view', $session->read('Auth.User.id'), Inflector::slug($session->read('Auth.User.username'))));
				echo '<br>';
				echo '<ul>';
				echo '<li>'.$this->Html->link(__('Main Menu', true), array('controller'=>'pages', 'action'=>'display', 'home')).'</li>';
				echo '<li>'.$this->Html->link(__('Logout', true), array('controller'=>'users', 'action'=>'logout')).'</li>';
				echo '</ul>';
			}
			?>
			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>