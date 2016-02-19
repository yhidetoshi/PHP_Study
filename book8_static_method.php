<?php

class Employee
{
	private static $company = 'ABC';

	public static function getCompany()
	{
		return self::$company;
	}

	public static function setCompany($value)
	{
		self::$company = $value;
	}
}

echo Employee::getCompany(), PHP_EOL;
echo Employee::setCompany('NEW_ABC');
echo Employee::getCompany(), PHP_EOL;

?>

