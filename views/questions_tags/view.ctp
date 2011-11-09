<div class="questionsTags view">
<h2><?php  __('Questions Tag');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $questionsTag['QuestionsTag']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Question Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $questionsTag['QuestionsTag']['question_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tag Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $questionsTag['QuestionsTag']['tag_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Questions Tag', true), array('action' => 'edit', $questionsTag['QuestionsTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Questions Tag', true), array('action' => 'delete', $questionsTag['QuestionsTag']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $questionsTag['QuestionsTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions Tags', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions Tag', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
