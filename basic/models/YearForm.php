<?php
/**
 * Created by PhpStorm.
 * User: 聂廷宝
 * Date: 2016/7/30
 * Time: 15:39
 */

namespace app\models;

use Yii;
use yii\base\Model;


class YearForm extends Model
{
    public $year;
    public $month;
    public function rules(){
        return [
            [['year','month'],'required','message'=>"必填"],
        ];
    }
}
