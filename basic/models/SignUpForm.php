<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/22
 * Time: 11:02
 */

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class SignUpForm extends Model
{
//    public $id;
    public $username;
    public $password;
    public $repassword;

    public function rules(){
        return [
            ['username','required','message' => '用户名不能为空'],
            ['username','unique','targetClass' => 'app\models\User'],
            ['username','string','min' => 2,'max' => 20],
            ['password','required','message' => '密码不能为空'],
            ['password','string','min' => 5],
            ['repassword','required','message' => '请再输一次密码'],
            ['repassword','compare','compareAttribute' => 'password','message' => '两次密码不一致'],
        ];
    }

    public function signUp(){
        if($this -> validate())
        {
            $user = new User();
            $user->username = $this->username;
            $user->password = $this->password;
            if($user->save())
            {
                //给新注册的成员赋予老师的角色
                $auth = Yii::$app->authManager;
                $teacherRole = $auth->getRole('teacher');
                $auth->assign($teacherRole,$user->getId());
                return $user;

            }
        }
        return false;
    }
}