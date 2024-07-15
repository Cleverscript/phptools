<?php

header('Content-type: text/plain');

$file = '/var/www/public/index.php';

echo 'PHP UID: ' . posix_getuid() . PHP_EOL;
echo 'PHP GID: ' . posix_getgid() . PHP_EOL;

if (is_readable($file)) {
    echo $file . ' is readable ' . PHP_EOL;
} else {
    echo $file . ' is NOT readable ' . PHP_EOL;
}

if (is_writable($file)) {
    echo $file . ' is writable ' . PHP_EOL;
} else {
    echo $file . ' is NOT writable ' . PHP_EOL;
}