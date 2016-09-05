<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/8/12
 * Time: 10:03
 */

namespace app\models;


use yii\base\Model;

class PersonalInfoForm extends Model
{
    public $username;
    public $remark;
    public $department;
    public $phonenum;
    public function rules()
    {
        return [
            [['username','phonenum'],'required','message' => '必填'],
            [['remark','department'],'string','max' => '50'],
        ];
    }
}