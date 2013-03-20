<?php

require_once 'BaseTask.php';

/**
 * 
 * @author Arnoldas
 *
 */
class Task1_1 extends BaseTask {
	
	/**
	 * Requiriments: 
	 * 
	 *  $f > 0
	 *  $t > 0
	 *  $f < $t
	 *  
	 *  for each increment in the range [t, f], prints:
	 *  - "Fizz" if a multiple of 3
	 *  - "Buzz" if a multiple of 5
	 *  - The integer itself otherwise.
	 *  E.g. for f[12..16], the output is: "Fizz 13 14 FizzBuzz 16".
	 *  
	 *  Attention: method will no do a validation of arguments.
	 *  
	 * @param unknown $f
	 * @param unknown $t
	 * @return multitype:string
	 */
	public function getResults($f, $t) {
		$results = array();
		for($i = $f, $j=0; $i <= $t; $i++, $j++) {
			$result = $i;
			if (($i % 3) == 0) {
				$result = R_FIZZ;
			}
			if (($i % 5) == 0) {
				if ($result == R_FIZZ) {
					$result = R_FZBZ;
				} else {
					$result = R_BUZZ;
				}
			}
			$results[$j] = (string)$result;
		}
		return $results;
	}
}
?>