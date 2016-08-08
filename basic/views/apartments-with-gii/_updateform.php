<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apartment-form">

    <form action="update?id=<?=$_GET['id']?>" method="post">
        部门名称aa:<input type="text" name="name">
        可租用场地:
        <input type="checkbox" name="sites[]" value="201">201&nbsp;&nbsp;
        <input type="checkbox" name="sites[]" value="302">302
        <input type="submit" value="确认">

    </form>


</div>
