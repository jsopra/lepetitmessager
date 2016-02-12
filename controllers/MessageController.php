<?php
namespace app\controllers;

class MessageController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Message';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update']);
        return $actions;
    }

    public function behaviors()
    {
        $data = parent::behaviors();
        unset($data['authenticator'], $data['rateLimiter']);
        return $data;
    }
}
