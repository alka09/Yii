<?php

namespace app\controllers;

use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {

        $model = new Task();
        $model -> load([
            'dfsadf' => [
                'welcome' => '123456',
                'sayHello' => 'fgkdhfjahsdlfa'
            ],
            'Task' => [
                'welcome' => 'dhlskjdhLKJSF',
                'sayHello' => 'kjdhfieuhwlkjbf'
            ]
        ]);

        //var_dump($model);
        //exit;


        return $this->render('index', [
            'title' => 'Yii2 Framework',
            'content' => 'Lesson 1'
        ]);
    }

    public function actionTask(){
        \Yii::$app->db->createCommand("
        INSERT INTO test(title, content, created, shutdown, executor_id) VALUES 
        ('title1', 'content1', NOW(), '1'),
        ('title2', 'content2', NOW(), '2'),
        ('title3', 'content3', NOW(), '3'),
        ('title4', 'content4', NOW(), '4'),
        ")->execute();
    }

}