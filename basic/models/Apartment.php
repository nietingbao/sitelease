<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apartment".
 *
 * @property integer $id
 * @property string $name
 * @property string $site_to_lease
 */
class Apartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apartment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'site_to_lease'], 'required'],
            [['name'], 'string', 'max' => 20],
            [['site_to_lease'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '部门编号',
            'name' => '部门名称',
            'site_to_lease' => '可租用场地',
        ];
    }
}
