<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Apartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apartment-form">
    <form action="create" method="post">
        部门名称:<input type="text" name="name">
        <br>
        可租用场地:

        <?php
        foreach($all_sites as $sites) {
            ?>
            <br>
            <input type="checkbox" name="sites[]" value="<?= $sites->site_name ?>"><?= $sites->site_name ?>
            <?php
        }
        ?>
        <input type="submit" value="确认">
    </form>
</div>
