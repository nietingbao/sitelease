<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsedTimes */

$this->title = 'Create Used Times';
$this->params['breadcrumbs'][] = ['label' => 'Used Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="used-times-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
