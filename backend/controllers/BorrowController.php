<?php

namespace backend\controllers;

use Yii;
use backend\models\Borrow;
use backend\models\BorrowSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class BorrowController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'delete', 'check', 'show-not-transfer'],
                        'allow' => true,
                        'roles' => ['Admin'],
                    ],
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        $searchModel = new BorrowSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionShowNotTransfer()
    {
        $searchModel = new BorrowSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,1);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCheck($id)
    {
        $borrow = Borrow::findOne($id);
        $borrow->transferDate = time();
        if($borrow->transferDate <= $borrow->endDate) {
            $borrow->save();
            return $this->redirect(['index']);
        }
        else{
            $dateDiff = $borrow->transferDate - $borrow->endDate;
            $penalty = floor($dateDiff / (60*60*24)) * 500;
            $borrow->penalty = $penalty;
            $borrow->save();
            return $this->render('pay', ['penalty' => $penalty]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Borrow::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}