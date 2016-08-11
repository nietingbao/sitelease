<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/8/9
 * Time: 16:42
 */

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;


class UpdateCustomerForm extends Model
{
    public $username;
    public $password;
    public $repassword;
    public $remark;
    public $department;
    public $phonenum;
    public function rules(){
        return [
            [['username','phonenum','department'],'required','message' => '必填'],
            ['username','unique','targetClass' => 'app\models\User'],
            ['username','string','min' => 2,'max' => 20],
            ['password','string','min' => 5],
            ['repassword','compare','compareAttribute' => 'password','message' => '两次密码不一致'],
            ['remark','string','max'=>100],

        ];
    }
    
    public function updateCustomer(){
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

        $customer = new Customer();
        $customer->name = $this->username;
        $customer->remark = $this->remark;
        $customer->apartment = $this->department;
        $customer->phonenum = $this->phonenum;
        $customer->loginip = getIp();
        date_default_timezone_set('PRC');
        $customer->logintime = date("Y-m-d H:i:s");
        $customer->update();
    }
}