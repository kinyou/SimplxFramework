<?php
/**
 * Desc   DemoController.php
 * User:  maogou
 * Mail:  kinyou_xy@126.com
 * Date:  2018/3/11 上午10:11
 */

namespace App\Http\Controller;

use App\Http\Model\Demo;
use Symfony\Component\HttpFoundation\Response;

class DemoController {

	public function helloAction(){

		return new Response("Gook luck , Enjoy it begin!");

	}

	public function sayBadAction(){
		$demoModel = new  Demo();
		$result = $demoModel->isLeapYear(20000);

		return new Response('sayBad' . (int)$result);
	}


}
