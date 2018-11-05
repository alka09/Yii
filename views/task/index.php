<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\tables\tasks */
/* @var $form yii\widgets\ActiveForm */
/* @var $users  array */
?>


<?php //var_dump($users)?>

<?php
if($this->beginCache("216000"))
{
    ?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//        'id',
            'name',
            'description:ntext',
            'date',
            'user_id' => [
                'label' => 'Name',
                'value' => function ($data) {
                    return $data->user->login;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],

    ])

    ?>
    <?php $this->endCache();
}?>
