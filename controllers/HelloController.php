<?php

namespace app\controllers;
use yii\web\Controller;

class HelloController extends Controller
{
//public function actionSay($message = 'Привет!')
//{
//    return $this->render('say', ['message' => $message]);
//}
    public function actionSay()
    {
        $message = 'Привет!';
        echo $message;
    }
}