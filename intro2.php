<?php 
for($i = 0; $i < 5; $i++){
$inp_num[$i] = fgets(STDIN);
	if($inp_num[$i] > 0 && $inp_num[$i] < 100 ){
		//int型にキャストしないと標準入力でstring型なので数値で最小・最大を選べない
		$inp_num_buff[$i] =(int)($inp_num[$i]);
	}
}
$num_max = max($inp_num_buff[0], $inp_num_buff[1], $inp_num_buff[2], $inp_num_buff[3], $inp_num_buff[4]);
echo $num_max;
print(PHP_EOL);

$num_min = min($inp_num_buff[0], $inp_num_buff[1], $inp_num_buff[2], $inp_num_buff[3], $inp_num_buff[4]);
echo $num_min;
print(PHP_EOL);

/* 実行結果
2
19
30
3
4
30
2
*/
?>
