<?php


/**
 * Memcached 实战
 * 
 * @package     cache
 * @subpackage  memcache
 * @version     0.1
 * @example php cache.php 
 */

/***
	对于内存缓存，比较常用的有两种memcache和memcached扩展，而memcache和memcached的守护进程mencached同名，容易混淆
	a、Memcache是完全在PHP框架内开发的

	b、Memcached是使用libmemcached的

	c、Memcached会比memcache多几个方法，使用方式上都差不多
*/



$cache = new \Memcache();
$cache->connect("192.168.1.236", 11211);

/****

	Action  
		set 
			Memcache::set方法有四个参数，第一个参数是key，第二个参数是value，第三个参数可选，表示是否压缩保存，第四个参数可选，用来设置一个过期自动销毁的时间
		add 
			Memcache::add方法的作用和Memcache::set方法类似，区别是如果 Memcache::add方法的返回值为false，表示这个key已经存在，而Memcache::set方法则会直接覆写。
		get
			Memcache::get方法的作用是获取一个key值，Memcache::get方法有一个参数，表示key。
		replace
			Memcache::replace 方法的作用是对一个已有的key进行覆写操作，Memcache::replace方法有四个参数，作用和Memcache::set方法的相同
		delete
			Memcache::delete方法的作用是删除一个key值，Memcache::delete方法有两个参数，第一个参数表示key，第二个参数可选，表示删除延迟的时间
*/

// 简单字符串存储
$cache->set('memcache-key-string', 'The is Data String');

// 设置过期时间 
//  set(key, value , [压缩保存], [过期时间 秒单位])
$cache->set('memcache-key-string-timeout', 'The is Data String', 0, 60);


$data = $cache->get('memcache-key-string');
echo "memcache-key-string : " . $data . "\n";

$data = $cache->get('memcache-key-string-timeout');
echo "memcache-key-string-timeout : " . $data . "\n";



echo "Delete From memcache-key-string  : " ; 
$cache->delete('memcache-key-string');
echo "SUCCESS  \n" ; 

$data = $cache->get('memcache-key-string');
echo "memcache-key-string : " . ($data?:'NULL') . " \n";


