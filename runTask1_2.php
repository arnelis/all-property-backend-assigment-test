<?php

require 'src/Task1_2.php';
require_once 'src/BaseTask.php';

const HEADER = <<<EOT
Script accepts a positive integer range and for each increment in the range, prints:
	- "Fizz" if a multiple of 3
	- "Buzz" if a multiple of 5
	- "Bazz" if a consecutive "Fizz Buzz" or "Buzz Fizz" found
		(only in case integer is not a multiple of 3 or 5 itself)
	- The integer itself otherwise.
		
E.g. for f[4..11], the output is: "4 Buzz Fizz Bazz 8 Fizz Buzz Bazz".

Only range of positive integers allowed as arguments:
	a) -f <arg> > 0, -t <arg> > 0;
	b) -f <arg> < -t <arg>;

Parameters:
	-f <arg>  -  mandatory, start of the range
	-t <arg>  -  mandatory, end of the range
		  		
Usage: php runTask1_2.php -f <arg> -t arg		
EOT;

$task = new Task1_2();
if(($args = $task->validateParams(getopt("f:t:"), 'f', 't')) != false) {
	$results = $task->getResults($args[0], $args[1]);
	echo $task->getResultsAsString($results);
	exit(0);
}

echo HEADER;
?>