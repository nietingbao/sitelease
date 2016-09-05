<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/25
 * Time: 15:33
 */

namespace app\controllers;

use app\models\PersonalInfoForm;
use app\models\User;
use Yii;
use yii\web\Controller;
use app\models\Customer;

class PersonalInfoController extends Controller
{
    public $layout = "mylayout";
    public function actionView(){
        $user = User::findOne(['id' => Yii::$app->user->getId()]);
        $username = $user->username;
        $customer = Customer::findOne(['name' => $username]);
        $model = new PersonalInfoForm();
        $model->username = $customer->name;
        $model->remark = $customer->remark;
        $model->department = $customer->apartment;
        $model->phonenum = $customer->phonenum;
        if($model->load(Yii::$app->request->post()))
        {
            $customer->phonenum = $model->phonenum;
            $customer->update();
        }
        if($user != null);
        {
            return $this->render('view',['model' => $model]);
        }
    }
}