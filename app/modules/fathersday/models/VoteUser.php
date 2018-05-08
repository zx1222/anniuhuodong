<?php

namespace app\modules\fathersday\models;

use Yii;

/**
 * This is the model class for table "{{%fathersday_vote_user}}".
 *
 * @property string $openid
 * @property string $created_at
 * @property integer $vote1
 * @property integer $vote2
 * @property integer $vote3
 */
class VoteUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fathersday_vote_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['openid', 'created_at'], 'required'],
            [['created_at'], 'safe'],
            [['vote1', 'vote2', 'vote3'], 'integer'],
            [['openid'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'openid' => '用户openid',
            'created_at' => '投票时间',
            'vote1' => 'Vote1',
            'vote2' => 'Vote2',
            'vote3' => 'Vote3',
        ];
    }
}
