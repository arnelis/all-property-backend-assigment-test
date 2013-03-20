<?php

/*
 * GENERAL ISSUES:
 * 
 * 1) Classes usualy are named like: "SomeClass" and not like "someClass".
 * 2) Variables of the Class usualy are "someVariable" and not like "somevariable".
 * 3) Mutch better to keep each class in a separate file. Class 'SomeClass' better 
 *    to be saved as SomeClass.php. In most more advanced OOP langauges it's mandatory. 
 */

class baseObj {
	/*
	 * Better use name as $db or $connection but not as $mysql
	 */
	public $mysql = null;
	private $table = null;

	public function __construct ()
	{
		/*
		 * Hardcoded parameters for connection. This is not the best way of doing. Better connection 
		 * arguments keep in separate file like $config.php. It will be more easy to find and change.
		 */
		$this->mysql = new mysqli("localhost", "user", "password", "database");
		if ($this->mysql->connect_errno) {
			/**
			 * Here must be an Exception thrown, not an "echo". Also we should log a problem (or even send msg to admin). 
			 * Controller (getinfo.php) should catch exception and return to client HTTP 500 error code. We need somehow
			 * ASAP administrator about problems with connection to database.
			 */
			echo "Failed to connect to MySQL: (" . $this->mysql->connect_errno . ") " . $this->mysql->connect_error;
		}
	}

	public function get ($id, $field)
	{
		/*
		 * 1) UHHH.... SQL Injection attack can be made here. Not good. We should allow to
		 * pass to SQL query unescaped argumets. We must have line of defence. At least 
		 * mysql_escape() for $table and $id.
		 * 2) We need to check did our query succeeded. 
		 * In case of some error we should throw and exeption. This exeption should be
		 * processed on getInfo.php and depending on cause should return 500 (Internal Server Error) 
		 * or HTTP 400 (Bad Request) HTTP response code.
		 * 3) No fetching of the result row. Missing fetch_assoc() call.
		 * 4) Missing $table parameter's declaration for function:
		 *  <code>
		 *  	public function get($table, $field, $id) {...}
		 *  </code>
		 *  $table parameter will be undefined in the line bellow.
		 */
		return $this->mysql->query("SELECT $field FROM $table WHERE ID = $id");
	}

	public function getAll ($id)
	{
		/*
		 * 1) UHHH.... SQL Injection attack can be made here. Not good. We should allow to
		 * pass to SQL query unescaped argumets. We must have line of defence. At least 
		 * mysql_escape() for $table and $id.
		 * 2) We need to check did our query succeeded. 
		 *  In case of some error we should throw and exeption. This exeption should be
		 *  processed on getInfo.php and depending on cause should return 500 (Internal Server Error) 
		 *  or HTTP 400 (Bad Request) HTTP response code.
		 *  4) Missing $table parameter's declaration for function:
		 *  <code>
		 *  	public function get($table, $id) {...}
		 *  </code>
		 *  $table parameter will be undefined in the line bellow. 
		 */
		$res = $this->mysql->query("SELECT * FROM $table WHERE ID = $id");
		return $res->fetch_assoc();
	}
}

class propertyData extends baseObj {
	
	/*
	 * I don't think we need any of this variables. 
	 * All methods above should just returning a requested column.  
	 */
	public $id = null;
	public $type = null;
	public $title = null;
	public $address = null;
	public $bedroom = null;
	public $livingroom = null;
	public $diningroom = null;
	protected $hdbblock = null;
	private $swimmingPool = null;

	/*
	 * Not in use. Idea is good but not used by get*() methods bellow 
	 * due lack of support in the baseObj::get(...) method
	 */
	private $table = 'Property';
	
	/*
	 * This class (yet) do not have any code to use any of declared variables. In this case 
	 * we no need to assign returned values from $this->get( $ID, 'someColumn') to variable.
	 * We can do everything more simple:
	 * 
	 * <code>
	 * 	public function getSomeColumn($ID) {
	 * 		return $this->get( $ID, 'someColumn');
	 * }
	 * </code>
	 */

	public function getType ($ID) { $Type = $this->get( $ID, 'Type'); return $Type; }
	// Typing error: should be return $Title not return $Type
	public function getTitle ($ID) { $Title = $this->get( $ID, 'Title') ; return $Type;}
	public function getAddress ($ID) { $Address = $this->get( $ID, 'Address') ; return $Address;}
	public function getBedroom ($ID) { $Bedroom = $this->get( $ID, 'Bedroom') ; return $Bedroom;}
	public function getLivingroom ($ID) { $livingroom = $this->get( $ID, 'Living_room') ; return $livingroom;}
	public function getDiningroom ($ID) { $diningroom = $this->get( $ID, 'Diningroom') ; return $diningroom;}
}

class hdbData extends propertyData {
	
	/*
	 * Not in use. Idea is good but not used by get*() methods bellow
	* due lack of support in the baseObj::get(...) method
	*/
	private $table = 'HDB';
	
	/*
	 * This class (yet) do not have any code to use any of declared variables. In this case 
	 * we no need to assign returned values from $this->get( $ID, 'someColumn') to variable.
	 * We can do everything more simple:
	 * 
	 * <code>
	 * 	public function getSomeColumn($ID) {
	 * 		return $this->get( $ID, 'someColumn');
	 * }
	 * </code>
	 */
	
	public function getHDBBlock ($ID) { $this->hdbblock = $this->get($ID, 'HDBBlock'); return $this->hdbblock; }
}

class condoData extends propertyData {
	/*
	 * Not in use. Idea is good but not used by get*() methods bellow
	 * due lack of support in the baseObj::get(...) method
	*/
	private $table = 'ConDO';
	
    /*
	 * This class (yet) do not have any code to use any of declared variables. In this case 
	 * we no need to assign returned values from $this->get( $ID, 'someColumn') to variable.
	 * We can do everything more simple:
	 * 
	 * <code>
	 * 	public function getSomeColumn($ID) {
	 * 		return $this->get( $ID, 'someColumn');
	 * }
	 * </code>
	 */
	
	public function gotSwimmingPool ($ID)
	{
		return $this->get($ID, 'SwimmingPool');
	}
}

?>