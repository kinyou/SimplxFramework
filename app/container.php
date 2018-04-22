<?php
/**
 * Desc   容器配置对象及其依赖关系
 * User:  maogou
 * Mail:  kinyou_xy@126.com
 * Date:  2018/3/10 下午10:25
 */

use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;
use Symfony\Component\EventDispatcher;
use App\Simplex\Framework;

//构建一个依赖注入容器实例
$containerBuilder = new DependencyInjection\ContainerBuilder();
//注册请求的内容
$containerBuilder->register('context', Routing\RequestContext::class);
//注册请求URl匹配器,并设置参数匹配上面的请求内容
$containerBuilder->register('matcher', Routing\Matcher\UrlMatcher::class)
	->setArguments(array($routes, new Reference('context')));
//注册请求的全栈线路
$containerBuilder->register('request_stack', HttpFoundation\RequestStack::class);
//注册控制器解析器
$containerBuilder->register('controller_resolver', HttpKernel\Controller\ControllerResolver::class);
//注册请求参数解析器
$containerBuilder->register('argument_resolver', HttpKernel\Controller\ArgumentResolver::class);
//注册路由的监听器
$containerBuilder->register('listener.router', HttpKernel\EventListener\RouterListener::class)
	->setArguments(array(new Reference('matcher'), new Reference('request_stack')));
//注册响应监听器
$containerBuilder->register('listener.response', HttpKernel\EventListener\ResponseListener::class)
	->setArguments(array('UTF-8'));

//注册自己的监听器
$containerBuilder->register('demo.response', \App\Simplex\DemoListener::class);

//注册异常处理监听器,并由ErrorController::exceptionAction去处理
$containerBuilder->register('listener.exception', HttpKernel\EventListener\ExceptionListener::class)
	->setArguments(array('App\Http\Controller\ErrorController::exceptionAction'));

//注册事件派发器,并添加对应的监听者
$containerBuilder->register('dispatcher', EventDispatcher\EventDispatcher::class)
	->addMethodCall('addSubscriber', array(new Reference('listener.router')))
	->addMethodCall('addSubscriber', array(new Reference('listener.response')))
	->addMethodCall('addSubscriber', array(new Reference('listener.exception')))
	->addMethodCall('addSubscriber', array(new Reference('demo.response')));

//注册框架到容器中
$containerBuilder->register('framework', Framework::class)
	->setArguments(array(
		new Reference('dispatcher'),
		new Reference('controller_resolver'),
		new Reference('request_stack'),
		new Reference('argument_resolver'),
	));

return $containerBuilder;
