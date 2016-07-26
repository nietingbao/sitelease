<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/22
 * Time: 11:30
 */
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>
<?php
\app\assets\AppAsset::register($this);
$this->registerCssFile('@web/css/login.css');
?>

<?php if(Yii::$app->user->isGuest)
{?>
    <?php $form = ActiveForm::begin(['id' => 'sign-up-form']); ?>
    <img src="/sitelease/basic/web/picture/logIn_logo.png">
    <?php echo $form->field($model,'username')->label('用户名'); ?>
    <?php echo $form->field($model,'password')->passwordInput()->label('密码'); ?>
    <?php echo $form->field($model,'repassword')->passwordInput()->label('再输入一次密码'); ?>
    <div class="form-group">
        <?php echo Html::submitButton('Sign Up',['class' => 'btn btn-primary','name' =>
            'signup-button']); ?>
    </div>
    <?php ActiveForm::end(); ?>

<?php } else { ?>
    <!-- <h2>you are authenticated!</h2>-->
<!--    --><?//= $this->redirect(['/customers-with-gii/index']); ?>
    <?php echo Html::a('Logout',['my-authentication/logout'],['class' => 'btn btn-
    warning']);?>
<?php } ?>
