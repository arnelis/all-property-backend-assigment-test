<?php
require_once '../src/BaseTask.php';

/**
 *  BaseTask test case.
 */
class BaseTaskTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var BaseTask
	 */
	private $BaseTask;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		$this->BaseTask = new BaseTask();
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->BaseTask = null;		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/*
	 * Testing TaskUtils->validateParams()
	 */
	
	public function testValidateParams_CorrectRange() {
		$rez = $this->BaseTask->validateParams(array('f' => 1, 't' => 10), 'f', 't', '');
		$this->assertEquals($rez[0], 1);
		$this->assertEquals($rez[1], 10);		
	}
	
	public function testParseRangeArgs_PositiveFlipRange() {
		$this->assertFalse($this->BaseTask->validateParams(array('f' => 10, 't' => 1), 'f', 't', ''));
	}
	
	public function testParseRangeArgs_NegativeStartRange() {
		$this->assertFalse($this->BaseTask->validateParams(array('f' => -1, 't' => 10), 'f', 't', ''));
	}
	
	public function testParseRangeArgs_ZeroStartRange() {
		$this->assertFalse($this->BaseTask->validateParams(array('f' => 0, 't' => 10), 'f', 't', ''));
	}
	
	public function testParseRangeArgs_NegativeRange() {
		$this->assertFalse($this->BaseTask->validateParams(array('f' => -5, 't' => -10), 'f', 't', ''));
	}
	
	public function testParseRangeArgs_NegativeFlipRange() {
		$this->assertFalse($this->BaseTask->validateParams(array('f' => -10, 't' => -5), 'f', 't', ''));
	}

	/*
	 * Testing TaskUtils->getResultsAsString()
	 */
	
	public function testGetResultsAsString() {	
		$this->assertEquals("Bazz Buzz Fizz FizzBuzz", $this->BaseTask->getResultsAsString(
				       array(R_BAZZ, R_BUZZ, R_FIZZ, R_FZBZ)));
	}
}

?>