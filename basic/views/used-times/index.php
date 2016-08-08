<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsedTimesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//如果是管理员之外的身份，功能就只有一部分
if(Yii::$app->user->getId() != 10)
    $this->context->layout = "layout2";
$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
\app\assets\AppAsset::register($this);

$this->registerJsFile('@web/javascript/usedtimes.js');
?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <form method="get" action = "<?php echo \yii\helpers\Url::to(['used-times/index']);?>">
        请选择具体时间
        <select name="year" id="year">
            <option value="2001" selected="selected" id="year2001">2001</option>
            <option value="2010" id="year2010">2010</option>
            <option value="2011" id="year2011">2011</option>
            <option value="2012" id="year2012">2012</option>
            <option value="2013" id="year2013">2013</option>
            <option value="2014" id="year2014">2014</option>
            <option value="2015" id="year2015">2015</option>
            <option value="2016" id="year2016">2016</option>
            <option value="2017" id="year2017">2017</option>
            <option value="2018" id="year2018">2018</option>
            <option value="2019" id="year2019">2019</option>
        </select>
        年
        <select name="month" id="month">
            <option value="1" selected="selected" id="month01">01</option>
            <option value="2" id="month02">02</option>
            <option value="3" id="month03">03</option>
            <option value="4" id="month04">04</option>
            <option value="5" id="month05">05</option>
            <option value="6" id="month06">06</option>
            <option value="7" id="month07">07</option>
            <option value="8" id="month08">08</option>
            <option value="9" id="month09">09</option>
            <option value="10" id="month10">10</option>
            <option value="11" id="month11">11</option>
            <option value="12" id="month12">12</option>
        </select>
        月
        <input type="submit">
    </form>
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
        $year=date('Y');
        $month=(date('m')*1)/1;
    }
    ?>
    <script>
        if(<?=$year?>!=""){
            document.getElementById("year").value="<?= $year?>";
            document.getElementById("month").value="<?= $month?>";
        }

    </script>
    <p>
        <!--<?= Html::a('Create Used Times', ['create'], ['class' => 'btn btn-success']) ?>
        -->
    </p>
<table class="table table-bordered" width="100%" cellpadding="0" cellspacing="0"
class="con_tb sat_tb room border">
    <tr>
        <td>场地名称</td>
        <td>使用次数</td>
    </tr>
        <?php
        foreach($sites as $site){
        ?>
        <tr>
            <td><?= $site->site_name ?></td>

            <td id="usedtimes">
                <?php
                $hasusedtimes = 0;
                foreach($usedtimes as $ausedtimes){
                if($site->site_name==$ausedtimes->site_name)
                {
                    if(date('Y-m',strtotime($ausedtimes->date))
                        ==date('Y-m',strtotime($year."-".$month."-"."1")))
                        if($ausedtimes->used_times)
                        {
                            $hasusedtimes = 1;
                            echo $ausedtimes->used_times;
                        }
                    }
                }
                if(!$hasusedtimes)
                    echo 0;
                ?>
                </td>
        </tr>
        <?php
        }
        ?>
</table>




