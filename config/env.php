<?php
$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->overload();

try {
    $dotenv->required([
        'COOKIES_KEY',
        'REDIS_HOST',
        'REDIS_DATABASE',
        'REDIS_PORT',
        'REDIS_TEST_DATABASE',
    ])->notEmpty();

    $dotenv->required([
        'REDIS_PASSWORD',
    ]);

    $dotenv->required('ENVIRONMENT')
        ->allowedValues(['development', 'test', 'production']);

} catch (Exception $e) {
    echo "Verifique o arquivo \".env\":\n";
    echo $e->getMessage(), "\n";
    exit(1);
}
