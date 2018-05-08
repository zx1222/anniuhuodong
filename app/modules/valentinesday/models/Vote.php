<?php

namespace app\modules\valentinesday\models;

use Yii;

/**
 * This is the model class for table "{{%fathersday_vote}}".
 *
 * @property integer $id
 * @property string $openid
 * @property integer $photo_id
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
        return '{{%valentinesday_vote}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_id'], 'integer'],
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
            'photo_id' => '投票对象',
            'created_at' => '投票时间',
            'ip' => 'IP地址',
        ];
    }
}
