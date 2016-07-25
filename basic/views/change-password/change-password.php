<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/22
 * Time: 17:06
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
\app\assets\AppAsset::register($this);
$this->registerCssFile('@web/css/login.css');
?>

<?php $form = ActiveForm::begin(['id' => 'change-password-form']); ?>
<img src="/sitelease/basic/web/picture/logIn_logo.png">
<?php echo $form->field($model,'password')->label('用户名'); ?>
<?php echo $form->field($model,'pass1')->passwordInput()->label('新密码'); ?>
<?php echo $form->field($model,'pass2')->passwordInput()->label('请再输出一次新密码'); ?>
<div class="form-inline">
    <?php echo Html::submitButton('Change Password',['class' => 'btn btn-primary','name' =>
        'changepassword-button']); ?>
</div>
<?php ActiveForm::end(); ?>
