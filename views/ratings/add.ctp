<div class="ratings form">
<?php echo $this->Form->create('Rating');?>
	<fieldset>
		<legend><?php __('Add Rating'); ?></legend>
	<?php
		echo $this->Form->input('answer_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('mark');
		echo $this->Form->input('date_rated');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ratings', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Answers', true), array('controller' => 'answers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answer', true), array('controller' => 'answers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>