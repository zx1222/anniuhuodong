<?php

namespace app\modules\zhengwen\models;

use Yii;

/**
 * This is the model class for table "{{%prize_pool}}".
 *
 * @property integer $pid
 * @property integer $aid
 * @property integer $status
 * @property string $openid
 * @property string $ip
 * @property string $order
 * @property string $created_at
 */
class PrizePool extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zhengwen_prize_pool}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'aid', 'status'], 'integer'],
            [['pid', 'aid', 'openid', 'ip','created_at', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pid' => 'Pid',
            'aid' => 'Aid',
            'status' => 'Status',
            'openid' => 'Openid',
            'ip' => 'Ip',
            'order' => 'Order',
            'created_at' => 'Created At',
        ];
    }
}
