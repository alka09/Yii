<?php

namespace app\controllers;

use app\behaviors\MyBehavior;
use app\models\tables\Tasks;
use app\models\tables\Users;
use app\models\Test;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {

        $month = date('n');
        $id = 1;
        $provider = new ActiveDataProvider([
            'query' => Tasks::getTaskCurrentMonth($month, $id)
        ]);

        $users = ArrayHelper::map(Users::find()->all(), 'id', 'login');

        return $this->render('index', [
            'provider' => $provider,
            'users' => $users
        ]);
    }

    public function actionView(){

        $id = \Yii::$app->request->get('id');
        $model = Tasks::findOne($id);
        return $this->render('view', ['model' => $model]);
    }
}