<?php
/**
 * Created by PhpStorm.
 * User: ��͢��
 * Date: 2016/7/12
 * Time: 16:45
 */

namespace app\controllers;

use app\models\SignUpForm;
use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Site;
use app\models\SiteSearch;
use yii\web\NotFoundHttpException;

class MyAuthenticationController extends Controller
{
    public $layout = "mylayout";
    public $css = ['css/login.css'];
    public function actionLogin()
    {
        $error = null;
        $username = Yii::$app->request->post('username',null);
        $password = Yii::$app->request->post('password',null);

        $user = User::findByUsername($username);

        if(($username != null)&&($password != null))
        {
            if($user != null)
            {
                if($user->validatePassword($password))
                {
                    Yii::$app->user->login();
                }
                else
                {
                    $error = 'Password validation failed!';
                }
            }
        }
        else
        {
            $error = 'User not found!';
        }
        return $this->render('login',['error' => $error]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['login-with-model']);
    }

    public function actionLoginWithModel()
    {
        $searchModel = new SiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $error = null;
        $model = new \app\models\LoginForm();
        if($model->load(Yii::$app->request->post())){
            if(($model->validate()))
            {
                $model->login();
                if($model->username == 'admin'){
                    return $this->redirect('/sitelease/basic/web/?r=reserve-with-gii/index');
                }
                else
                {
                    $this->layout = "layout2";
                    return $this->redirect('/sitelease/basic/web/?r=reserve-with-gii/reserve');
                }
            }
            else
            {
                $error = 'Username/password error';
            }
        }
        return $this->render('login-with-model',['model' => $model,'error' => $error]);
    }

    public function actionSignUp(){
        $model = new SignUpForm();
        if($model->load(Yii::$app->request->post()))
        {
            if($user = $model->signUp())
            {

                return $this->redirect('/sitelease/basic/web/?r=sites-with-gii/index');
            }
            else
            {
                var_dump($user);
            }
        }
        return $this->render('sign-up',['model' => $model]);
    }
}