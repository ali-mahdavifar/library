<?php

namespace frontend\controllers;

use frontend\models\Order;
use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;

class OrderController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post())){
            $model->userId = Yii::$app->user->id;
            if($model->save()) {
                return $this->render('finish');
            }
        }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
}