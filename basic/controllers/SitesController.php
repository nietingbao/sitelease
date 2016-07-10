<?php

namespace app\controllers;

use app\models\Site;
use Yii;
use yii\web \Controller;

class SitesController extends Controller
{
    public function actionIndex()
    {
        $sql = 'select * from site';
        $db = Yii::$app->db;
        $sites=$db->createCommand($sql)->queryAll();
        return $this->render('index',['sites' => $sites]);
    }

    public function actionCreate()
    {
        $model = new Site();
        $modelCanSave = false;
        if($model->load(Yii::$app->request->post())&&$model->validate())
        {
          $modelCanSave=true;
        }
        return $this->render('create',[
        'model' => $model,
        'modelCanSave' => $modelCanSave
    ]);
    }
}