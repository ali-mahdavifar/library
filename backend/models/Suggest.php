<?php

namespace backend\models;

use Yii;
use common\models\User;

class Suggest extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'suggest';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}