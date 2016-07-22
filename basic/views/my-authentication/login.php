<?php
/**
 * Created by PhpStorm.
 * User: ÄôÍ¢±¦
 * Date: 2016/7/12
 * Time: 17:03
 */

use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;

use \yii\bootstrap\Alert;
?>

<?php
//if($error != null)
//{
//    echo Alert::widget(['options' => ['class' => 'alert-danger'],'body' => $error]);
//}
//?>

<?php
if(Yii::$app->user->isGuest)
{?>
    <?php ActiveForm::begin(); ?>

    <div class="form-group">
        <?php echo Html::label('Password','password'); ?>
        <?php echo Html::passwordInput('password','',['class' => 'form-control']); ?>
    </div>

    <?php echo Html::submitButton('Login',['class' => 'btn btn-primary']); ?>

    <?php ActiveForm::end(); ?>

<?php } else { ?>
    <h2>sdas</h2>
<?php } ?>