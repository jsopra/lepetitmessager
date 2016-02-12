<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../config/env.php');

$config = require(__DIR__ . '/../config/console.php');

$application = new yii\console\Application( $config );

Yii::setAlias('@tests', dirname(__DIR__));
