<?php
/**
 * VNNOX - FremaworkTest.php.
 * User: sdeepwang@gmail.com
 * Date: 2018-3-14 9:28
 */
namespace Tests\Simplex;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;


class FrameworkTest extends TestCase {

	/**
	 * 测试框架流程-container.php的核心代码
	 */
	public function testFramework(){

		$container = $this->getContainerBuilder();
		$request = Request::create('hello','GET');
		$response = $container->get('framework')->handle($request);
		$content = $response->getContent();
		$this->assertEquals('Gook luck , Enjoy it begin!',$content);
	}

	/**
	 * 测试一个路由不存在
	 */
	public function testNotFoundRoute(){

		$container = $this->getContainerBuilder();
		$request = Request::create('hello2','GET');
		$response = $container->get('framework')->handle($request);
		$content = $response->getContent();
		$this->assertEquals('错误:No route found for "GET /hello2"',$content);
	}



	/**
	 * 返回容器
	 * @return mixed
	 */
	private function getContainerBuilder(){

		$routes =include  __DIR__ . '/../../routes/console.php';
		$containerBuilder = include __DIR__ . '/../../app/container.php';

		return $containerBuilder;
	}
}
