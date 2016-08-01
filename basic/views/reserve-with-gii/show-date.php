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
use app\assets\AppAsset;
if(Yii::$app->user->getId() != 10)
    $this->context->layout = "layout2";
$this->title = '场地租赁系统';

AppAsset::register($this);
$this->registerJSFile('@web/javascript/showDate.js');

?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="dateInout">
    <form action="http://localhost/sitelease/basic/web/?r=reserve-with-gii/show-date" method="post">
        <label>年份</label>
        <input type="text" id="year">
        <label>月份</label>
        <input type="text" id="month">
        <input type="submit" value="确认提交">
    </form>
</div>

<?php echo $model->year ?>
<p>本月一共有<span id="test"></span></p>
<table class="table table-bordered" width="100%" cellpadding="0" cellspacing="0"
       class="con_tb sat_tb room border">
    <tr>
        <td rowspan="3" >204</td>
        <td>上午</td>
        <span id="date"></span>


        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create&id=1&date=2016-07-01&d=1">01</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">02</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">03</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">04</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">05</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">06</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">07</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">08</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">09</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">10</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">11</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">12</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">13</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">14</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">15</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">16</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">17</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">18</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">19</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">20</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">21</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">22</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">23</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">24</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">25</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">26</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">27</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">28</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">29</a> </td>-->
        <!--        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">30</a> </td>-->

    <tr>
        <td>下午</td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">01</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">02</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">03</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">04</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">05</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">06</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">07</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">08</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">09</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">10</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">11</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">12</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">13</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">14</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">15</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">16</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">17</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">18</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">19</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">20</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">21</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">22</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">23</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">24</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">25</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">26</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">27</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">28</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">29</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">30</a> </td>
    </tr>
    <tr>
        <td>晚上</td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">01</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">02</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">03</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">04</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">05</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">06</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">07</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">08</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">09</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">10</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">11</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">12</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">13</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">14</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">15</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">16</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">17</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">18</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">19</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">20</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">21</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">22</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">23</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">24</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">25</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">26</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">27</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">28</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">29</a> </td>
        <td><a href="/sitelease/basic/web/?r=reserve-with-gii/create">30</a> </td>
    </tr>
    </tr>
</table>
