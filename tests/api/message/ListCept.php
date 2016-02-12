<?php

Yii::$app->redis->executeCommand('FLUSHDB');

use Codeception\Util\Debug;

$model = new \app\models\Message;
$model->author_email = 'test@gmail.com';
$model->author_name = 'test';
$model->message = str_repeat('A', 140);
$model->save();

$I = new ApiTester($scenario);
$I->wantTo('Ver a lista de mensagens');
$I->sendGET('messages', []);
$I->seeResponseIsJson();

$I->seeResponseJsonMatchesJsonPath('$[0].author_name');
$I->seeResponseJsonMatchesJsonPath('$[0].author_email');
$I->seeResponseJsonMatchesJsonPath('$[0].message');
$I->seeResponseJsonMatchesJsonPath('$[0].id');
$I->seeResponseJsonMatchesJsonPath('$[0].creation_time');
