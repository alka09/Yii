<?php

namespace app\controllers;

use yii;
use app\behaviors\MyBehavior;
use app\models\tables\Tasks;
use app\models\tables\Users;
use app\models\Test;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\components\EventsComponent;

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

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = tasks::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $users = ArrayHelper::map(Users::find()->all(), 'id', 'login');
        return $this->render('update', [
            'model' => $model,
            'users' => $users
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }


    public function actionTest()
    {
        Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function ($event) {
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

    }
    /*       $handler1 = function ($event) {

               echo "Первый обработчик сработал $event->message!";

       }
   /*
               Event::on(Test::class, Test::EVENT_FOO_START, $handler1);
               $model = new Test();
           $model->foo();*/
        // $model->on(Test::EVENT_FOO_START, $handler1);

        /* $model = new Test();

         $model->attachBehavior('my', [
             'class' => MyBehavior::class,
             'message' => 'adfafas'
         ]);

         $model->detachBehavior('my');
         $model->title = '1231534534';
         $model->bar();
         exit;
     }*/

        public
        function actionCache()
        {
            $number = rand();
            $key = 'number';
            $cache = \Yii::$app->cache;

            if ($cache->exists($key)) {
                $number = $cache->get($key);
            }
            \Yii::$app->cache->set("number", $number);

            //var_dump($number);
            exit;

        }

}