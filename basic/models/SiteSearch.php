<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Site;

/**
 * SiteSearch represents the model behind the search form about `app\models\Site`.
 */
class SiteSearch extends Site
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_id', 'site_galleryful'], 'integer'],
            [['site_name', 'site_type', 'site_facilities'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Site::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'site_id' => $this->site_id,
            'site_galleryful' => $this->site_galleryful,
        ]);

        $query->andFilterWhere(['like', 'site_name', $this->site_name])
            ->andFilterWhere(['like', 'site_type', $this->site_type])
            ->andFilterWhere(['like', 'site_facilities', $this->site_facilities]);

        return $dataProvider;
    }
}
