<?php 

//N回テスト
$N = fgets(STDIN);

//変数1,2の初期化
$A = 0;
$B = 0;
//N行文回す
//命令と値を代入する
for( $i = 0; $i < $N; $i++ )
{
	$input = fgets(STDIN);
	$input_data[$i] = explode(" ",$input);
	$order[$i] = $input_data[$i][0];
	//var_dump($order[$i]);
	if($order[$i] == 'SET')
	{
		if($input_data[$i][1] == '1')
		{
			$A = $input_data[$i][2];
		}else{
			$B = $input_data[$i][2];
		}
	}
	
	if($order[$i] == 'ADD')
	{
		$B = $A + $input_data[$i][1];
	}
	//var_dump($order[$j]);
	if($order[$i] == 'SUB')
	{
		$B = $A - $input_data[$i][1];
	}
}	

echo rtrim($A);
echo " ";
echo $B; 
echo (PHP_EOL);

/* 実行結果
3
SET 1 -23
SUB 77
SET 1 0
0 -100
*/
?>
