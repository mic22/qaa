<h2><?php  __('User details');?></h2>
	<?= $this->Gravatar->image($user['User']['email'], array('size'=>100, 'class'=>'span-3 colborder')); ?>
	<ul class="span-13 last">
		<li><?= $this->Extras->username($user['User']['email']); ?> signed in <?= $this->ReadableDate->convert($user['User']['date_registered']); ?></li>
		<li>Last seen <?= $this->ReadableDate->convert($user['User']['date_last_logged_in']); ?></li>
		<li><?= $user['User']['name'].' '.$user['User']['surname']; ?> comes from <?= $user['User']['city']; ?></li>
	</ul>
	<hr>
<?= $this->Html->image('http://maps.google.com/maps/api/staticmap?markers=color:blue|'.$user['User']['city'].'&size=680x350&sensor=true', array('class'=>'push-1 span-16 last')); ?>
