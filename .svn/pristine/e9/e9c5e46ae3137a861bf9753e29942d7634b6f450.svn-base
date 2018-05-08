<?php

namespace app\modules\chongqingadmin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AdminSearch represents the model behind the search form about `trt\models\Business`.
 */
class PrizeSearch extends Prize
{
    public $wx_username;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            ['wx_username', 'safe'],
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
        $query = Prize::find();
        $query->joinWith(['config']);
        $query->joinWith(['user']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query->where('status > 0'),
        ]);
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        if ($this->status !== null) {
            $query->andfilterWhere([
                'status' => $this->status,
            ]);
        }

        $query->andFilterWhere(['like', '{{%ejiao2017chongqing_weixin_user}}.wx_username', $this->wx_username]);
        return $dataProvider;
    }
}
