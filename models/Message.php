<?php
namespace app\models;

class Message extends \yii\redis\ActiveRecord
{
    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'id',
            'timestamp',
            'author_name',
            'author_email',
            'message',
        ];
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            'id',
            'author_name',
            'author_email',
            'creation_time' => function ($model) {
                return \Yii::$app->formatter->asDateTime($model->timestamp, 'long');
            },
            'message',
        ];
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['author_name', 'author_email', 'message'], 'required'],
            ['author_name', 'string'],
            ['author_email', 'email'],
            ['timestamp', 'default', 'value' => time()],
            ['timestamp', 'safe'],
            ['message', 'string', 'length' => [10, 140]],
        ];
    }
}
