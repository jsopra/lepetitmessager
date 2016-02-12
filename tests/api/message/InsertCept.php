<?php

Yii::$app->redis->executeCommand('FLUSHDB');

use Codeception\Util\Debug;

$I = new ApiTester($scenario);
$I->wantTo('Inserir uma mensagem');
$I->sendPOST('messages', [
    'author_name' => 'test',
    'author_email' => 'test@gmail.com',
    'message' => 'a new message',
]);

$I->seeResponseIsJson();

$I->seeResponseJsonMatchesJsonPath('$[author_name');
$I->seeResponseJsonMatchesJsonPath('$.author_email');
$I->seeResponseJsonMatchesJsonPath('$.message');
$I->seeResponseJsonMatchesJsonPath('$.id');
$I->seeResponseJsonMatchesJsonPath('$.creation_time');
