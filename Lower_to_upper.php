$input = fgets(STDIN);
$max_num = mb_strlen($input, "UTF-8");
if($max_num >= 1 && $max_num <=100){
	echo strtoupper($input);
}

/* 実行結果
hide
HIDE
*/
