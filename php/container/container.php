<?php
/**
 * 容器
 * 是一种解决调用者和被调用者依赖耦合关系的模式。它解决了对象之间的依赖关系，使得对象只依赖容器，不再直接相互依赖，这样做可以最大程度实现松耦合。依赖注入说白一点，就是容器将某个类依赖的其他类的实例注入到这个类的实例中。
 * 
 * 这里只是实现了一个非常简陋的容器，实际中还需要考虑很多，而且这里的容器功能上还很简陋。还有一些没处理，比如出现循环依赖怎么处理、延迟加载的机制...
 * @package     php
 * @subpackage  container
 * @author      YK <kang.yang@100run.com>
 * @version     0.1
 *
 */
/**
 * container
 */

class Container {
    /**
     * 服务容器
     * @var array
     */
    private $_service = [];
    function __construct() {
    }
    public function set($name, $concrete) {
        $this->_service[$name] = $concrete;
    }
    public function get($name) {
        // 检测服务是否存在
        if (!isset($this->_service[$name])) {
            throw new \Exception("Services : " . $name . " not found", 1);
        }
        $instance = $concrete = $this->_service[$name];
        if (is_object($concrete)) {
            $instance = call_user_func($concrete);
        }
        
        return $instance;
    }
}
$container = new Container();
$container->set('user', function () {
    return new 
    Class () {
        function log() {
            
            return 'anony-user-log';
        }
    };
});
$container->set('redis', function () {
    return new \Redis();
});

$user = $container->get('user')->log();
var_dump($user);
$redis = $container->get('redis');
var_dump($redis);
