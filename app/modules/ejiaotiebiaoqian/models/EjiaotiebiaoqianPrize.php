<?php

namespace app\modules\ejiaotiebiaoqian\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%ejiaotiebiaoqian_prize}}".
 *
 * @property integer $id
 * @property string $user
 * @property integer $prize_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class EjiaotiebiaoqianPrize extends \yii\db\ActiveRecord
{
    const BAD_ID = 5;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ejiaotiebiaoqian_prize}}';
    }

    /**
     * 自动填充时间
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prize_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['user'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'prize_id' => 'Prize ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * 判断用户是否中奖
     * @return EjiaotiebiaoqianPrize[]|array|ActiveRecord[]
     */
    public static function Prize()
    {
        $openId = Yii::$app->user->identity->openid;
        return static::find()->where(['and', ['<>', 'prize_id', self::BAD_ID], ['user' => $openId], ['status' => 1]])->all();
    }
}
