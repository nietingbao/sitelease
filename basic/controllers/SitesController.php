<?php

namespace app\controllers;

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
}