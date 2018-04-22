<?php
/**
 * VNNOX - cli模式项目入口
 * User: sdeepwang@gmail.com
 * Date: 2018-3-9 20:31
 */

//导入类自动加载
require_once __DIR__.'/vendor/autoload.php';

//引入Symfony组件的Request类
use Symfony\Component\HttpFoundation\Request;

//获取命令行的参数解析
$argvStr = implode('/',$argv);

//导入路由配置文件
$routes = include __DIR__ . '/routes/console.php';
//导入容器
$container = include __DIR__ . '/app/container.php';

//创建超全局变量$_GET,$_POST,$_SERVER,$_FILE的类映射
$request = Request::createFromGlobals();

//创建cli模式下面的请求
$request = Request::create($argvStr);
//从容器中获取framework框架处理请求
$response = $container->get('framework')->handle($request);

//发送响应给客户端
$response->send();
