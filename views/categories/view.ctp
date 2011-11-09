<div class="categories view">
	<h2><?= __('Category', true).': '.$category['Category']['name']; ?></h2>
</div>
<div class="related">
	<?
		if(!empty($category['Question']))
		{
	?>
		<h3><? __('Related Questions'); ?></h3>
	<?
			$i=0;
			foreach ($category['Question'] as $question)
			{
				echo $this->element('question_on_list', array('question'=>$question, 'answers_count'=>$answers_count[$i++]));
				echo '<hr>';
			}
		}
		else
		{
	?>
		<h3><? __('No related Questions yet'); ?></h3>	
	<?
		}
	?>
</div>
