<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReserveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//如果是管理员之外的身份，功能就只有一部分
if(Yii::$app->user->getId() != 10)
    $this->context->layout = "layout2";
$this->title = 'Reserves';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserve-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--/*Html::a('Create Reserve', ['create'],-->
<!--    /*      ['class' => 'btn btn-success'])-->
<!--    </p>-->

    <?= GridView::widget([
        'summary'=>"",
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'site',
            'date',
            'begintime',
            'depart',
            // 'operator',
            // 'activity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
