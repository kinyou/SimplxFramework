<?php
/**
 * Desc   项目异常信息处理类
 * User:  maogou
 * Mail:  kinyou_xy@126.com
 * Date:  2018/3/10 下午10:20
 */

namespace App\Http\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Debug\Exception\FlattenException;

/**
 * 处理框架的异常信息响应
 * Class ErrorController
 * @package Http\Controller
 */
class ErrorController {

	public function exceptionAction(FlattenException $exception) {

		$msg = '错误:' . $exception->getMessage() ;

		return new Response($msg, $exception->getStatusCode());
	}
}
