<?php

namespace app\controllers;

use app\models\Site;
use Yii;
use app\models\Apartment;
use app\models\ApartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApartmentsWithGiiController implements the CRUD actions for Apartment model.
 */
class ApartmentsWithGiiController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout = "mylayout";
    public $nav = 1;//用于前端判断导航栏的样式；
    public function behaviors()
    {

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Apartment models.
     * @return mixed
     */
    public function actionIndex()
    {
        global $nav;
        $searchModel = new ApartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'nav' => $nav,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Apartment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Apartment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $all_sites = new Site();
        $all_sites = Site::find()->all();
        $model = new Apartment();
        function test_input($data){
            $data = trim($data);//去除用户输入数据中不必要的字符（多余的空格、制表符、换行）
            $data = stripslashes($data);//删除用户输入数据中的反斜杠（\）
            $data = htmlspecialchars($data);//安全性检验
            return $data;
        }
        if(isset($_POST["name"])) {
            $name = (!empty(test_input($_POST["name"])) ? test_input($_POST["name"]) : null);
            $sites=implode(" ",$_POST['sites']);
            $model->name = $name;
            $model->site_to_lease = $sites;
            $model->save();
            var_dump($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else{
            return $this->render('create', [
                'model' => $model,
                'all_sites' => $all_sites,
            ]);
        }



//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
    }

    /**
     * Updates an existing Apartment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        function test_input($data){
            $data = trim($data);//去除用户输入数据中不必要的字符（多余的空格、制表符、换行）
            $data = stripslashes($data);//删除用户输入数据中的反斜杠（\）
            $data = htmlspecialchars($data);//安全性检验
            return $data;
        }

        $all_sites = new Site();
        $sites = explode(" ",$model->site_to_lease);
        $all_sites = Site::find()->all();
        $depart_sites = Site::find()->where(['in','site_name',$sites])->all();
        if(isset($_POST["sites"])) {
//            $name = (!empty(test_input($_POST["name"])) ? test_input($_POST["name"]) : null);
//            $sites=implode(" ",$_POST["sites"]);
//            $model->name = $name;
            $site = implode(" ",$_POST["sites"]);
            $model->site_to_lease = $site;
            $model->update();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            return $this->render('update', [
                'model' => $model,
                'all_sites' => $all_sites,//所有场地
                'depart_sites' => $depart_sites,//该部门可以预约的场地；
            ]);
        }
    }

    /**
     * Deletes an existing Apartment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Apartment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apartment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apartment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
