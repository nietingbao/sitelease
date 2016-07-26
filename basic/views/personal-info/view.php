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

$this->title = 'personal info';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-info">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $customer->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $customer->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<!--    --><?//= DetailView::widget([
//        'customer' => $customer,
//        'attributes' => [
//            'id',
//            'name',
//            'remark',
//            'apartment',
//            'phonenum',
//            'logintime',
//            'loginip',
//        ],
//    ]) ?>
    <?= $customer->name;?>
    <?= $customer->phonenum;?>

</div>
