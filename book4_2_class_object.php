<?php

class Employee
{
	public $name;
	//public $state = 'working_now';

	// privateなのでクラスの内部からしかアクセスできない
	private $state = 'working_now';

	// privateなプロパティを変更するメソッド 
	public function getState()
	{
		return $this->state;
	}

	// privateなプロパティを変更するメソッド
	public function setState($state)
	{
		$this->state = $state; 
	}

	public function work()
	{
		echo '書類を整理しています' , PHP_EOL;
	}
}

$yamada = new Employee();
$yamada->name = 'yamada';
$yamada->setState('休憩している');
echo $yamada->name, PHP_EOL;
echo $yamada->getState(), PHP_EOL;

?>
