<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "used_times".
 *
 * @property integer $id
 * @property string $date
 * @property string $site_name
 * @property integer $used_times
 */
class UsedTimes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'used_times';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'required'],
            [['date'], 'safe'],
            [['used_times'], 'integer'],
            [['site_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'site_name' => 'Site Name',
            'used_times' => 'Used Times',
        ];
    }
}
