<div class="questionsTags form">
<?php echo $this->Form->create('QuestionsTag');?>
	<fieldset>
		<legend><?php __('Add Questions Tag'); ?></legend>
	<?php
		echo $this->Form->input('question_id');
		echo $this->Form->input('tag_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Questions Tags', true), array('action' => 'index'));?></li>
	</ul>
</div>