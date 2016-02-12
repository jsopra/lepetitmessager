<?php

Yii::$app->redis->executeCommand('FLUSHDB');

use Codeception\Util\Debug;

$model = new \app\models\Message;
$model->author_email = 'test@gmail.com';
$model->author_name = 'test';
$model->message = str_repeat('A', 140);
$model->save();

$I = new ApiTester($scenario);
$I->wantTo('Excluir uma mensagem');
$I->sendDELETE('messages', ['' => $model->id]);
$I->seeResponseIsJson();

$I->seeResponseContainsJson([]);
