<?php

namespace backend\models;

use Yii;

class Event extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'event';
    }

    public function rules()
    {
        return [
            [['day', 'startTime', 'endTime', 'title', 'speakers', 'eventCategoryId'], 'required'],
            [['day', 'startTime', 'endTime', 'eventCategoryId'], 'integer'],
            [['speakers', 'description'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
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