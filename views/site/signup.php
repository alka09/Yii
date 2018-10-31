<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $model app\models\tables\Users */
/* @var $role  array */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'login') ?>
<?= $form->field($model, 'password') ?>
<?= $form->field($model, 'email')->input('email')->hint('Введите ваш электронный адрес') ?>
<?= $form->field($model, 'role_id')->dropDownList($role) ?>

<div class="form-group">
    <div>
        <?= Html::submitButton('Регистрация', ['class' =>'btn btn-success'])?>
    </div>
</div>

<?php ActiveForm::end() ?>
