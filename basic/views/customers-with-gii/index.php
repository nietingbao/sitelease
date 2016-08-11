<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
         <?=Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'summary'=>"",
        'dataProvider' => $dataProvider,
    //    'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name',
            'remark',
            'apartment',
            'phonenum',
            'logintime',
            // 'loginip',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update},{delete}',
                'buttons' => [
                    'update' => function($url,$model,$key){
                        $url = 'update?id='.$model->id.'&username='.$model->name;//
                        return Html::a('修改',$url);
                    }
                ],
            ],
        ],
    ]); ?>

</div>
