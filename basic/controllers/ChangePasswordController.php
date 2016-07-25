<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/22
 * Time: 16:49
 */

namespace app\controllers;

use app\models\User;
use Yii;
use yii\web\Controller;
use app\models\PasswordForm;

class ChangePasswordController extends Controller
{
    public $layout = "mylayout";
    public function actionChangePassword(){
        $model=new PasswordForm;
        if($model->load(Yii::$app->request->post())){
            $id = YII::$app->user->getId();
            $user=  User::findIdentity($id);
            $password = $user->password;
            if($password == $model->password){
                if($model->pass1 == $model->pass2){
                    $newPass = $model->pass1;
                    $connection = \Yii::$app->db;
                    $r = $connection->createCommand()->update('user',
                        ['password' => $newPass], 'id='.$id)->execute();
                    if($r){
                        Yii::$app->user->logout();
                        return $this->goHome();//应该改为跳转到修改成功的一个界面或者是一个提示；
                    }else{
                        echo 'dasdasdas';
                        return $this->goBack();
                    }
                }
            }else{
                Yii::$app->session->setFlash('contact','旧密码错误');
                return $this->redirect(array('change-password/index'));
            }
        }else{
            return $this->render('index',['model'=>$model]);
        }
    }
}