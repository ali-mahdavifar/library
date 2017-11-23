<?php

namespace backend\models;

use Yii;

class EventCategory extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'event_category';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['eventCategoryId' => 'id']);
    }
}