<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reserve;

/**
 * ReserveSearch represents the model behind the search form about `app\models\Reserve`.
 */
class ReserveSearch extends Reserve
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['site', 'date', 'begintime', 'depart', 'operator', 'activity'], 'safe'],
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
        $query = Reserve::find()->where(['>=','date',date('Y-m-d')])->orderBy('date');

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
            'begintime' => $this->begintime,
        ]);

        $query->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'depart', $this->depart])
            ->andFilterWhere(['like', 'operator', $this->operator])
            ->andFilterWhere(['like', 'activity', $this->activity]);

        return $dataProvider;
    }
}
