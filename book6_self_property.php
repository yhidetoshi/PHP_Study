<?php
class Employee
{
	public static $company = 'ABC';

	public function getCompany()
	{
		return self::$company;
	}
}
/*
$yamada = new Employee();
echo $yamada->getCompany(), PHP_EOL;
*/
echo Employee::$company, PHP_EOL;
?>
