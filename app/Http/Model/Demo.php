<?php
/**
 * Desc   功能说明
 * User:  maogou
 * Mail:  kinyou_xy@126.com
 * Date:  2018/3/9 下午11:52
 */

namespace App\Http\Model;

class Demo
{
	public function isLeapYear($year = null)
	{
		if (null === $year) {
			$year = date('Y');
		}

		return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
	}
}
