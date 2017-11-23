<?php

namespace frontend\models;

use Yii;

class EventCategory extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'event_category';
    }

    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['eventCategoryId' => 'id']);
    }
}