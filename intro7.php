<?php 
$input = fgets(STDIN);
$max_num = mb_strlen($input, "UTF-8");
//標準入力の文字制限は1文字以上、100文字以内
if($max_num >=1 && $max_num<=100){

	echo mb_substr_count($input, "A");
	print(PHP_EOL);
}

/* 実行結果
HATENA
2
*/
?>
