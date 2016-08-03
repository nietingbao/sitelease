<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/18
 * Time: 11:10
 *
 */?>
<?php
//如果是管理员之外的身份，功能就只有一部分

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
if(Yii::$app->user->getId() != 10)
    $this->context->layout = "layout2";
$this->title = '场地租赁系统';

\app\assets\AppAsset::register($this);
$this->registerCssFile('@web/css/login.css');
$this->registerJsFile('@web/javascript/jquery.min.js');
$this->registerJsFile('@web/javascript/showDate.js');
?>
<h1><?= Html::encode($this->title) ?></h1>
<form method="get" action = "<?php echo \yii\helpers\Url::to(['reserve-with-gii/reserve']);?>">
    <select name="year" id="year">
        <option value="2001" selected="selected">2001</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
    </select>
    年
    <select name="month" id="month">
        <option value="1" selected="selected">01</option>
        <option value="2">02</option>
        <option value="3">03</option>
        <option value="4">04</option>
        <option value="5">05</option>
        <option value="6">06</option>
        <option value="7">07</option>
        <option value="8">08</option>
        <option value="9">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
    </select>
    月
<!--    <input type="text" name="year">年-->
<!--    <input type="text" name="month">月-->
    <input type="submit">
</form>
<a id="abc" href="http://www.baidu.com">baidu</a>
<?php
$year=$month ="";
function test_input($data){

        $data = trim($data);//去除用户输入数据中不必要的字符（多余的空格、制表符、换行）
        $data = stripslashes($data);//删除用户输入数据中的反斜杠（\）
        $data = htmlspecialchars($data);//安全性检验
        return $data;

}
if(isset($_GET["year"])) {
    $year = (!empty(test_input($_GET["year"])) ? test_input($_GET["year"]) : null);
    $month = (!empty(test_input($_GET["month"])) ? test_input($_GET["month"]) : null);
}
else{
    $year=2001;
    $month=1;
}
?>
<script>
    if(<?=$year?>!=""){
        document.getElementById("year").value="<?= $year?>";
        document.getElementById("month").value="<?= $month?>";
    }

</script>
<?php

$days = getDays($year,$month);

function getDays($year,$month){
    $days = "";
    if($month == 2){
        if((($year%4==0)&&($year%100!=0))||($year%400==0))
        {
            $days=29;
        }
        else
            $days=28;
    }
    else if($month == 1||$month==3||$month==5||$month==7||$month==8||$month==10||$month
        ==12){
        $days = 31;
    }
    else $days = 30;
    return $days;
}
?>

<table class="table table-bordered" width="100%" cellpadding="0" cellspacing="0"
       class="con_tb sat_tb room border">
    <?php
    foreach($site as $sites){
    ?>
    <tr>
        <td rowspan="3" ><?= $sites->site_name?></td>
        <td>上午</td>
<?php
for($i=1;$i<=$days;$i++){
?>
    <td class="date"><a href=
           "/sitelease/basic/web/reserve-with-gii/create?&site=<?= $sites->site_name?>&p=1&date=<?= $year."-".$month."-".$i?>"
              ><?= $i?>
           </a></td>
<?php }?>
    </tr>
    <tr>
        <td>下午</td>
        <?php
        for($i=1;$i<=$days;$i++){
        ?>
        <td class="date"><a href=
               "/sitelease/basic/web/reserve-with-gii/create?&site=<?= $sites->site_name?>&p=2&date=<?= $year."-".$month."-".$i?>"
                >
                <?= $i?></a></td>
        <?php }?>
    </tr>
    <tr>
        <td>晚上</td>
        <?php
        for($i=1;$i<=$days;$i++){
        ?>
    <td class="date"><a href=
           "/sitelease/basic/web/reserve-with-gii/create?&site=<?= $sites->site_name?>&p=3&date=<?= $year."-".$month."-".$i?>"
            >
            <?= $i?></a></td>
        <?php }?>
    </tr>
    <?php }?>
</table>
