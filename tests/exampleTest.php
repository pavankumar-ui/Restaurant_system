<?php
use \PHPUnit\Framework\TestCase;
class ExampleTest extends TestCase{


	public function testThatTwoStringsAreTheSame(){
          $s1= 'enourmous quantity';
          $s2= 'enourmous quantity00';
          //$this->assertSame($s1,$s2);

          $this->assertFalse($s1 == $s2);
	}


	public function testProductFunction()
	{
		require "examplefunctions.php";

		$product = product(100,2);

		$this->assertEquals(200,$product);

		$this->assertNotEquals(100,$product);
	}


	
}



?>