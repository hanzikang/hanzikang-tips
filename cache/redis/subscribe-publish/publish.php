<?php
/**
 * Redis 消息发布
 *
 * @package     cache
 * @subpackage  redis
 * @version     0.1
 * @example php publish.php
 */
//发布
$redis = new \Redis();
$redis->connect('192.168.1.236', 6379);
$redis->publish('msg', json_encode(['data' => '来自msg频道的推送', 'errorCode' => 0], JSON_UNESCAPED_UNICODE));
echo "msg频道消息推送成功～ \n";
$redis->close();
