<?php
/**
 * Created by PhpStorm.
 * User: Alena
 * Date: 11.11.2018
 * Time: 22:18
 */

namespace app\commands;

use app\models\tables\Users;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class TaskController extends Controller
{

    public $message = "Hello";

    /**
     * Display "test"
     */
    public function actionTest($id)
    {

        if ($user = Users::findOne($id)) {
            $login = $this->ansiFormat($user->login, Console::BG_YELLOW);
            echo "{$this->message}, mr {$login}!!!";
            return ExitCode::OK;
        }
        return ExitCode::UNSPECIFIED_ERROR;
    }

    public function actionHandle()
    {
        $count = 30;
        Console::startProgress(1, $count);
        for($i = 1; $i < 30; $i++){
            sleep(1);
            Console::updateProgress();
        }
        Console::endProgress(0);
        echo 'Complete!';
    }

    public function options($actionID)
    {
        return [
            'message'
        ];
    }

    public function optionAliases()
    {
        return ['m' => 'message'];
    }

}