<?php

namespace frontend\models;

use Yii;

class Event extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'event';
    }

    public function getEventCategory()
    {
        return $this->hasOne(EventCategory::className(), ['id' => 'eventCategoryId']);
    }

    public function getReserves()
    {
        return $this->hasMany(Reserve::className(), ['eventId' => 'id']);
    }
}