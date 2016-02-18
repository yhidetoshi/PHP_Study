<?php 

//当選番号の入力
$num_atari_s = fgets(STDIN);
$front = $num_atari_s - 1;
$back = $num_atari_s + 1;

//下4桁を取り出す
$num_yonketa = substr($num_atari_s, 2, 4);

//下4桁を取り出す
$num_sanketa = substr($num_atari_s, 3, 4);
$num_atari = (int)$num_atari_s;

//N回くじを引く
$N = fgets(STDIN);

for($i = 0; $i < $N; $i++)
{
	$num_input_s[$i] = fgets(STDIN);
	//2等 3等判定のために下3,4桁を抽出
	$num_yonketa_input[$i] = substr($num_input_s[$i], 2, 4);
	$num_sanketa_input[$i] = substr($num_input_s[$i], 3, 4);
	$num_input[$i] = (int)$num_input_s[$i];
}

for($j = 0; $j < $N; $j++)
{
	// 1等
	if($num_atari == $num_input[$j])
	{
		echo "first";
		echo(PHP_EOL);
	}
	// 2等
	else if($num_yonketa == $num_yonketa_input[$j])
	{
		echo "second";
		echo(PHP_EOL);	
	}

	//3等
	else if($num_sanketa == $num_sanketa_input[$j])
	{
		echo "third";
		echo(PHP_EOL);	
	}	

	//前後賞
	else if($front == $num_input[$j] || $back == $num_input[$j])
	{
		//var_dump($num_atari);
		echo "adjacent";
		echo(PHP_EOL);
	}

	//ハズレ
	else
	{
		echo "blank";
		echo(PHP_EOL);	
	}
}

/* 実行結果
142358
3
195283
167358
142359
blank
third
adjacent
*/
?>
