<?php
/**
 * VNNOX - LeapYearTest.php.
 * User: sdeepwang@gmail.com
 * Date: 2018-3-13 17:30
 */

namespace Tests\Http\Model;

use App\Http\Model\Demo;
use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase {

	public function test_is_leap_year(){
		$leapYear = new Demo();

		//使用默认年进行验证
		$nullYear = $leapYear->isLeapYear();
		$this->assertFalse($nullYear);

		//不是闰年
		$hasNoLeap = $leapYear->isLeapYear(2018);
		$this->assertFalse($hasNoLeap);

		//是闰年
		$hasLeap = $leapYear->isLeapYear(20000);
		$this->assertTrue($hasLeap);
	}
}
