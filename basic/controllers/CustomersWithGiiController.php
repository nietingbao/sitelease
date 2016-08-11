<?php

namespace app\controllers;

use app\models\Apartment;
use app\models\CustomerForm;
use Yii;
use app\models\Customer;
use app\models\CustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\User;

/**
 * CustomersWithGiiController implements the CRUD actions for Customer model.
 */
class CustomersWithGiiController extends Controller
{
    public $layout = 'mylayout';
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
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
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CustomerForm();
        $customer = new Customer();
        if ($model->load(Yii::$app->request->post())) {
            $user = $model->signUp();//先注册新用户，（用户名和密码）
            $customer = $model->addCustomer();
            return $this->redirect(['view', 'id' => $customer->id]);
        } else {
            return $this->render('create', [
                'model' => $model,

            ]);
        }
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$username)//id是customers的id。username用于可能对user数据的修改
    {
        $model = new \app\models\UpdateCustomerForm();
        $customer = $this->findModel($id);//这是customer的model
        $user = \app\models\User::findOne(['username' => $username]);
        $model->username = $username;
        $model->remark = $customer->remark;
        $model->department = $customer->apartment;
        $model->phonenum = $customer->phonenum;
        if ($model->load(Yii::$app->request->post())) {
            function getIP() {
                if (getenv('HTTP_CLIENT_IP')) {
                    $ip = getenv('HTTP_CLIENT_IP');
                }
                elseif (getenv('HTTP_X_FORWARDED_FOR')) {
                    $ip = getenv('HTTP_X_FORWARDED_FOR');
                }
                elseif (getenv('HTTP_X_FORWARDED')) {
                    $ip = getenv('HTTP_X_FORWARDED');
                }
                elseif (getenv('HTTP_FORWARDED_FOR')) {
                    $ip = getenv('HTTP_FORWARDED_FOR');
                }
                elseif (getenv('HTTP_FORWARDED')) {
                    $ip = getenv('HTTP_FORWARDED');
                }
                else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                return $ip;
            }
            $customer->name = $model->username;
            $customer->remark = $model->remark;
            $customer->apartment = $model->department;
            $customer->phonenum = $model->phonenum;
            $customer->loginip = getIp();
            date_default_timezone_set("PRC");
            $customer->logintime = date("Y-m-d H:i:s");
            $customer->update();
            if(isset($model->password)){
                $user->password = $model->password;
                $user->update();
            }
            return $this->redirect(['view', 'id' => $customer->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'customer' => $customer,
            ]);
        }
    }

    /**
     * Deletes an existing Customer model.
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
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
