<?php 
//変換される対象の文字列
$input_stinrg = fgets(STDIN);

//変更対象の文字
$patterns = array();
$patterns[0] = '/A/';
$patterns[1] = '/E/';
$patterns[2] = '/G/';
$patterns[3] = '/I/';
$patterns[4] = '/O/';
$patterns[5] = '/S/';
$patterns[6] = '/Z/';

//変更後の文字
$replacements = array();
$replacements[6] = '4';
$replacements[5] = '3';
$replacements[4] = '6';
$replacements[3] = '1';
$replacements[2] = '0';
$replacements[1] = '5';
$replacements[0] = '2';

echo preg_replace($patterns, $replacements, $input_stinrg);

/* 実行結果
HERO
H3R0
*/
?>
