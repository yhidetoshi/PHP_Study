$header = trim(fgets(STDIN));
$footer = trim(fgets(STDIN));

echo $header.'@'.$footer;

/* 実行結果
hoge
huga
hoge@huga
*/
