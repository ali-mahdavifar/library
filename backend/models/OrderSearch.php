<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

class OrderSearch extends Order
{
    public function rules()
    {
        return [
            [['title', 'publisher', 'userId'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Order::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'publisher', $this->publisher]);

        $users = User::find()->filterWhere(['like', 'email', $this->userId])->all();
        $idArray = [];
        foreach($users as $k => $v){
            $idArray[$k] = $v->id;
        }

        if($idArray != null){
            $query->andFilterWhere(['in', 'userId', $idArray]);
        }
        else{
            $query->andWhere('1 = 0');
        }

        return $dataProvider;
    }
}