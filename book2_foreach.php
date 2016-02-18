<?php

$array = array(1, 2, 3, 4);
foreach ($array as $num){
	echo $num, PHP_EOL;
}

$fruits_color = array(
	'apple' => 'red',
	'banana' => 'yellow',
	'orange' => 'orange',
	);
foreach ($fruits_color as $name => $color)
{
	echo "$name is $color", PHP_EOL;
}

?>
