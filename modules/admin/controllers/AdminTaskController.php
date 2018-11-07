<?php

namespace app\modules\admin\controllers;

use app\models\tables\Tasks;
use app\models\tables\Users;
use app\models\tables\TaskAttachments;
use app\models\User;
use app\models\TasksSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * AdminTaskController implements the CRUD actions for Tasks model.
 */
class AdminTaskController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tasks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tasks model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //Yii::$app->events;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tasks();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $user = Users::findOne($model->user_id);


            $message = "Уважаемый {$user->login}! На вас поставлена новая задача {$model->name}. 
            Дедлайн до {$model->date}";

            Yii::$app->mailer
                ->compose()
                ->setTo($user->email)
                ->setSubject('Новая задача')
                ->setTextBody($message)
                ->send();


            return $this->redirect(['view', 'id' => $model->id]);
        }

        $users = ArrayHelper::map(Users::find()->all(), 'id', 'login');

        return $this->render('create', [
            'model' => $model,
            'users' => $users,
        ]);
    }

    /**
     * Updates an existing Tasks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        $users = ArrayHelper::map(Users::find()->all(), 'id', 'login');

        return $this->render('update', [
            'model' => $model,
            'users' => $users,

        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tasks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tasks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tasks::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionUpload()
    {
        $model = new TaskAttachments();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();

            $file = UploadedFile::getInstances($model, 'images');
            foreach ($file as $file) {
                $path =Yii::getAlias('@app').'/web/'.'/uploadImg/'. $file->name;
                $file->saveAs($path);

            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    //public function actionUpload($id)
    //{
//
    //    $model = new TaskAttachments();
//
     //   if (isset($_POST['TaskAttachments'])){
//
       //     $model -> attributes = $_POST['TaskAttachments'];
       //     $model -> image = UploadedFile::getInstance($model, 'image');
//
       //     if ($model -> save()){
       //         $model -> image -> saveAs('path/to/localFile');
       //         //redirect to success page
        //    }
       // }
//
       // return $this->render('upload', ['model' => $model]);
    //}
}