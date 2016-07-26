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

<?php
\app\assets\AppAsset::register($this);
$this->registerCssFile('@web/css/login.css');
?>

<?php if(Yii::$app->user->isGuest)
{?>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <img src="/sitelease/basic/web/picture/logIn_logo.png">
        <?php echo $form->field($model,'username')->label('用户名'); ?>
<!--    </div>-->
<!--    <div class="form-inline">-->

        <?php echo $form->field($model,'password')->passwordInput()->label('密码'); ?>


        <div class="form-inline">
        <?php echo Html::submitButton('Login',['class' => 'btn btn-primary','name' =>
            'login-button']); ?>
        </div>
    <?php ActiveForm::end(); ?>
    <?php echo Html::a('sign up',['my-authentication/sign-up'])
    ; ?>

<?php } else { ?>
<!-- <h2>you are authenticated!</h2>-->
<?php //echo $this->redirect('customers-with-gii/index'); ?>
<?php echo Html::a('Logout',['my-authentication/logout'],['class' => 'btn btn-
    warning']);?>
<?php } ?>