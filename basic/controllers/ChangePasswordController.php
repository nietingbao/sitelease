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
    public function actionChangePassword(){
        $model=new PasswordForm;
        $request = YII::$app->request;

        if($request->isPost){
            $p = $request->post('PasswordForm');
            $id = YII::$app->user->id;
            echo $id;
            var_dump(Yii::$app->user->identity);

            $admin=  User::findIdentity($id);

            $password = $admin->password;
            if(Yii::$app->validatePassword($p['password'], $password)){
                if($p['pass1'] == $p['pass2']){
                    $newPass = $p['pass1'];
                    $connection = \Yii::$app->db;
                    $r = $connection->createCommand()->update('user', ['password' => $newPass], 'id='.$id)->execute();
                    if($r){
                        Yii::$app->user->logout();
                        return $this->goHome();
                    }else{
                        return $this->goBack();
                    }
                }
            }else{
                Yii::$app->session->setFlash('contact','旧密码错误');
                return $this->redirect(array('site/password'));
            }
        }else{
            return $this->render('change-password',['model'=>$model]);
        }
    }
}