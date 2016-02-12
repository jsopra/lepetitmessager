<?php

namespace app\controllers;

use Yii;
use yii\base\Controller;

class SiteController extends Controller
{
    public function actionError()
    {
        throw Yii::$app->getErrorHandler()->exception;
    }
}
