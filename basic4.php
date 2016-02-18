//親カード入力
$num_oya_input = fgets(STDIN);

///スペース区切りで配列に格納
$num_oya_s = explode(" ",$num_oya_input);

//string型をint型に変換
$num_oya[0] = (int)$num_oya_s[0];
$num_oya[1] = (int)$num_oya_s[1];

// 何行実施するかのNを入力（勝負する回数）
$N = fgets(STDIN);

// 子のカードをスペース区切りでN行分入力して格納
for($i = 0; $i < $N; $i++)
{
	$num_ko_input = fgets(STDIN);
	$num_ko_s[$i] = explode(" ",$num_ko_input);

	//string型をint型へ変換
	$num_ko[$i][0] = (int)$num_ko_s[$i][0];
	$num_ko[$i][1] = (int)$num_ko_s[$i][1];
}
	
//  High Lowの判定処理
for($j = 0; $j < $N; $j++ )
{
	//1枚目で判定できる場合
	if( $num_oya[0] > $num_ko[$j][0])
	{
		echo "High";
		echo(PHP_EOL);
	}
	
	if( $num_oya[0] < $num_ko[$j][0])
	{
		//var_dump($num_oya[0]);
		//var_dump($num_ko[$j][0]);
		echo "Low";
		echo(PHP_EOL);
	}
	
	//1枚目が引き分けで2枚目で勝負する場合
	if($num_oya[0] == $num_ko[$j][0])
	{
		//var_dump($num_oya[0]);
		//var_dump($num_ko[$j][0]);

		if($num_oya[1] < $num_ko[$j][1])
		{
			echo "High";
			echo(PHP_EOL);
		//}else{
		}
		if($num_oya[1] > $num_ko[$j][1])
		{	
			echo "Low";
			echo(PHP_EOL);
		}

	}
}

/* 実行結果
5 1
2
7 2
1 4
Low
High
*/
