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

    <?= $form->field($model, 'beginperiod')->textInput() ?>

    <?php if($model->beginperiod=="上午")
        echo $form->field($model, 'begintime')->dropDownList([
        '60000'=>'06:00',
    '70000'=>'07:00',
    '80000'=>'08:00',
    '90000'=>'09:00',
    '100000'=>'10:00',
    '110000'=>'11:00']);
    if($model->beginperiod=="下午")
        echo $form->field($model, 'begintime')->dropDownList([
            '140000'=>'14:00',
            '150000'=>'15:00',
            '160000'=>'16:00',
            '170000'=>'17:00',
            '180000'=>'18:00',
            ]);
    if($model->beginperiod=="晚上")
        echo $form->field($model, 'begintime')->dropDownList([
            '190000'=>'19:00',
            '200000'=>'20:00',
            '210000'=>'21:00',
            '220000'=>'22:00',
        ])?>

    <?= $form->field($model, 'depart')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'operator')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'activity')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
