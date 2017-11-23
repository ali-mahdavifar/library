<?php

namespace frontend\models;

use Yii;
use common\models\User;

class Reserve extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'reserve';
    }

    public function rules()
    {
        return [
            [['price', 'count', 'eventId', 'userId'], 'integer'],
            [['eventId', 'userId'], 'required']
        ];
    }

    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'eventId']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}