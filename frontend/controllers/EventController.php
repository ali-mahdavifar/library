<?php

namespace frontend\controllers;

use frontend\models\Event;
use frontend\models\Reserve;
use yii\filters\AccessControl;

class EventController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['reserve'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $events = Event::find()->where('day > ' . time())->orderBy('day')->all();
        return $this->render('index', ['events' => $events]);
    }

    public function actionReserve($id)
    {
        $event = new Reserve();
        $event->eventId = $id;
        $event->userId = \Yii::$app->user->id;
        $event->save();
        return $this->render('finish');
    }
}