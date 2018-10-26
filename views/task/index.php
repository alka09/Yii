
<?

 echo \yii\widgets\ListView::widget([
    'dataProvider' => $provider,
    'itemView' => 'cart',
    'viewParams' => [
        'hideBreadcrumbs' => true
    ]
]);

