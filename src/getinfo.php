<?php
require_once("data.php");

/*
 * 1) Parse Error. Should be as: $ArrayURL = split('/', $_SERVER[REQUEST_URI]);
 * 2) Non standart name of the variable. Better use $arrayURL" or $array_url.
 * 3) Better use $_SERVER['REQUEST_URI'] instead of $_SERVER[REQUEST_URI] 
*/
$ArrayURL = split('/', $_SERVER[REQUEST_URI]));

/*
 *	1) We will not get as expected $id. $_SERVER['REQUEST_URI'] will give use "/getinfo.php/111". 
 *    In this case result of split('/', $_SERVER['REQUEST_URI']) will be as: 
 *	   [array] : {
 *			[0] => "",
 *			[1] => getinfo.php
 *			[2] => 111
 *		}
 *	To access id (111) parameter we need do: $id = $ArrayURL[2] NOT $ArrayURL[1]   
 */
$id = $ArrayURL[1];

/*
 * They are no class "dataObject" declared. 
 * Can be only choice of: 
 * 	1) propertyData 
 *  2) hdbData
 *  3) condoData  
 */
$data = new dataObj();

/*
 * 1) Assigment in codition: "if (is_object($data) = true)". Should be '==' not '='.  
 * 2) A bit better to use 'instanceof' instead of 'is_object()'.
 * 3) If case of creation of object failed need to set $status to 500 (Internal Server Error code).
 * 
 * <code>
 *  if($data instanceof dataObj) {
 *  	$status = 200;
 *  } else {
 *  	$status = 500;
 *  }
 *  http_response_code($status);
 *  </code>
 *  
 *  4) In case we have server error AT LEAST we should log event with backtrace and args.
 *  5) We can response code set more simple: http_response_code($status); (PHP 5 >= 5.4.0)   
 */
if (is_object($data) = true) $status = '200 OK';
$status_header = 'HTTP/1.1 $status';
header($status_header);

// No comment. Corrent. 
return json_encode( $data->getAll($id) );

?>