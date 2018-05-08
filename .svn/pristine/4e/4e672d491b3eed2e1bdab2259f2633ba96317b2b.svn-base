<?php

namespace app\modules\anniuzhengwen\models;

use Yii;

/**
 * This is the model class for table "{{%anniuzhengwen_vote}}".
 *
 * @property integer $id
 * @property string $openid
 * @property integer $article_id
 * @property string $created_at
 * @property string $ip
 */
class Vote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anniuzhengwen_vote}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id'], 'integer'],
            [['created_at'], 'safe'],
            [['openid'], 'string', 'max' => 32],
            [['ip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => '用户openid',
            'article_id' => '投票对象',
            'created_at' => '投票时间',
            'ip' => 'IP地址',
        ];
    }
}
