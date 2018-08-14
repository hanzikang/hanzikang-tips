<?php 


/**
 * Redis 基本操作
 * 
 * @package     cache
 * @subpackage  redis
 * @author      YK <kang.yang@100run.com>
 * @version     0.1
 * @example php cache.php
 * 
 * 
 */



$redis = new \Redis();
$redis->connect('192.168.1.236', 6379);

/**
 * 缓存数据
 */

// String
$redis->set('cache-key-string', 'test');
// JSON
$redis->set('cache-key-json', json_encode(['data' => [1,2,3], 'msg' => 'json数据'], JSON_UNESCAPED_UNICODE));
// INT
$redis->set('cache-key-int', 1);

echo "字符串缓存成功～ \n\n";
echo "String cache success \n\n";

/**
 * 获取缓存数据
 * get cache data
 */
echo "读取缓存数据为： \n";

echo "cache-key-string : " .  $redis->get('cache-key-string') . "\n";

echo "cache-key-int : " .  $redis->get('cache-key-int') . "\n";

$data = $redis->get('cache-key-json');
echo "The cache Json data is: \n";
print_r(json_decode($data,true));