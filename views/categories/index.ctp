<div class="categories index">
	<h2><?php __('Categories');?></h2>
	<ul class="push-1">
	<?php foreach ($categories as $category): ?>
		<li><?= $this->Html->link($category['Category']['name'], '/categories/view/'.$category['Category']['id']); ?></li>
	<?php endforeach; ?>
	</ul>
</div>
