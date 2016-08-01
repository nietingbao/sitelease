<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$this->registerCssFile('@web/css/layout.css');
$this->title = "场地租赁系统";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>场地租赁系统</title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="">

    <div class="">

        <div class="header">
            <div class = "logo">
                <img src="/sitelease/basic/web/picture/logo.gif";>
            </div>
            <div class="br">
                <br>
                <br>
            </div>
            <div class="welcome">欢迎你<strong>
                    <?= Yii::$app->session->get('username');?>
                </strong>场地租赁系统
                <div class="logout">
                    <?php echo Html::a('注销',['my-authentication/logout'],['class' => 'btn btn-
        warning']);?>
                </div>
            </div>

            <div class="br1">
                <br>
            </div>



        </div>

            <div class="nav">

            <ul class="nav nav-stacked nav-tabs" role="tablist">
<!--                <div class="mynav">-->
<!--                <li role="presentation"><a href="/sitelease/basic/web/?r=reserve-with-gii/index"-->
<!--                data-toggle = "tab">recent reserve</a></li>-->
<!--                </div>-->
<!--                    <div class="mynav">-->
<!--                <li role="presentation"><a href="/sitelease/basic/web/?r=reserve-with-gii/reserve"-->
<!--                     data-toggle = "tab">-->
<!--                        reserve</a></li>-->
<!--                    </div>-->
<!--                    <div class="mynav">-->
<!--                <li role="presentation" role="tab"><a href=-->
<!--                "/sitelease/basic/web/?r=sites-with-gii/index" data-toggle="tab"-->
<!--                     data-toggle = "tab">sites</a></li>-->
<!--                    </div>-->
<!--                        <div class="mynav">-->
<!--                <li role="presentation" data-toggle="tab" role="tab"><a href=-->
<!--                "/sitelease/basic/web/?r=customers-with-gii/index" data-toggle="tab"-->
<!--                      data-toggle = "tab">customers</a></li>-->
<!--                        </div>-->
<!--                            <div class="mynav">-->
<!--                <li role="presentation" data-toggle="tab" role="tab"><a href=-->
<!--                      "/sitelease/basic/web/?r=apartments-with-gii/index"-->
<!--                       data-toggle="tab">apartments</a></li>-->
<!--                            </div>-->

                <li role="presentation">
                    <a href=
                       "/sitelease/basic/web/reserve-with-gii/index"
                       data-toggle = "tab">最近预约</a></li>
                <li role="presentation">
                    <a href=
                       "/sitelease/basic/web/reserve-with-gii/reserve"
                       data-toggle = "tab">预约场地</a></li>
                <li role="presentation" data-toggle="tab" role="tab">
                    <a href=
                       "/sitelease/basic/web/sites-with-gii/look"
                       data-toggle="tab">查看场地</a></li>
                <li role="presentation" data-toggle="tab" role="tab">
                    <a href=
                       "/sitelease/basic/web/used-times/index"
                       data-toggle="tab">使用统计</a></li>
                <li role="presentation" role="tab">
                    <a href=
                       "/sitelease/basic/web/sites-with-gii/index"
                       data-toggle = "tab">场地管理</a></li>
                <li role="presentation" role="tab">
                    <a href=
                       "/sitelease/basic/web/customers-with-gii/index"
                       data-toggle = "tab">人员管理</a></li>
                <li role="presentation" data-toggle="tab" role="tab">
                    <a href=
                       "/sitelease/basic/web/apartments-with-gii/index"
                       data-toggle="tab">部门管理</a></li>
                <li role="presentation" data-toggle="tab" role="tab">
                    <a href=
                       "/sitelease/basic/web/change-password/change-password"
                       data-toggle="tab">修改密码</a></li>
                <li role="presentation" data-toggle="tab" role="tab">
                    <a href=
                       "/sitelease/basic/web/personal-info/view"
                       data-toggle="tab">个人信息</a></li>


            </ul>
            </div>
            <div class="content">
            <?= $content ?>
            </div>

    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
