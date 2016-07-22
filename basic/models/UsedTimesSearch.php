<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsedTimes;

/**
 * UsedTimesSearch represents the model behind the search form about `app\models\UsedTimes`.
 */
class UsedTimesSearch extends UsedTimes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'used_times'], 'integer'],
            [['date', 'site_name'], 'safe'],
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
        $query = UsedTimes::find();

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
            'id' => $this->id,
            'date' => $this->date,
            'used_times' => $this->used_times,
        ]);

        $query->andFilterWhere(['like', 'site_name', $this->site_name]);

        return $dataProvider;
    }
}
