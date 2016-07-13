<?php
/**
 * Created by PhpStorm.
 * User: ÄôÍ¢±¦
 * Date: 2016/7/11
 * Time: 11:47
 */
use yii\grid\GridView;
use yii\helpers\Html;
?>

<h2>Customers</h2>
<?= GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'remark',
            'apartment',
            'phonenum',
            'logintime',
            'loginip',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete},{update}',
                'header' => 'Actions',
            ],

        ],
    ]
);
