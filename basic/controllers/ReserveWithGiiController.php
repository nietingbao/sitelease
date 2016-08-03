<?php

namespace app\controllers;

use Yii;
use app\models\Reserve;
use app\models\ReserveSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\YearForm;
use app\models\Site;
/**
 * ReserveWithGiiController implements the CRUD actions for Reserve model.
 */
class ReserveWithGiiController extends Controller
{
    public $layout = "mylayout";
    public $enableCsrfValidation = false;
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

    /*
     * 通过表单提交的数据来显示一个月的天数
     *
     *
     */
    public function actionShowDate(){
        $model = new YearForm();
        if($model->load(Yii::$app->request->post()))
            return $this->render('reserve',['model' => $model]);
//        $this->render('show-date',['year' => $year,'month' => $month]);
    }
    /**
     * Lists all Reserve models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReserveSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reserve model.
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
     * Creates a new Reserve model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reserve();
        $model->date = $_GET['date'];
        $model->site = $_GET['site'];
        if($_GET['p']==1)
            $model->beginperiod = "上午";
        if($_GET['p']==2)
            $model->beginperiod = "下午";
        if($_GET['p']==3)
            $model->beginperiod = "晚上";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reserve model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reserve model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionReserve(){
        $site = new Site();
        $site = Site::find()->all();
        $reserve = new Reserve();
        $reserve = Reserve::find()->all();
        return $this->render('reserve',['site' => $site,'reserve'=>$reserve]);
    }
    /**
     * Finds the Reserve model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reserve the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reserve::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
