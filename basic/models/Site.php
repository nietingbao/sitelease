<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site".
 *
 * @property integer $site_id
 * @property string $site_name
 * @property string $site_type
 * @property integer $site_galleryful
 * @property string $site_facilities
 */
class Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_name', 'site_type', 'site_galleryful', 'site_facilities'], 'required'],
            [['site_galleryful'], 'integer'],
            [['site_name', 'site_type'], 'string', 'max' => 20],
            [['site_facilities'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site_id' => 'Site ID',
            'site_name' => 'Site Name',
            'site_type' => 'Site Type',
            'site_galleryful' => 'Site Galleryful',
            'site_facilities' => 'Site Facilities',
        ];
    }
}
