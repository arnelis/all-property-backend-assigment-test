<?php

/*
 * Resuls as interger constants for faster processing. 
 * Constants will be replaced to textual values by 
 * BaseTask::getResultsAsString(const) method.  
 */
const R_FIZZ = -1;
const R_BUZZ = -2;
const R_BAZZ = -3;
const R_FZBZ = -4;

/**
 * Base parent class for a common functionality for all two tasks. 
 * 
 * @author Arnoldas
 *
 */
class BaseTask {
	
	/**
	 * Method will try to find and validate arguments in given
	 * assoc array. In case all two arguments are found and both 
	 * arguments are corent will return array values as 
	 * array($val_f, $val_t), otherwise will be returned a FALSE; 
	 * 
	 * @param assoc array $options
	 * @param integer $arg_f
	 * @param integer $arg_t
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
	 * Function will loop the array of and replace
	 * any accurance of constancts R_* with textutal
	 * representation and concat array values to string
	 * joined by single white space.  
	 * 
	 * @param array $results
	 * @return string
	 */
	public function getResultsAsString($results) {
		foreach ($results as $k=>$v) {			
			switch ($v) {
				case R_FIZZ:
					$results[$k] = "Fizz";
					break;
				case R_BUZZ:
					$results[$k] = "Buzz";
					break;
				case R_BAZZ:
					$results[$k] = "Bazz";
					break;
				case R_FZBZ:
					$results[$k] = "FizzBuzz";
					break;
			}
		}
		return join(" ", $results);
	}
}
