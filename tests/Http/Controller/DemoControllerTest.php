<?php
/**
 * VNNOX - DemoControllerTest.php.
 * User: sdeepwang@gmail.com
 * Date: 2018-3-14 11:57
 */
namespace Tests\Http\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class DemoControllerTest extends TestCase {

	/**
	 * 测试hello方法
	 */
	public function testHello(){
		$container = $this->getContainerBuilder();
		$request = Request::create('hello','GET');

		$response = $container->get('framework')->handle($request);
		$content = $response->getContent();
		$this->assertEquals('Gook luck , Enjoy it begin!',$content);
	}

	/**
	 * 测试sayBad方法
	 */
	public function testSayBad(){
		$container = $this->getContainerBuilder();
		$request = Request::create('sayBad','GET');

		$response = $container->get('framework')->handle($request);
		$content = $response->getContent();
		$this->assertEquals('sayBad1',$content);
	}

	/**
	 * 返回容器
	 * @return mixed
	 */
	private function getContainerBuilder(){

		$routes =include  __DIR__ . '/../../../routes/console.php';
		$containerBuilder = include __DIR__ . '/../../../app/container.php';

		return $containerBuilder;
	}
}
