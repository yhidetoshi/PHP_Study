<?php 

//イベント回数と人数を入力
$input = fgets(STDIN);
$input_N_M = explode(" ",$input);
//収益の合計
$profit_sum = 0;

//ライブの結果を格納
for( $i = 0; $i < $input_N_M[1]; $i++ )
{
	$input_profit = fgets(STDIN);
	$input_data_s[$i] = explode(" ",$input_profit);

}

//string型からint型へキャストする
for( $a = 0; $a < $input_N_M[1]; $a++ )
{
	for( $b = 0; $b < $input_N_M[0]; $b++)
	{
		$input_data[$a][$b] = (int)($input_data_s[$a][$b]);
	}
}

//黒字の収益を計算して何回ライブを開催するか計算
for( $j = 0; $j < $input_N_M[1]; $j++ )
{
	$every_result_sum[$j] = 0;

	for( $k = 0; $k < $input_N_M[0]; $k++)
	{
		//var_dump($input_data[$j][$k]);
		$every_result_sum[$j] += $input_data[$j][$k];		
	}
	//var_dump($every_result_sum[$j]);
	if($every_result_sum[$j] > 0)
	{
		$profit_sum += $every_result_sum[$j];
	}

}

echo $profit_sum;
echo (PHP_EOL);

/* 実行結果
4 7
12 0 -19 -12
-7 -5 7 -17
7 -17 -10 10
-17 -4 -6 -12
-4 -9 -7 8
2 -15 -7 -7
0 -15 1 10
0
*/
?>
