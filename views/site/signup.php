<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\tasks */
/* @var $form yii\widgets\ActiveForm */
/* @var $users  array */

?>
<div class="tasks-form">

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'login') ?>
<?= $form->field($model, 'password') ?>
<?= $form->field($model, 'email') ?>
<div class="form-group">
    <div>
        <?= Html::submitButton('Регистрация', ['class' =>'btn btn-success'])?>
    </div>
</div>

<?php ActiveForm::end() ?>
</div>

