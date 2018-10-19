<?php

namespace app\controllers;

use app\models\tables\Users;
use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {

        // $model = new Task();
        //$model->load([
        //     'dfsadf' => [
        //        'title' => '123456',
        //        'content' => 'fgkdhfjahsdlfa'
        //    ],
        //   'Task' => [
        //       'title' => 'dhlskjdhLKJSF',
        //       'content' => 'kjdhfieuhwlkjbf'
        //   ]
        //]);

        //var_dump($model);
        //exit;


        // return $this->render('index', [
        //    'title' => 'Yii2 Framework',
        //   'content' => 'Lesson 1'
        //]);
    }

    public function actionTask()
    {
        /*\Yii::$app->db->createCommand("
        INSERT INTO test(title, content, created, executor_id) VALUES 
        ('title1', 'content1', NOW(), '1'),
        ('title2', 'content2', NOW(), '2'),
        ('title3', 'content3', NOW(), '3'),
        ('title4', 'content4', NOW(), '4')
        ")->execute();

        $id = 1;

        $res = \Yii::$app->db->createCommand("
        select * from test where id = :id
        ")
            ->bindParam('id', $id)
            ->queryOne();
        var_dump($res);*/
        //извлечение данных
        /*$user = Users::findOne(1);
        var_dump($user);  */

        /*Создание новой записи

         $user = new Users();
         $user->login = "pupkin";
         $user->password = md5("qwerty");
         $user->role = 1;

         $user->save();   */

        /*Чтение

      $user = Users::findOne(1);
      $user->isNewRecord = true;
      $user->id = null;
      $user->login = 'admin';
      $user->save(); */

        /*удаление
      $user = Users::findOne(1);
      $user->delete();

        var_dump(Users::findOne(2));

        $user = Users::getUserWithRole(2);
        var_dump($user);

        exit;*/
    }
}