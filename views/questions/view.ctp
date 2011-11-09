<h2>Question</h2>
	<div class="question">
		<h3><?= $this->Html->link($question['Question']['title'], '/questions/view/'.$question['Question']['id']); ?></h3>
		<ul>
			<li><?= $this->ReadableDate->convert($question['Question']['date_posted']); ?>
				<? if(($question['Question']['date_last_edited']!='0000-00-00 00:00:00')) echo ' (edited '.$this->ReadableDate->convert($question['Question']['date_last_edited']).')';?> by <?= $this->Html->link($this->Extras->username($question['User']['email']), '/users/view/'.$question['Question']['user_id']); ?> in <?= $question['Category']['name']; ?></li>
		</ul>
		<ul class="tags">
		<? foreach ($question['Tag'] as $tag): ?>
			<li><?= $this->Html->link('<span>'.$tag['name'].'</span>', '/tags/view/'.$tag['id'], array('rel'=>'tag', 'escape'=>false)); ?></li>
		<? endforeach; ?>
		</ul>
		<div class="entry box"><?= $question['Question']['content']; ?></div>
	</div>
	<? if($question['Answer']!=null)
		{
			echo '<h2>Best answer</h2>';
			echo $this->element('answer', array('answer'=>$question['Answer'][$top_rated_id]));
		}
	?>

<? if($question['Answer']!=null) echo '<h2>Answers</h2>'; ?>
		<div class="answers_list">
		<? foreach ($question['Answer'] as $answer)
				echo $this->element('answer', array('answer'=>$answer));
		?>
	</div>
<h2>Reply to <?= $this->Extras->username($question['User']['email']); ?></h2>
	<div class="answers form">
	<? if(isset($currentUser)): ?>
	<?php echo $this->Form->create('Answer', array('action'=>'add'));?>
		<fieldset>
		<legend><?php __('Answer'); ?></legend>
		<?php
			echo $this->Form->input('content', array('label'=>false));
			echo $this->Form->input('question_id', array('type'=>'text', 'hidden'=>true, 'label'=>false, 'value'=>$question['Question']['id']));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	<? else:
		echo 'You should '.$this->Html->link(__('login', true), '/users/login').' or '.$this->Html->link(__('register', true), '/users/register');
	endif; ?>
</div>
