<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'apartment')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'phonenum')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'logintime')->textInput() ?>

    <?= $form->field($model, 'loginip')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
