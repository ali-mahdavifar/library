<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

class ReserveSearch extends Reserve
{

    public function rules()
    {
        return [
            [['eventId', 'userId'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Reserve::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

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

        $users = Event::find()->filterWhere(['like', 'email', $this->eventId])->all();
        $idArray = [];
        foreach($users as $k => $v){
            $idArray[$k] = $v->id;
        }

        if($idArray != null){
            $query->andFilterWhere(['in', 'eventId', $idArray]);
        }
        else{
            $query->andWhere('1 = 0');
        }

        return $dataProvider;
    }
}