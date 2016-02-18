// 変数のメモ
// $input_whn     : 横幅,縦幅,移動回数
// $input_dir_val : 移動方向とその値
// $current_x_y   : 現在(移動前)の座標(初期座標を含む)
// $after_x_y     : 端を超えたかどうかを判定する用の一時的なx,y座標

// w h nの値を与える
$input_w_h_n = fgets( STDIN );
$input_whn   = explode(" ",$input_w_h_n);

//初期座標を与える
$input_x_y   = fgets(STDIN);
$current_x_y = explode(" ",$input_x_y);

for( $i = 0; $i < $input_whn[2]; $i++ ){
	//Up Down Right Leftと移動値を入力
	$input 			   = fgets(STDIN);
	$input_dir_val[$i] = explode(" ",$input);
}


// Up
function move_right( $after_x_y ,$input_whn, $input_dir_val_, $current_x_y ) {
	//右端から出ない場合
	if( $after_x_y[0] < $input_whn[0] ){
		$current_x_y[0] = $after_x_y[0];
	}
	//右端から出た場合
	if( $after_x_y[0] >= $input_whn[0] ){
		$current_x_y[0] = abs( $input_whn[0] - ( $current_x_y[0] + $input_dir_val_ ) );
	}
		return $current_x_y[0];
}

function move_left( $after_x_y, $input_whn, $input_dir_val_, $current_x_y ){
	//左端から出ない場合
	if( $after_x_y[0] >= 0 ){
		$current_x_y[0] = $after_x_y[0];
	}
	//左端から出た場合
	if( $after_x_y[0] < 0 ){
		$current_x_y[0] = $input_whn[0] - abs( $current_x_y[0] - $input_dir_val_ );
	}
		return $current_x_y[0];
}

function move_up( $after_x_y, $input_whn, $input_dir_val_, $current_x_y ){
	//上端から出ない場合
	if($after_x_y[1] < $input_whn[1]){
		$current_x_y[1] = $after_x_y[1];
	}
	//上端から出た場合
	if( $after_x_y[1] >= $input_whn[1] ){
		$current_x_y[1] = abs( $input_whn[1] - ($current_x_y[1] + $input_dir_val_ ) );
	}
		return $current_x_y[1];
}

function move_down( $after_x_y, $input_whn, $input_dir_val_, $current_x_y ){
	//下端から出ない場合
	if( $after_x_y[1] >= 0 ){
		$current_x_y[1] = $after_x_y[1];
	}
	//下端から出た場合
	if( $after_x_y[1] < 0 ){
		$current_x_y[1] = $input_whn[1] - abs( $current_x_y[1] - $input_dir_val_ );
	}
		return $current_x_y[1];
}


//初期座標から移動させていく
for( $j = 0; $j < $input_whn[2]; $j++ ){

	//Rightへ移動
	if( $input_dir_val[$j][0] == 'R' ){
		$after_x_y[0]   = $current_x_y[0] + $input_dir_val[$j][1];
		$input_dir_val_ = $input_dir_val[$j][1];
		$current_x_y[0] = move_right( $after_x_y, $input_whn, $input_dir_val_, $current_x_y );
	}

	//Leftへ移動
	if( $input_dir_val[$j][0] == 'L' ){
		$after_x_y[0]   = $current_x_y[0] - $input_dir_val[$j][1];
		$input_dir_val_ = $input_dir_val[$j][1];
		$current_x_y[0] = move_left( $after_x_y, $input_whn, $input_dir_val_, $current_x_y );
	}


	//UPへ移動
	if( $input_dir_val[$j][0] == 'U' ){
		$after_x_y[1]   = $current_x_y[1] + $input_dir_val[$j][1];
		$input_dir_val_ = $input_dir_val[$j][1];
		$current_x_y[1] = move_up($after_x_y, $input_whn, $input_dir_val_, $current_x_y);
	}

	//Downへ移動
	if( $input_dir_val[$j][0] == 'D' ){
		$after_x_y[1]   = $current_x_y[1] - $input_dir_val[$j][1];
		$input_dir_val_ = $input_dir_val[$j][1];
		$current_x_y[1] = move_down( $after_x_y, $input_whn, $input_dir_val_, $current_x_y );
	}
}

echo trim( $current_x_y[0] );
echo " ";
echo trim( $current_x_y[1] );
echo ( PHP_EOL );

/* 実行結果
4 3 2
1 1
R 3
D 2
0 2
*/
