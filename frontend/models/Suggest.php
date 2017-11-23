<?php

namespace frontend\models;

use Yii;
use common\models\User;

class Suggest extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'suggest';
    }

    public function rules()
    {
        return [
            [['title', 'publisher', 'userId'], 'required'],
            [['userId'], 'integer'],
            [['title', 'publisher'], 'string', 'max' => 255]
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}