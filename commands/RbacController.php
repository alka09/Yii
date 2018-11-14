<?php

namespace app\commands;

use Yii;
use yii\console\Controller;


class RbacController extends Controller
{

    public function actionIndex()
    {

        $auth = Yii::$app->authManager;

        $createTask = $auth->createPermission('createTask');
        $createTask -> description = 'создание задачи';
        $auth -> add($createTask);

        $updateTask = $auth->createPermission('updateTask');
        $updateTask -> description = 'редактирование задачи';
        $auth -> add($updateTask);

        $deleteTask = $auth->createPermission('deleteTask');
        $deleteTask -> description = 'удаление задачи';
        $auth -> add($deleteTask);

        $projectManager = $auth ->createRole('projectManager');
        $auth -> add($projectManager);
        $auth -> addChild($projectManager, $createTask);

        $admin = $auth->createRole('admin');
        $auth -> add($admin);
        $auth -> addChild($admin, $updateTask);
        $auth -> addChild($admin, $deleteTask);
        $auth -> addChild($admin, $projectManager);

        $auth -> assign($projectManager, 19);
        $auth -> assign($admin, 18);

    }


}
