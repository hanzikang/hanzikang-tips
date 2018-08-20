<?php 


/**
 * 模魔术方法  未定义的函数
 * __call , __callStatic
 * @package     php
 * @subpackage  margic-function
 * @author      YK <kang.yang@100run.com>
 * @version     0.1
 * 
 */

/**
* 
*/
class Margic
{
	/**
	 *  构造方法
	 * @author Yk 2018-08-17
	 */
	function __construct()
	{
		echo '我是构造方法';
	}
	/**
	 * 调用一个不可访问方法时触发
	 * @author Yk 2018-08-17
	 * @param  [type] $method 调用方法名	
	 * @param  [type] $args   参数
	 * @return 
	 */
	function __call($method, $args) {
		echo "未定义的方法：" . $method . " \n";
		echo "未定义的方法传递参数：\n";
		print_R($args);
	}

	/**
	 * 调取一个静态不可访问方法时触发
	 * @author Yk 2018-08-17
	 * @param  [type] $method 方法名	
	 * @param  [type] $args   参数
	 * @return [type]         [description]
	 */
	public static function __callStatic ($method, $args) {
		echo "未定义的静态方法：" . $method . " \n";
		echo "未定义的静态方法传递参数：\n";
		print_R($args);
	}
	public function __destruct() {
		echo '我是析构方法';
	}
}

/**
 * 
 * 未定义的方法：run 
 * 未定义的方法传递参数：
 * Array
 * (
 *		[0] => 张三
 *	 	[1] => 李四
 * )
 */

$margic = new Margic();
$margic->run('参数1', '参数2');

Margic::run('参数1', '参数2');