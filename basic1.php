<?php

//a,b,Rの入力がスペース区切りなので下記で処理
$in_a_b_R_i =fgets(STDIN);
$in_a_b_R = explode(" ",$in_a_b_R_i);

//a,b,Rを取り出して(string型からint型へ変換して)格納
$in_a = (int)$in_a_b_R[0];
$in_b = (int)$in_a_b_R[1];
$in_R = (int)$in_a_b_R[2];

//Nを入力
$in_N =  (int)fgets(STDIN);

//x,yをN回入力するのでN回でループさせながら格納
for($i = 0; $i < $in_N; $i++){
		
	$in_x_y_i = fgets(STDIN);
	$in_x_y[$i] = explode(" ",($in_x_y_i));

	$in_x[$i] = (int)$in_x_y[$i][0];
	$in_y[$i] = (int)$in_x_y[$i][1];
}

//数式に各パラメータを代入して判定させる
for($i = 0; $i < $in_N; $i++){

	if( pow(($in_x[$i] - $in_a), 2) + pow(($in_y[$i] - $in_b), 2) >= pow($in_R, 2)){
		echo "silent";
		echo(PHP_EOL);

	}else{
		echo "noisy";
		echo(PHP_EOL);
	}
}

/* 実行結果
20 10 10
3
25 10
20 15
70 70
noisy
noisy
silent
*/

?>
