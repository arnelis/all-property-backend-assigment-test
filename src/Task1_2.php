<?php

require_once '../../src/BaseTask.php';

/**
 * 
 * @author Arnoldas
 *
 */
class Task1_2 extends BaseTask {
	
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
	 *  - "Bazz" if a consecutive "Fizz Buzz" or "Buzz Fizz" found
	 *     (only in case integer is not a multiple of 3 or 5 itself)
	 *  - The integer itself otherwise.
	 *  E.g. for f[4..11], the output is: "4 Buzz Fizz Bazz 8 Fizz Buzz Bazz".
	 *  
	 *  Attention: method will no do a validation of arguments.
	 *  
	 * @param unknown $f
	 * @param unknown $t
	 * @return multitype:string
	 */
	public function getResults($f, $t) {
		$results = array();
		$st = array(null, null);
		for ($i = $f, $j = 1; $i <= $t; $i++, $j++) {
			$result = $i;
			$stv = null;
			
			if(($i % 3) == 0) {
				$result = R_FIZZ;
			}
			
			if(($i % 5) == 0) {
				$result = ($result == R_FIZZ) ? R_FZBZ : R_BUZZ;
			}
				
			if((($j > 2) && ($result == $i))  &&
				((($st[0] == R_FIZZ) && ($st[1] == R_BUZZ)) ||
				 (($st[0] == R_BUZZ) && ($st[1] == R_FIZZ)))) {
				$result = R_BAZZ;
			}
			
			if(($result == R_FIZZ) || ($result == R_BUZZ)) {
				$stv = $result;
			}
			
			if($j % 2 == 0) {
				$st[1] = $stv;
			} else {
				$st[0] = $stv;
			}
			
			$results[$j-1] = (string)$result;
		}
		return $results;
	}
}
?>