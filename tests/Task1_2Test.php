<?php
require_once '../src/Task1_2.php';

/**
 * Task1_2 test case.
 */
class Task1_2Test extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var Task1_2
	 */
	private $Task1_2;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		$this->Task1_2 = new Task1_2();
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->Task1_2 = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Tests Task_1_2->getResults()
	 */
	public function testGetResults() {
		$results = $this->Task1_2->getResults(4, 11);
		$this->assertEquals(4, array_shift($results));
		$this->assertEquals(R_BUZZ, array_shift($results));
		$this->assertEquals(R_FIZZ, array_shift($results));
		$this->assertEquals(R_BAZZ, array_shift($results));
		$this->assertEquals(8, array_shift($results));
		$this->assertEquals(R_FIZZ, array_shift($results));
		$this->assertEquals(R_BUZZ, array_shift($results));
		$this->assertEquals(R_BAZZ, array_shift($results));
		$this->assertEquals(0, count($results));
	}
}

