<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

class WaitSearch extends Wait
{

    public function rules()
    {
        return [
            [['bookId', 'userId'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Wait::find()->orderBy('requestDate');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;
        }

        $books = Book::find()->filterWhere(['like', 'title', $this->bookId])->all();
        $idArray = [];
        foreach($books as $k => $v){
            $idArray[$k] = $v->id;
        }

        if($idArray != null){
            $query->andFilterWhere(['in', 'bookId', $idArray]);
        }
        else{
            $query->andWhere('1 = 0');
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

        return $dataProvider;
    }
}