<?php

namespace app\commands;

use Yii;
use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class TaskController extends Controller
{
    public $message = "Hello";
    /** Display "test" */
    public function actiontTest()
    {
       if ($user = Users::findOne($id)){
           echo "{$this->message}, mr {$user->login}";
           return ExitCode::OK;
       }
       return ExitCode::UNSPECIFIED_ERROR;
    }


}