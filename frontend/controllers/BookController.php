<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Book;
use yii\filters\AccessControl;
use frontend\models\Borrow;
use Yii;
use frontend\models\Wait;
use frontend\models\Category;

class BookController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'show'],
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
        return $this->render('index');
    }

    public function actionShow()
    {
        $categoryId = \Yii::$app->request->post('category');
        $books = Book::find()->innerJoin('category', 'book.categoryId = category.id')->where('category.id = ' . $categoryId)->all();
        return $this->render('show', ['books' => $books]);
    }

    public function actionReserve($id)
    {
        $reserved = [];
        $waited = array();
        if($this->checkForAvailable($id)) {
            $borrow = new Borrow();
            $borrow->beginDate = time();
            $borrow->endDate = time() + 24 * 60 * 60 * Category::find('timeLimit')->innerJoin('book', 'categoryId = category.id')->where('book.id = ' . $id)->scalar();
            $borrow->bookId = $id;
            $borrow->userId = Yii::$app->user->id;
            $borrow->save();
            $reserved = array_push($reserved, $id);
        }
        else{
            $wait = new Wait();
            $wait->requestDate = time();
            $wait->bookId = $id;
            $wait->userId = Yii::$app->user->id;
            $wait->save();
            $waited = array_push($waited, $id);
        }
        return $this->render('finish', ['waited' => $waited, 'reserved' => $reserved]);
    }

    protected function checkForAvailable($id)
    {
        $count = Borrow::find()->where('bookId = ' . $id)->andWhere('transferDate > 0')->count('*');
        if($count < Book::findOne($id)->count){
            return true;
        }
        return false;
    }
}