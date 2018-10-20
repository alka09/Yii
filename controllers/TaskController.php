<?php

namespace app\controllers;

use app\models\Test;
use app\models\tables\Task;
use app\models\tables\Users;
use app\models\User;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {

        // $model = new Test();
        // $model->load([
        //     'dfsadf' => [
        //         'title' => '123456',
        //         'content' => 'fgkdhfjahsdlfa'
        //     ],
        //    'Test' => [
        //         'title' => 'dhlskjdhLKJSF',
        //         'content' => 'kjdhfieuhwlkjbf'
        //    ]
        // ]);

        //var_dump($model);
        //exit;


        // return $this->render('index', [
        //    'title' => 'Yii2 Framework',
        //   'content' => 'Lesson 1'
        //]);


        $tasks = \Yii::$app->db->createCommand("
        SELECT * FROM task WHERE MONTH(`date`) = MONTH(NOW()) AND YEAR(`date`) = YEAR(NOW())
         ")
            ->queryAll();

        return $this->render('index', [
            'tasks' => $tasks
        ]);
    }

    public
    function actionTask()
    {

    }


}