<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//如果是管理员之外的身份，功能就只有一部分
if(Yii::$app->user->getId() != 10)
    $this->context->layout = "layout2";

$this->title = '场地租赁系统';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-look">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--        <?//= Html::a('Create Site', ['create'], ['class' =>
//        'btn btn-success']) ?>-->
    </p>

    <?= GridView::widget([
        'summary' => "",
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'site_id',
            'site_name',
            'site_type',
            'site_galleryful',
            'site_facilities',
            [
                'label' => '操作',
                'format'=>'raw',
                'value' => function($data){
                    $url = "/sitelease/basic/web/reserve-with-gii/reserve";
                    return Html::a('预约', $url);
                }
            ],
       //     ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
