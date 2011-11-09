<div class="question push-1">
	<h3><?= $this->Html->link($question['Question']['title'], '/questions/view/'.$question['Question']['id']); ?></h3>
	<ul>
		<li><? if($answers_count!=0) echo $answers_count; else echo 'No'; ?> answers so far, <?= $this->Html->link('add one!', '/questions/view/'.$question['Question']['id']); ?></li>
		<li>Asked <?= $this->ReadableDate->convert($question['Question']['date_posted']); ?> by <?= $this->Html->link($this->Extras->username($question['User']['email']), '/users/view/'.$question['Question']['user_id']); ?> in <?= $question['Category']['name']; ?></li>
	</ul>
</div>
