
## 关于SimplexFramework

SimplexFramework 是基于symfony核心组件开发的一个简单符合MVC框架.

- symfony/http-foundation  Http规范的实现包括请求和响应
- symfony/routing  路由组件
- symfony/http-kernel  http的核心组件
- symfony/event-dispatcher  事件派发组件
- symfony/dependency-injection  容器和依赖注入组件

## 安装
- git clone git@172.16.80.102:wangxingyuan/SimplxFramework.git
- cd SimplxFramework && composer install

## 目录说明
- app框架核心目录和业务代码
    - Simplex 框架核心代码目录
        - DemoListener.php 示例监听器
        - Framework.php 框架核心文件
    - Http 业务代码目录
        -  Controller 控制器目录
            - DemoController.php 示例控制器
            - ErrorController.php 异常错误处理控制器
        -  Model 模型目录  
            -  Demo.php 示例模型
    - container.php 容器和依赖注入
    - build  单元测试代码覆盖率目录
    - public 项目单一入口
        - index.php 入口文件
    - routes 路由目录
        - web.php api请求路由配置
        - console.php cli请求的路由配置
    - tests 单元测试目录
    - phpunit.xml 单元测试配置文件
    - server.php cli模式访问的入口文件  
              
## 使用

- 单元测试代码覆盖率  ./vendor/bin/phpunit
- 命令行访问  php server.php hello
- MVC流程如下

首先创建自己的控制器在app/Http/Controller  和 app/Http/Model 编写业务逻辑 , 在routes对应的文件中添加对应的路由 web对应api请求路由, console对应cli模式
下面的请求路由,最后在浏览器中http://xxxxxxx.com/路由名!
