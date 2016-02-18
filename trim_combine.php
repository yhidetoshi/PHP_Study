//string型
$num = fgets(STDIN);
//string型からint型に変換
$num_i = (int)($num);

//標準入力を配列として格納
for($j=0; $j<$num_i; $j++){
	$char[$j] = trim(fgets(STDIN));
}

//問題の回答に沿うように出力を加工
echo('Hello ');
for($i=0; $i<$num_i; $i++){
	echo($char[$i]);
	//文字列の最後に『 . 』にする
	if($i == ($num_i-1)){
		echo('.');
	}else{
		echo(',');
	}
}

/* 実行結果
2
hoge
huga
Hello hoge,huga.
*/
