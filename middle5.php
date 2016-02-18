<?php

// ループで使う変数メモ
// [立候補者のカウンター用]
// $num_r1 
// $num_r2
// $num_r3
// $num_r4

// [演説者のカウンター用]
// $num_en1
// $num_en2

//立候補者,有権者,演説回数を入力
$input = fgets( STDIN );
$input_m_n_k = explode(" ",$input );

// 立候補者に対する有権者の数を格納しないといけない
// yuken[演説回数 1 回目][0] : 有権者 A
// yuken[演説回数 2 回目][1] : 有権者 B
// yuken[演説回数 N 回目][n] : 有権者 N

// yuken_rem : 無所属の残りの有権者
$yuken_rem = $input_m_n_k[1];

// yuken[演説回数N回目][0] : 1人目 A
// yuken[演説回数N回目][1] : 2人目 B
for( $num_r1 = 0; $num_r1 < $input_m_n_k[0]; $num_r1 ++ )
{
		$yuken[$num_r1] = 0;
}

// 演説する立候補者をまずは格納 演説者の番号は1から始まるので -1 する
for( $num_en1 = 0; $num_en1 < $input_m_n_k[2]; $num_en1 ++ )
{
	$who_num[$num_en1] = fgets(STDIN) - 1;
}

//演説回数分を回す
for( $num_en2 = 0; $num_en2 < $input_m_n_k[2]; $num_en2 ++ )
{	
	//全立候補者分を回す
	for( $num_r2 = 0; $num_r2 < $input_m_n_k[0]; $num_r2 ++)
	{
		if( $who_num[$num_en2] == $num_r2 )
		{
			// 無所属の有権者が1人以上だった場合
			if( $yuken_rem > 0)
			{	
				// 無所属の有権者を演説者に一人所属させる 
				$yuken[$num_r2] = $yuken[$num_r2] + 1;
				
				// 無所属の有権者を1人減らす
				$yuken_rem = $yuken_rem - 1;
			}
		
			// 演説者以外の演説者に所属している有権者の存在を調べる
			// 存在していれば一人ずつ今、演説した者の所属にする
			for( $num_r3 = 0; $num_r3 < $input_m_n_k[0]; $num_r3 ++)
			{
				// 今回の演説者以外で演説者を支持している有権者がいるか確認
				if( ($num_r3 != $num_r2 ) && ($yuken[$num_r3] > 0 ) )
				{
					// 演説者以外の演説者に所属している有権者を演説者の所属に変える
					// まず既所属の有権者を一人減らす 
					$yuken[$num_r3] = $yuken[$num_r3] - 1;
					$yuken[$num_r2] = $yuken[$num_r2] + 1;
				}
			}		
		}
	}
}

// 一番有権者が多い人数を求める
$max_num = max($yuken);

//全立候補者分を回す
for( $num_r4 = 0; $num_r4 < $input_m_n_k[0]; $num_r4 ++ )
{
	// 立候補者1人ずつに有権者の所属が一番多いのが誰かを探す
	if($max_num == $yuken[$num_r4])
	{
		// 立候補者番号は1番から始まるので +1 する
		echo $num_r4 + 1;
		echo (PHP_EOL);
	}
}

/* 実行結果
2 100 4
2
2
2
1
1
2
*/
?>
