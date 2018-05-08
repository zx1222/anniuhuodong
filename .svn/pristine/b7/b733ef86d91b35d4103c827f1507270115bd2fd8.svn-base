<?php

namespace app\modules\ejiaotiebiaoqianadmin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianConfig;

/**
 * EjiaotiebiaoqianConfigSearch represents the model behind the search form about `app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianConfig`.
 */
class EjiaotiebiaoqianConfigSearch extends EjiaotiebiaoqianConfig
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'praisenumber', 'chance'], 'integer'],
            [['praisefeild', 'praisename', 'min', 'max', 'praisecontent', 'praiseimage'], 'safe'],
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
        $query = EjiaotiebiaoqianConfig::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'praisenumber' => $this->praisenumber,
            'chance' => $this->chance,
        ]);

        $query->andFilterWhere(['like', 'praisefeild', $this->praisefeild])
            ->andFilterWhere(['like', 'praisename', $this->praisename])
            ->andFilterWhere(['like', 'min', $this->min])
            ->andFilterWhere(['like', 'max', $this->max])
            ->andFilterWhere(['like', 'praisecontent', $this->praisecontent])
            ->andFilterWhere(['like', 'praiseimage', $this->praiseimage]);

        return $dataProvider;
    }
}
