//初期情報を入力
$input = fgets(STDIN);
$input_info = explode(" ",$input);

//N人
$N = fgets(STDIN);

//人の位置をN人分入力して格納
for( $i = 0; $i < $N; $i++ )
{
	$input_point = fgets(STDIN);
	//$input_x_y_s[$i] = explode(" ",$input_point);
	$input_x_y[$i] = explode(" ",$input_point);
	//$input_x_y[$i] =(int)()
}

//範囲内かどうかの判定
for( $j = 0; $j < $N; $j++ )
{	
	//var_dump($input_x_y[$j][0]);
	//var_dump($input_x_y[$j][1]);
	
	$long[$j] = pow( ($input_x_y[$j][0] - $input_info[0]),2 ) + pow( ($input_x_y[$j][1] - $input_info[1]),2 );
	//var_dump($long[$j]);

	$inside_length[$j]  = pow($input_info[2],2);
	$outside_length[$j] = pow($input_info[3],2);

	//var_dump($inside_length[$j]);
	//var_dump($outside_length[$j]);

	if( ( $long[$j] >= $inside_length[$j] ) &&( $long[$j] <= $outside_length[$j]) )
	{
		echo "yes";
		echo(PHP_EOL);
	}else{
		echo "no";
		echo(PHP_EOL);
	}
}

/* 実行結果
47 19 57 80
3
62 -52
35 -70
-81 2
yes
no
no
*/
