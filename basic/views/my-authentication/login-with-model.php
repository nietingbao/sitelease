<?php

use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
use \yii\bootstrap\Alert;
?>

<?php
if($error != null)
{
    echo Alert::widget(['options' => ['class' => 'alert-danger'],'body' => $error]);
}
?>

<?php if(Yii::$app->user->isGuest)
{?>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>


    <?php echo $form->field($model,'username'); ?>
    <?php echo $form->field($model,'password')->passwordInput(); ?>

    <div class="form-group">
        <?php echo Html::submitButton('Login',['class' => 'btn btn-primary','name' =>
            'login-button']); ?>
    </div>


    <?php ActiveForm::end(); ?>

<?php } else { ?>
<!-- <h2>you are authenticated!</h2>-->
<?= $this->redirect(['/customers-with-gii/index']); ?>
<?php echo Html::a('Logout',['my-authentication/logout'],['class' => 'btn btn-
    warning']);?>
<?php } ?>