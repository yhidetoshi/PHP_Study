<?php

class Employee
{
	public $name;
	public $state = 'working_now';

	// privateなのでクラスの内部からしかアクセスできない
	// private $state = 'working_now';

	public function work()
	{
		echo '書類を整理しています' , PHP_EOL;
	}
}

$yamada = new Employee();
$yamada->name = 'yamada';
echo $yamada->name, PHP_EOL;
echo $yamada->state, PHP_EOL;
$yamada->work();

?>
