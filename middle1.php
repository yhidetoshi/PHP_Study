//N枚入力
$N = fgets(STDIN);

for( $i = 0; $i < $N; $i++ ){
	//カード入力
	$input = fgets(STDIN);
	$input_card_s[$i] = str_split($input);
}

//キャスト
for( $a = 0; $a < $N; $a++ ){
	for( $b = 0; $b < 16; $b++ ){
		$input_card[$a][$b] = (int)($input_card_s[$a][$b]);
	}
}

for( $j = 0; $j < $N; $j++ ){	
	//カード毎に合計をリセット
	$even_sum[$j] = 0;
	$odd_sum[$j] = 0;
	
	for( $k = 0; $k < 16; $k++ ){
		//偶数の和を求める
		if( $k % 2 == 0 ){
			
			//var_dump($input_card[$j][$k]);
			//カード番号の1〜4までの値は普通に足し算
			if( ($input_card[$j][$k] <= 0 ) && ($input_card[$j][$k] <= 4 )){
				$even_sum[$j] += ($input_card[$j][$k])*2;
			}
			//*2した時に10以上になった場合の処理
			if($input_card[$j][$k] == 5){
				$even_sum[$j] += 1;
			}
			if($input_card[$j][$k] == 6){
				$even_sum[$j] += 3;	
			}
			if($input_card[$j][$k] == 7){
				$even_sum[$j] += 5;	
			}
			if($input_card[$j][$k] == 8){
				$even_sum[$j] += 7;
			}
			if($input_card[$j][$k] == 9){
				$even_sum[$j] += 9;	
			}
		}
		//奇数の和を求める
		if( $k % 2 != 0){
			$odd_sum[$j] += $input_card[$j][$k];
		}
	}
}

//N枚分のXを求める
for( $m = 0; $m < $N; $m++ ){

	//Xに1〜9を代入して10で割り切れる数を求める
	for( $l = 0; $l < 10; $l++ ){

		if( ($even_sum[$m] + $odd_sum[$m] + $l) % 10 == 0 ){
			echo $l;
			echo (PHP_EOL);
		}
	}
}

/* 実行結果
5
091180422478189X
774123801013511X
973736969204716X
793180803472918X
358682935182058X
1
4
0
1
2
*/
