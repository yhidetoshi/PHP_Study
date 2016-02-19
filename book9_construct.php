<?php

class Employee
{
	const PART    = 'Part';
	const REGULAR = 'Regular';
	const CONTRACT= 'Contract';

	private $name;
	private $type;

	public function __construct($name, $type)
	{
		$this->name = $name;
		$this->type = $type;
	}
}
$yamada = new Employee('Yamada', 'Employee::REGULAR');
var_dump($yamada);

?>
