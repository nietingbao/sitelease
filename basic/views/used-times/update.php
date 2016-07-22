<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsedTimes */

$this->title = 'Update Used Times: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Used Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="used-times-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
