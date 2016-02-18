//N行指定
$N = fgets(STDIN);

//N行文回す
for( $in_l = 0; $in_l < $N; $in_l++ )
{
	$in_s_e = fgets(STDIN);
	$in_val_s[$in_l] = explode(" ",$in_s_e);
	$in_val[$in_l] = $in_val_s[$in_l];
	//var_dump($in_val[$in_l]);
}	

//標準入力の値をキャスト
//(ToDo) 調べる 配列ごとキャストしようとしたらエラーだった。配列ごとキャストする関数がありそう...
for( $in_l = 0; $in_l < $N; $in_l++ )
{
	for($i = 0; $i < 4; $i++ )
	{
		$in_val[$in_l][$i] = (int)($in_val_s[$in_l][$i]);	
	}	
}	

//max関数は配列を渡すと最大、最小の要素を返してくれるのでキャストした配列を渡す
for( $in_l = 0; $in_l < $N; $in_l++ )
{
        $max_num[$in_l] = max($in_val[$in_l]);
        $min_num[$in_l] = min($in_val[$in_l]);
}
//N行の中すべての値から大きい,小さいものを抽出
$max_most = max($max_num);
$min_most = min($min_num);


echo (int)$in_val[0][0];
echo " ";
echo (int)$in_val[$N-1][1];
echo " ";
echo $max_most;
echo " ";
echo $min_most;
echo(PHP_EOL);

/* 実行結果
//N行指定
$N = fgets(STDIN);

//N行文回す
for( $in_l = 0; $in_l < $N; $in_l++ )
{
	$in_s_e = fgets(STDIN);
	$in_val_s[$in_l] = explode(" ",$in_s_e);
	$in_val[$in_l] = $in_val_s[$in_l];
	//var_dump($in_val[$in_l]);
}	

//標準入力の値をキャスト
//(ToDo) 調べる 配列ごとキャストしようとしたらエラーだった。配列ごとキャストする関数がありそう...
for( $in_l = 0; $in_l < $N; $in_l++ )
{
	for($i = 0; $i < 4; $i++ )
	{
		$in_val[$in_l][$i] = (int)($in_val_s[$in_l][$i]);	
	}	
}	

//max関数は配列を渡すと最大、最小の要素を返してくれるのでキャストした配列を渡す
for( $in_l = 0; $in_l < $N; $in_l++ )
{
        $max_num[$in_l] = max($in_val[$in_l]);
        $min_num[$in_l] = min($in_val[$in_l]);
}
//N行の中すべての値から大きい,小さいものを抽出
$max_most = max($max_num);
$min_most = min($min_num);


echo (int)$in_val[0][0];
echo " ";
echo (int)$in_val[$N-1][1];
echo " ";
echo $max_most;
echo " ";
echo $min_most;
echo(PHP_EOL);
*/
