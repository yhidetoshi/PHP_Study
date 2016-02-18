<?php 
while (true) {
  $line = trim(fgets(STDIN));
  if($line == 'quit'){
  	exit();	
  }
  var_dump($line);
}

/* 実行結果
hoge
string(4) "hoge"
huga
string(4) "huga"
quit
*/
?>
