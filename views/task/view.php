
<?php /**@var \app\models\tables\Tasks $model */ ?>

<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\tables\tasks */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Task', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'description:html',
            'date',
            'user_id' =>
                [
                    'label' => 'Name',
                    'value' => $model->user->login
                ],
            'created_at',
            'updated_at'
//            'user_id',
        ],
    ])

    ?>

    <div class="attachments">

        <? foreach ($model->attachments as $file):?>
        <img src="" alt="">
        <?endforeach;?>

    </div>

</div>
<form action="">

    <input type="file">
</form>
