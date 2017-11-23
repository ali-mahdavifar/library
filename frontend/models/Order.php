<?php

namespace frontend\models;

use Yii;
use common\models\User;

class Order extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'order';
    }

    public function rules()
    {
        return [
            [['title', 'publisher', 'count', 'userId'], 'required'],
            [['count', 'userId'], 'integer'],
            [['title', 'publisher'], 'string', 'max' => 255]
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}