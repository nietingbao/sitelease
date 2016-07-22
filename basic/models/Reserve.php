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
            'id' => 'ID',
            'site' => 'Site',
            'date' => 'Date',
            'begintime' => 'Begintime',
            'depart' => 'Depart',
            'operator' => 'Operator',
            'activity' => 'Activity',
        ];
    }
}
