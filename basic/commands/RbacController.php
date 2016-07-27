<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/26
 * Time: 15:18
 */

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit(){
        $auth = Yii::$app->authManager;

        //添加公共权限
        //添加reserve预约权限
        $reserve = $auth->createPermission('reserve');
        $reserve->description = '添加预约';
        $auth->add($reserve);

        //添加sites场地管理权限
        $sites = $auth->createPermission('sites');
        $sites->description = '场地管理';
        $auth->add($sites);

        //添加personnalInfo个人信息管理权限
        $personalInfo = $auth->createPermission('personalInfo');
        $personalInfo->description = '个人信息管理';
        $auth->add($personalInfo);

        //添加changePassword修改密码权限
        $changePassword = $auth->createPermission('changePassword');
        $changePassword->description ='修改密码';
        $auth->add($changePassword);

        //添加管理员权限
        //添加recentReserve权限
        $recentReserve = $auth->createPermission('recentReserve');
        $recentReserve->description = '最近预约';
        $auth->add($recentReserve);

        //添加customers人员管理权限
        $customers = $auth->createPermission('customers');
        $customers->description = '人员管理';
        $auth->add($customers);

        //添加apartment部门管理权限
        $apartment = $auth->createPermission('apartment');
        $apartment->description = '部门管理';
        $auth->add($apartment);

        //添加usedTimes使用统计权限
        $usedTimes = $auth->createPermission('usedTimes');
        $usedTimes->description = '使用统计';
        $auth->add($usedTimes);

        //添加角色
        //添加普通用户角色并赋予权限
        $teacher = $auth->createRole('teacher');
        $auth->add($teacher);
        //赋予老师各种权限
        $auth->addChild($teacher,$reserve);
        $auth->addChild($teacher,$personalInfo);
        $auth->addChild($teacher,$changePassword);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        //赋予管理员权限
//        $auth->addChild($admin,$reserve);
//        $auth->addChild($admin,$personalInfo);
//        $auth->addChild($admin,$changePassword);
        $auth->addChild($admin,$teacher);
        $auth->addChild($admin,$recentReserve);
        $auth->addChild($admin,$apartment);
        $auth->addChild($admin,$customers);
        $auth->addChild($admin,$sites);
        $auth->addChild($admin,$usedTimes);

        //为用户指派角色
        $auth->assign($teacher,9);//为登录的表中id为9用户授权
        $auth->assign($admin,10);
    }
}