<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $remark
 * @property string $apartment
 * @property string $phonenum
 * @property string $logintime
 * @property string $loginip
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'remark', 'apartment', 'phonenum', 'logintime', 'loginip'], 'required'],
            [['logintime'], 'safe'],
            [['name', 'apartment', 'phonenum', 'loginip'], 'string', 'max' => 50],
            [['remark'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'remark' => 'Remark',
            'apartment' => 'Apartment',
            'phonenum' => 'Phonenum',
            'logintime' => 'Logintime',
            'loginip' => 'Loginip',
        ];
    }
}