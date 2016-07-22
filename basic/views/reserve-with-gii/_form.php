<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reserve */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserve-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'begintime')->textInput() ?>

    <?= $form->field($model, 'depart')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'operator')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'activity')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
