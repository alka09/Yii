<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TasksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?/*= $form->field($model, 'id') */?>

    <?/*= $form->field($model, 'name') */?>

    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::class, [
            'dateFormat' => 'yyyy-MM-dd',
            'language' => 'ru']
    ) ?>

    <?/*= $form->field($model, 'description') */?>

    <?= $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>