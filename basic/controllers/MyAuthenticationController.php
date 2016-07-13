<?php
/**
 * Created by PhpStorm.
 * User: ÄôÍ¢±¦
 * Date: 2016/7/12
 * Time: 16:45
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Site;
use app\models\SiteSearch;
use yii\web\NotFoundHttpException;

class MyAuthenticationController extends Controller
{
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
            if(($model->validate())&&($model->user != null))
            {
                Yii::$app->user->login($model->user);
                return $this->render('//sites-with-gii/index',['dataProvider' => $dataProvider,
                    'searchModel' => $searchModel]);
            }
            else
            {
                $error = 'Username/password error';
            }

        }
        return $this->render('login-with-model',['model' => $model,'error' => $error]);
    }
}