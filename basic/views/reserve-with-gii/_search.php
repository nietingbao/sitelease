<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReserveSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserve-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'site') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'begintime') ?>

    <?= $form->field($model, 'depart') ?>

    <?php // echo $form->field($model, 'operator') ?>

    <?php // echo $form->field($model, 'activity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
