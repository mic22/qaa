		<div class="answer">
			<div class="span-4 box">
				<div class="avatar"><?= $this->Gravatar->image($user[$answer['user_id']]['User']['email'], array('size'=>40)); ?></div>
				<p class="meta"><?= $this->ReadableDate->convert($answer['date_posted']); ?> by <?= $this->Html->link($this->Extras->username($user[$answer['user_id']]['User']['email']), '/users/view/'.$answer['user_id']); ?><br><? if($answer['avg_rate']!=null) { echo 'rating: '.$this->Number->precision($answer['avg_rate']+1, 2); } else { echo 'not rated yet'; } ?></p>
				
				<? if(isset($currentUser) AND ($answer['user_id']!=$currentUser['User']['id']) AND ($answer['current_user_rated']!=1)): ?>
				<div class="rating">
					What do you think? 
					<form action="/cake/qaa/ratings/add" id="RatingAddForm" method="post" accept-charset="utf-8">
						<input type="hidden" name="_method" value="POST">
						<input type="hidden" name="data[Rating][question_id]" id="RatingQuestionId" value="<?= $question['Question']['id']; ?>" />
						<input type="hidden" name="data[Rating][answer_id]" id="RatingAnswerId" value="<?= $answer['id']; ?>" />
						<select name="data[Rating][mark]" onchange="this.form.submit()" id="RatingMark">
							<option value=""></option>
							<option value="0">waste of time</option>
							<option value="1">not interesting</option>
							<option value="2">quite good</option>
							<option value="3">helpfull</option>
							<option value="4">bingo!</option>
						</select>
					</form>
				</div>
				<? endif; ?>
				
			</div>
			<div class="span-13 last higlighted">
				<p class="entry"><?= $answer['content']; ?></p>
			</div>
		</div>
		<br style="clear: both">
