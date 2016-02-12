<?php

namespace tests\unit\models;

use Yii;
use app\models\Message;

class MessageTest extends \Codeception\TestCase\Test
{
    protected function setUp()
    {
        parent::setUp();

        Yii::$app->redis->executeCommand('FLUSHDB');
    }

    public function testRuleTamanhoMensagemInsuficiente()
    {
        $model = new Message;
        $model->message = str_repeat('A', 9);

        $model->validate();

        $this->assertTrue($model->hasErrors('message'));
    }

    public function testRuleTamanhoMensagemSuficiente()
    {
        $model = new Message;
        $model->message = str_repeat('A', 140);

        $model->validate();

        $this->assertFalse($model->hasErrors('message'));

    }

    public function testRuleTamanhoMensagemMuitoGrande()
    {
        $model = new Message;
        $model->message = str_repeat('A', 141);

        $model->validate();

        $this->assertTrue($model->hasErrors('message'));

    }

    public function testRuleEmailValido()
    {
        $model = new Message;
        $model->author_email = 'test@gmail.com';

        $model->validate();

        $this->assertFalse($model->hasErrors('author_email'));

    }

    public function testRuleEmailInvalido()
    {
        $model = new Message;
        $model->author_email = 'test@gmail';

        $model->validate();

        $this->assertTrue($model->hasErrors('author_email'));
    }

    public function testRuleCamposRequeridosSatisfeitos()
    {
        $model = new Message;

        $this->assertFalse($model->validate());

        $model->author_email = 'test@gmail.com';
        $model->author_name = 'test';
        $model->message = str_repeat('A', 140);

        $this->assertTrue($model->validate());
    }
}
