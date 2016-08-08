<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?=Html::a('Create Site', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'summary'=>"",
        'dataProvider' => $dataProvider,
     //   'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'site_id',
            'site_name',
            'site_type',
            'site_galleryful',
            'site_facilities',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
