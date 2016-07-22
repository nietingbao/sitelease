<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsedTimesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Used Times';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="used-times-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Used Times', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'site_name',
            'used_times',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
