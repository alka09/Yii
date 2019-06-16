<?php

namespace app\controllers;

use app\behaviors\MyBehavior;
use app\models\tables\Tasks;
use app\models\Test;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {

        $month = date('n');
        $provider = new ActiveDataProvider([
            'query' => Tasks::getTaskCurrentMonth($month)
        ]);
        return $this->render('index', [
            'provider' => $provider
        ]);
    }


    public function actionTest()
    {
        /*   Event::on(Users::class, Users::EVENT_AFTER_INSERT, function ($event) {
               $task = new Tasks([
                   'name' => 'Ознакомиться с проектом',
                   'date' => date("Y-m-d"),
                   'description' => 'Новый проект',
                   'user_id' => $event->sender->id
               ]);
               $task->save();
           });

           $user = new Users();
           $user->login = 'Vasechkim';
           $user->password = 'qwerty';
           $user->save();
   */

        /*    $handler1=function ($event){

                echo "Первый обработчик сработал $event->message!";
            };

            Event::on(Test::class, Test::EVENT_FOO_START, $handler1);
            $model = new Test();
        $model->foo();*/
        // $model->on(Test::EVENT_FOO_START, $handler1);

        $model = new Test();

        $model ->attachBehavior('my', [
           'class' => MyBehavior::class,
           'message' =>  'adfafas'
        ]);

        $model->detachBehavior('my');

        $model->title = '1231534534';
        $model->bar();


        exit;
    }
}