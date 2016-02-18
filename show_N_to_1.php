$n = fgets(STDIN);
//$nはstring型なのでint型にキャストする。でないと表示が崩れる...
$n_i = (int)($n);
if($n_i >= 1 && $n_i <=100){
	while(true){
		echo $n_i;
		//var_dump($n_i);
		$n_i = $n_i- 1;
		print(PHP_EOL);
			if($n_i == 0){
				break;
			}
	}
}

/* 実行結果
4
4
3
2
1
*/
