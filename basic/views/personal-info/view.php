<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/25
 * Time: 16:31
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $customer app\models\Customer */

//如果是管理员之外的身份，功能就只有一部分
if(Yii::$app->user->getId() != 10)
    $this->context->layout = "layout2";

//$this->title = 'personal info';
//$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-info">
    <?php $form = ActiveForm::begin();?>

    <?= $form->field($model, 'username')->textInput()->label("用户名");?>
    <?= $form->field($model, 'remark')->textInput()->label("备注");?>
    <?= $form->field($model, 'department')->textInput()->label("部门");?>
    <?= $form->field($model, 'phonenum')->textInput()->label("电话");?>
    <div class="form-group">
        <?= Html::submitButton() ?>
    </div>
    <?php ActiveForm::end();?>

</div>
