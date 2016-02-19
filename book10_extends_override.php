<?php

class Employee
{
	
	const PART    = 'Part';
	const REGULAR = 'Regular';
	const CONTRACT= 'Contract';
	
	public $salary = 20;

	
	public function __construct($name, $type)
	{
		$this->name = $name;
		$this->type = $type;
	}
	
	public function getSalary()
	{
		return $this->salary;
	}
}

class Programmer extends Employee
{
	
	public function __construct($name, $type)
	{
		// parent: 親クラス(Employeeクラスのコンストラクタが呼び出される)
		parent::__construct($name, $type);
	}
	
	public function getSalary()
	{
		return $this->salary * 2;
	}
}

//$obj1 = new Programmer('YAMADA', 'REGULAR');
$obj2 = new Programmer();
//$obj2->getSalary();
//echo $obj2->getSalary();
var_dump($obj2);

?>
