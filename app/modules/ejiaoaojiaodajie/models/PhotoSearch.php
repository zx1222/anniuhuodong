<?php

namespace app\modules\ejiaoaojiaodajie\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ejiaoaojiaodajie\models\Photo;

/**
 * PhotoSearch represents the model behind the search form about `app\modules\ejiaoaojiaodajie\models\Photo`.
 */
class PhotoSearch extends Photo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'prize_status', 'prize_pid', 'vote'], 'integer'],
            [['openid', 'old_photo', 'new_photo', 'desc', 'lukey_at', 'created_at', 'status'], 'safe'],
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
        $query = Photo::find();

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
            'prize_status' => $this->prize_status,
            'prize_pid' => $this->prize_pid,
            'lukey_at' => $this->lukey_at,
            'created_at' => $this->created_at,
            'vote' => $this->vote,
        ]);

        $query->andFilterWhere(['like', 'openid', $this->openid])
            ->andFilterWhere(['like', 'old_photo', $this->old_photo])
            ->andFilterWhere(['like', 'new_photo', $this->new_photo])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
