<?php 

// カード4枚を入力
$input = fgets(STDIN);

for($i = 0; $i < strlen($input); $i++)
{
    $input_card = str_split($input);
}

// カードの1枚目〜4枚目
/*
    echo $input_card[0];
    echo $input_card[1];
    echo $input_card[2];
    echo $input_card[3];
*/

$num_total = 0;

for( $j = 0; $j < 4; $j ++ )
{
        // 1枚目とその他を比較
        if( ( $input_card[0] == $input_card[$j] ) && ( $j !=0 ) )
        {
            $num_total = $num_total + 1;
        }

        // 2枚目とその他を比較
        if( ($input_card[1] == $input_card[$j] ) && ( $j !=1 ) )
        {
            $num_total = $num_total + 1;
        }

        // 3枚目とその他を比較
        if( ($input_card[2] == $input_card[$j] ) && ( $j !=2 ) )
        {
            $num_total = $num_total + 1;
        }

        // 4枚目とその他を比較
        if( ($input_card[3] == $input_card[$j] ) && ( $j !=3 ) )
        {
            $num_total = $num_total + 1;
        }
}
// *カードがない場合の出力
//echo $num_total;
switch ($num_total)
{
    case 0:
        echo "NoPair";
        echo (PHP_EOL);
        break;

    case 2:
        echo "OnePair";
        echo (PHP_EOL);
        break;

    case 4:
        echo "TwoPair";
        echo (PHP_EOL);
        break;

    case 6:
        echo "ThreeCard";
        echo (PHP_EOL);
        break;

    case 12:
        echo "FourCard";
        echo (PHP_EOL);
        break;

    default:
        break;
}

/* 実行結果
AAAA
FourCard

ABBC
OnePair
*/
?>
