<?php
/**
 * Desc   功能说明
 * User:  maogou
 * Mail:  kinyou_xy@126.com
 * Date:  2018/3/10 上午10:53
 */
namespace App\Simplex;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * 响应长度监听者
 * Class ContentLengthListener
 * @package Simplex
 */
class DemoListener implements  EventSubscriberInterface
{

	public function __construct(){

	}


	public static function getSubscribedEvents()
	{
		return array('response' => array('onResponse', -255));
	}
}