#!/usr/bin/php5
<?php
foreach (explode("\n", `ls 32x32`) as $f)
{
	$class=explode('.', $f);
	echo '.action.a_'.$class[0].'			{ background-image: url("images/big/'.trim($f).'"); }'."\n";
}

?>
