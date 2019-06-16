<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\tasks */
/* @var $form yii\widgets\ActiveForm */
/* @var $role  array */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reg">

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'login') ?>
    <?= $form->field($model, 'password') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'role_id')->dropDownList($role) ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end() ?>
</div>

