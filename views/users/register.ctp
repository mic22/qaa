<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Register'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('password2', array('type'=>'password', 'label'=>'Confirm password'));
		echo $this->Form->input('name');
		echo $this->Form->input('surname');
		echo $this->Form->input('city');
		//echo $this->Form->input('date_registered');
		//echo $this->Form->input('date_last_logged_in');
		//echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>