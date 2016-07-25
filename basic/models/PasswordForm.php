<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/22
 * Time: 16:31
 */

namespace app\models;


use yii\base\Model;
use yii\bootstrap\ActiveForm;

class PasswordForm extends Model
{
    public $password;
    public $pass1;
    public $pass2;
    public function rules()
    {
        return [
            ['password','required','message' => '密码不能为空'],
            ['password','string','min' => 5],
//            ['repassword','required','message' => '密码不能为空'],
//            ['repassword','string','min' => 5],
//            ['repassword','compare','compareAttribute' => 'password','message'=>'两次密码不一致'],
            [['pass1','pass2'],'required','message' =>'密码不能为空']
        ];
    }

}