<?php

namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class BorrowSearch extends Borrow
{
    public function rules()
    {
        return [
            ['penalty', 'integer'],
            [['userId', 'bookId'], 'safe']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params, $flag = 0)
    {
        if($flag == 1){
            $query = Borrow::find()->where(['transferDate' => null]);
        }
        else {
            $query = Borrow::find();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'penalty' => $this->penalty,
        ]);

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