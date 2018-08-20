<?php
/**
 * 魔术方法 构造方法
 * 
 * __construct, __destruct
 *
 * @package     php
 * @subpackage  margic-function
 * @author      YK <kang.yang@100run.com>
 * @version     0.1
 *
 */

class Magic {
    /**
     * 构造方法 初始化对象时触发
     *
     * @author Yk 2018-08-20
     */
    public function __construct() {
        echo "__construct";
        echo "\n";
    }
    /**
     * 构造方法 调用结束时触发
     *
     * @author Yk 2018-08-20
     */
    public function __destruct() {
        echo "__destruct";
        echo "\n";
    }
}
$magic = new Magic();
