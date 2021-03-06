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
//如果是管理员之外的身份，功能就只有一部分
if(Yii::$app->user->getId() != 10)
    $this->context->layout = "layout2";

\app\assets\AppAsset::register($this);
$this->registerCssFile('@web/css/login.css');
?>

<?php $form = ActiveForm::begin(['id' => 'change-password-form']); ?>

<?php echo $form->field($model,'password')->passwordInput()->label('原密码'); ?>
<?php echo $form->field($model,'pass1')->passwordInput()->label('新密码'); ?>
<?php echo $form->field($model,'pass2')->passwordInput()->label('请再输出一次新密码'); ?>
<div class="form-inline">
    <?php echo Html::submitButton('修改密码',['class' => 'btn btn-primary','name' =>
        'changepassword-button']); ?>
</div>
<?php ActiveForm::end(); ?>
