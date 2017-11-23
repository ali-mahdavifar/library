<?php

namespace backend\models;

use frontend\models\EventCategory;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class EventSearch extends Event
{
    public function rules()
    {
        return [
            [['title', 'eventCategoryId'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Event::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);

        $categories = EventCategory::find()->filterWhere(['like', 'title', $this->eventCategoryId])->all();
        $idArray = [];
        foreach($categories as $k => $v){
            $idArray[$k] = $v->id;
        }

        if($idArray != null){
            $query->andFilterWhere(['in', 'eventCategoryId', $idArray]);
        }
        else{
            $query->andWhere('1 = 0');
        }

        return $dataProvider;
    }
}