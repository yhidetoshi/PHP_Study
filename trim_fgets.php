while (true) {
  $line = trim(fgets(STDIN));
  if($line == 'quit'){
  	exit();	
  }
  var_dump($line);
}
