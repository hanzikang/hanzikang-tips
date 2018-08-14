<?php
/**
 * Redis 实战
 * 消息模式 订阅
 *
 * @package     cache
 * @subpackage  redis
 * @version     0.1
 * @example php subscribe.php
 */

try {
    subscribe(getRedis());
}
catch(\RedisException $e) {
    $error[] = $e->getCode();
    $error[] = $e->getLine();
    $error[] = $e->getMessage();
    if (!$e->getCode()) {
        echo "again Connect Redis And subscribe \n ";
        subscribe(getRedis());
    }
    print_R($error);
}

function getRedis() {
    $redis = new \Redis();
    $redis->connect('192.168.1.236', 6379);
    
    return $redis;
}
function subscribe($redis) {
    //订阅
    echo "订阅msg这个频道，等待消息推送... \n";
    $redis->subscribe(['msg'], function ($redis, $channel, $data) {
        print_r(['redis' => $redis, 'channel' => $channel, 'data' => $data]);
    });
}
