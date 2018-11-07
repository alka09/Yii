<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\tables\tasks */
/* @var $form yii\widgets\ActiveForm */
/* @var $users  array */
?>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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

}?>
