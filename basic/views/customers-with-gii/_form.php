<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Apartment;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">
    <?php
    $form = ActiveForm::begin()
    ?>
    <?= $form->field($model,'username')->textInput()->label("用户名"); ?>
    <?= $form->field($model,'password')->passwordInput()->label("密码");?>
    <?= $form->field($model,'repassword')->passwordInput()->label("确认密码");?>
    <?= $form->field($model,'remark')->textInput()->label("备注");?>
    <?= $form->field($model,'department')->dropDownList(
        \yii\helpers\ArrayHelper::map(Apartment::find()->all(),'name','name')
    );?>
    <?= $form->field($model,'phonenum')->textInput()->label("联系方式");?>
    <div class="form-group">
        <?= Html::submitButton() ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
