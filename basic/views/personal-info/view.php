<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/25
 * Time: 16:31
 */

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $customer app\models\Customer */

//如果是管理员之外的身份，功能就只有一部分
if(Yii::$app->user->getId() != 10)
    $this->context->layout = "layout2";

$this->title = 'personal info';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-info">



    <?= DetailView::widget([
        'model' => $customer,
        'attributes' => [
            'id',
            ['label'=>'用户名','value'=>$customer->name],
            ['label'=>'备注','value'=>$customer->remark],
            ['label'=>'部门','value'=>$customer->apartment],
            ['label'=>'电话','value'=>$customer->phonenum],
        ],
    ]) ?>



</div>
