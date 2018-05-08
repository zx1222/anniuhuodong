<?php

namespace app\modules\chongqingadmin\models;

class Prize extends \yii\db\ActiveRecord
{
    const STATUS_PRIZE_NO = 0;

    const STATUS_PRIZE_YES = 1;

    const STATUS_PRIZE_SEND = 100;

    /**
     * @return array
     */
    public static function getStatus()
    {
        return [
            '' => '全部',
            self::STATUS_PRIZE_YES => '中奖',
            self::STATUS_PRIZE_SEND => '已发放',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ejiao2017chongqing_prize_pool}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'created_at' => '中奖时间',
        ];
    }


    /**
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConfig()
    {
        return $this->hasOne(Config::className(), ['id' => 'aid']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['openid' => 'openid']);
    }
}
