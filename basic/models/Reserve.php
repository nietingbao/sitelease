<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserve".
 *
 * @property integer $id
 * @property string $site
 * @property string $date
 * @property string $begintime
 * @property string $depart
 * @property string $operator
 * @property string $activity
 */
class Reserve extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserve';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site', 'date', 'begintime', 'depart', 'operator', 'activity'], 'required'],
            [['date', 'begintime'], 'safe'],
            [['site', 'depart', 'operator', 'activity'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'site' => '场地名称',
            'date' => '日期',
            'begintime' => '开始时间',
            'depart' => '部门名称',
            'operator' => '租借人',
            'activity' => '活动内容',
        ];
    }
}
