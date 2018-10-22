<?= \yii\widgets\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'name',
        'description:ntext',
        'date',
    ],
]) ?>
