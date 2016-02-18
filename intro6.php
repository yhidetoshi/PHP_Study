<?php

//標準入力を格納
	$line = fgets(STDIN);
	
	//スペース区切りで格納
	$char = explode(" ",$line);
	var_dump($char[0]);
	
	//string型をint型へ変換
	$num = (int)($char[1]);
	var_dump($num);

	//文字列をカウント
	$sum_char = mb_strlen($char[0],"UTF-8");
	 
	//標準入力で入力できる文字列を制限
	if($sum_char >=1 && $sum_char <= 10){

		//標準入力で指定した文字列を抽出する
		$result = substr($char[0], $num-1, 1);
		var_dump($result);

	}else{
		exit();
	}
/* 実行結果
hoge 2
o
*/
?>
