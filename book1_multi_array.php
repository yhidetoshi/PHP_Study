//多次元配列
$fruits = array(
	'apple' => array(
		'price' => 100,
		'count' => 2,
		),
	'banana' => array(
		'price' => 90,
		'count' => 5,
		),
	'orange' => array(
		'price' => 90,
		'count' => 3,
		),
);
foreach ($fruits as $name => $value)
{
	echo "$name, {$value['price']}, {$value['count']}", PHP_EOL;
}

/* 実行結果
apple, 100, 2
banana, 90, 5
orange, 90, 3
*/
?>
