<ul>
	<?
	$list=$this->requestAction('categories/listAll');
	foreach($list as $key=>$category)
		echo '<li>'.$this->Html->link($category, '/categories/view/'.$key).'</li>';
	?>
</ul>
