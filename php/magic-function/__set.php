<?php
/**
 * 魔术方法 在给不可访问属性赋值时
 *
 * __set, __get, __isset, __unset
 *
 * @package     php
 * @subpackage  margic-function
 * @author      YK <kang.yang@100run.com>
 * @version     0.1
 *
 */

class Magic {
    /**
     * 类 属性
     * @var string
     */
    private $_name = 'The is Attr _name';
    function __construct() {
    }
    /**
     * 设置未定义属性时触发
     * @author Yk 2018-08-17
     * @param  [type] $name  属性名
     * @param  [type] $value 属性值
     */
    public function __set($name, $value) {
        echo "__set() - 设置未定义属性 : {$name} => {$value} \n";
    }
    /**
     * 魔术方法 调取未定义属性时触发
     * @author Yk 2018-08-17
     * @param  [type] $name 属性名
     * @return
     */
    public function __get($name) {
        echo "__get() - 获取未定义属性 : {$name} \n";
    }
    /**
     * 魔术方法 检测不可调用属性时触发
     * @author Yk 2018-08-17
     * @param  [type]  $name 属性名
     * @return
     */
    public function __isset($name) {
        echo "__isset() - 检测未定义属性 : {$name} \n";
    }
    /**
     * 魔术方法 销毁不可调用属性时触发
     * @author Yk 2018-08-17
     * @param  [type]  $name 属性名
     * @return
     */
    public function __unset($name) {
        echo "__unset() - 销毁未定义属性 : {$name} \n";
    }
}
$magic = new Magic();
$magic->name = '张三';
echo $magic->name;
isset($magic->_name);
unset($magic->_name);
