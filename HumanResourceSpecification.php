<?php
class HumanResource{
	public $friday;
	public $todate;
	function __construct($todate,$friday=false){
		$this->todate=$todate;
		if(false !== $friday) {
			$this->friday = $friday;	
		}
	}
	function salaryIsPaid(){
		if($this->friday==23 || $this->friday==24) {
			return $this->friday-$this->todate." days left";
		}else{
			if($this->todate==25){
				return "You are rich man";		
			}else if($this->todate==24){
				return "Tomorrow dude";
			}else if($this->todate==26){
				return "You are pool now";
			}else if($this->todate==27){
				return "You got it 2 day ago";
			}else if($this->todate>=29 && $this->todate<=31 ){
					return "ข้อความโดนลบ จำไม่ได้ครับ ?";
			}else {
				return 25-$this->todate." days left";
			}
		
		}
	
	}
	
}

class HumanResourceSpecification extends PHPUnit_Framework_TestCase {
	function testTodayIsPayDay(){
		$expected = "You are rich man";
		$todate=25;
		$humanResource = new HumanResource($todate);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	
	function testTomorrowIsPayDay(){
		$expected = "Tomorrow dude";
		$todate=24;
		$humanResource = new HumanResource($todate);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	function test1date(){
		$expected = "24 days left";
		$todate=1;
		$humanResource = new HumanResource($todate);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	function test1date23Friday(){
		$expected = "22 days left";
		$todate=1;
		$friday = 23;
		$humanResource = new HumanResource($todate, $friday);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	function test1date24Friday(){
		$expected = "23 days left";
		$todate=1;
		$friday = 24;
		$humanResource = new HumanResource($todate, $friday);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	function test2date(){
		$expected = "23 days left";
		$todate=2;
		$humanResource = new HumanResource($todate);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	function test2date23Friday(){
		$expected = "21 days left";
		$todate=2;
		$friday = 23;
		$humanResource = new HumanResource($todate, $friday);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	function test2date24Friday(){
		$expected = "22 days left";
		$todate=2;
		$friday = 24;
		$humanResource = new HumanResource($todate, $friday);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	function test26date(){
		$expected = "You are pool now";
		$todate=26;
		$humanResource = new HumanResource($todate);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	function test27date(){
		$expected = "You got it 2 day ago";
		$todate=27;
		$humanResource = new HumanResource($todate);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	function test29date(){
		$expected = "ข้อความโดนลบ จำไม่ได้ครับ ?";
		$todate=29;
		$humanResource = new HumanResource($todate);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	function test30date(){
		$expected = "ข้อความโดนลบ จำไม่ได้ครับ ?";
		$todate=30;
		$humanResource = new HumanResource($todate);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
	function test31date(){
		$expected = "ข้อความโดนลบ จำไม่ได้ครับ ?";
		$todate=31;
		$humanResource = new HumanResource($todate);
		$actual = $humanResource->salaryIsPaid();
		$this->assertEquals($expected, $actual);
	}
}