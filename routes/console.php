<?php
/**
 * 配置项目cli的请求路由
 * User: sdeepwang@gmail.com
 * Date: 2018-3-9 21:08
 */

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();



$routes->add('hello', new Route('/hello', array(
	'year' => null,
	'_controller' => 'App\Http\Controller\DemoController::helloAction',
)));

$routes->add('demo', new Route('/sayBad', array(
	'_controller' => 'App\Http\Controller\DemoController::sayBadAction',
)));

$routes->add('cliHello', new Route('/server.php/hello', array(
	'year' => null,
	'_controller' => 'App\Http\Controller\DemoController::helloAction',
)));



return $routes;
