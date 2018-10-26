
<?

 echo \yii\widgets\ListView::widget([
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
]);

