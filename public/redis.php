<?php

# Test Redis server

try {
    if (!class_exists('Redis')) {
        throw new Exception('Redis is not exist class!');
    }

    $redis = new Redis();
    $redis->connect('phptools_redis', 6379, 60);
    $redis->set('php', 'Hellow world from redis!');
    print $redis->get('php');

} catch (\Throwable $e) {
    print $e->getMessage();
}