<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../config/env.php');

$env = getenv('ENVIRONMENT');

if ($env == 'test') {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'test');
} elseif ($env == 'development') {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
} else {
    defined('YII_DEBUG') or define('YII_DEBUG', false);
    defined('YII_ENV') or define('YII_ENV', 'prod');
}

require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

if ($env == 'test') {
    $config = require(__DIR__ . '/../tests/acceptance/_config.php');
}

(new yii\web\Application($config))->run();
