<?php
require_once '../src/Task1_1.php';

/**
 * Task1_1 test case.
 */
class Task1_1Test extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var Task1_1
	 */
	private $Task1_1;
	
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		$this->Task1_1 = new Task1_1();
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->Task1_1 = null;
		parent::tearDown ();
	}
	
	/**
	 * Tests Task1_1->getResults()
	 */
	public function testGetResults() {
		$results = $this->Task1_1->getResults(12, 16);
		$this->assertEquals(R_FIZZ, array_shift($results));
		$this->assertEquals(13, array_shift($results));
		$this->assertEquals(14, array_shift($results));
		$this->assertEquals(R_FZBZ, array_shift($results));
		$this->assertEquals(16, array_shift($results));
		$this->assertEquals(0, count($results));
	}
}

