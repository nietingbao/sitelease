<?php
/**
 * Created by PhpStorm.
 * User: ÄôÍ¢±¦
 * Date: 2016/7/10
 * Time: 11:11
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\url;
use yii\helpers\ArrayHelper;
?>

<?php if($modelCanSave) { ?>
<div class="alert alert-success">
    Model ready to be saved!
</div>
<?php }?>


<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Site Form</h1>
        <?= $form->field($model,'site_name')->textInput() ?>
        <?= $form->field($model,'site_type')->textInput() ?>
        <?= $form->field($model,'site_galleryful')->textInput() ?>
        <?= $form->field($model,'site_facilities')->textarea() ?>
    </div>
</div>


<div class="form-group">
    <?= Html::submitButton('Create',['class' => 'btn btn-success'])?>
</div>
<?php ActiveForm::end() ?>
