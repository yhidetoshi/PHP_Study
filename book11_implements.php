<?php
interface Reader
{
	public function read();
}

interface Writer;
{
	public function write($value);
}

class Configure implements Reader, Writer
{
	public function write($value)
	{
		// write processing
	}
	public function read()
	{
		// read processing
	}
}
?>
