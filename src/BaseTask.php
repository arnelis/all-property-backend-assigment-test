<?php

const R_FIZZ = -1;
const R_BUZZ = -2;
const R_BAZZ = -3;
const R_FZBZ = -4;

class BaseTask {
	
	/**
	 * 
	 * @param unknown $options
	 * @param unknown $arg_f
	 * @param unknown $arg_t
	 * @throws Exception
	 * @return multitype:string
	 */
	public function validateParams($options, $arg_f, $arg_t) {
	
		$range_from = null;
		$range_to = null;
		
		// parsing short options
		foreach ($options as $k=>$v) {
			switch($k) {
				case $arg_f:
					$range_from = $v;
					break;
				case $arg_t:
					$range_to = $v;
					break;
			}
		}
	
		/**
		 * validation:
		 * 1) to, from required
		 * 2) only interger numbers
		 * 3) only positive numbers
		 * 4) start number < end number
		 */
		if(($range_from != null) && ($range_to != null)) {
			$range_from = trim($range_from);
			$range_to = trim($range_to);
			if((preg_match('/^\d+$/', $range_from)) &&
			(preg_match('/^\d+$/', $range_to))) {
				if(($range_from > 0) && ($range_to > 0)) {
					if($range_from < $range_to) {
						$range_from = (int) $range_from;
						$range_to = (int) $range_to;
						return array($range_from, $range_to);
					}
				}
			}
		}
	
		return false;
	}
	
	/**
	 * 
	 * @param array $results
	 * @return string
	 */
	public function getResultsAsString($results) {
		$return = "";
		foreach ($results as $result) {
			switch ($result) {
				case R_FIZZ:
					$result = "Fizz";
					break;
				case R_BUZZ:
					$result = "Buzz";
					break;
				case R_BAZZ:
					$result = "Bazz";
					break;
				case R_FZBZ:
					$result = "FizzBuzz";
					break;
			}
			$return .=  $result . " ";
		}
		return rtrim($return);
	}
}
