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
 * @property string $beginperiod
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
            [['site', 'date', 'begintime','beginperiod'], 'required'],
            [['date', 'begintime'], 'safe'],
            [['site', 'depart', 'operator', 'activity'], 'string', 'max' => 20],
            [['beginperiod'], 'string', 'max' => 10],
            [['operator', 'activity', 'depart',],'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'site' => '场地名称',
            'date' => '日期',
            'begintime' => '开始时间',
            'depart' => '部门',
            'operator' => '租借人',
            'activity' => '活动内容',
            'beginperiod' => '租借开始时段',
        ];
    }
}
