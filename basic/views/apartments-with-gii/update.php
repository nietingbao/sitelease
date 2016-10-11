<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apartment */

$this->title = 'Update Apartment: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Apartments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apartment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_updateform', [
        'model' => $model,//需要场地；
        'all_sites' => $all_sites,
        'depart_sites' =>$depart_sites,
    ]) ?>

</div>
