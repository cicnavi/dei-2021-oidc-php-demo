<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Cicnavi\Oidc\Config;
use Cicnavi\Oidc\Cache\FileCache;
use Cicnavi\Oidc\Client;

try {
    $configFile = __DIR__ . '/config.php';

    if (! file_exists($configFile)) {
        throw new \Exception('Please create configuration file "app/config.php" (see app/config.php.example)');
    }

    $config = new Config(require $configFile);

    // Make sure that the storage folder is writable by the web server.
    $cache = new FileCache(dirname(__DIR__) . '/storage');

    return new Client($config, $cache);
} catch (\Throwable $exception) {
    // TODO In real app, handle this state...
    var_dump('Oups...: ' . $exception->getMessage());
    throw $exception;
}
