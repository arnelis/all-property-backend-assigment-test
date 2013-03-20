<?php

require 'src/Task1_1.php';
require_once 'src/BaseTask.php';

const HEADER = <<<EOT
Script accepts a positive integer range and for each increment in the range, prints:
	- "Fizz" if a multiple of 3
	- "Buzz" if a multiple of 5
	- The integer itself otherwise.
E.g. for [12..16], the output is: "Fizz 13 14 FizzBuzz 16".

Only range of positive integers allowed as arguments:
	a) -f <arg> > 0, -t <arg> > 0;
	b) -f <arg> < -t <arg>;

Parameters:
	-f <arg>  -  mandatory, start of the range
	-t <arg>  -  mandatory, end of the range
		  		
Usage: php runTask1_1.php -f <arg> -t arg		
EOT;

$task = new Task1_1();
if(($args = $task->validateParams(getopt("f:t:"), 'f', 't')) != false) {
	$results = $task->getResults($args[0], $args[1]);
	echo $task->getResultsAsString($results);
	exit(0);
}

echo HEADER;
?>
