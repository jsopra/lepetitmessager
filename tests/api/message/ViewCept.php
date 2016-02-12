<?php

Yii::$app->redis->executeCommand('FLUSHDB');

use Codeception\Util\Debug;

$model = new \app\models\Message;
$model->author_email = 'test@gmail.com';
$model->author_name = 'test';
$model->message = str_repeat('A', 140);
$model->save();

$I = new ApiTester($scenario);
$I->wantTo('Ver uma mensagem');
$I->sendGET('messages/' . $model->id);
$I->seeResponseIsJson();

$I->seeResponseMatchesJsonType([
    'id' => 'string',
    'author_name' => 'string',
    'author_email' => 'string:email',
    'creation_time' => 'string',
    'message' => 'string'
]);
