<?php

namespace app\modules\valentinesday\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%ejiaoaojiaodajie_photo}}".
 *
 * @property string $id
 * @property string $username
 * @property integer $age
 * @property string $address
 * @property string $old_photo
 * @property string $new_photo
 * @property string $desc
 * @property integer $prize_status
 * @property integer $prize_pid
 * @property string $created_at
 * @property string $lukey_at
 * @property string $status
 * @property integer $vote
 */
class ValentinesPhoto extends \yii\db\ActiveRecord
{
    const STATUS_FAIL = 2;

    const STATUS_SUCCESS = 1;

    const STATUS_STAY = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%valentinesday_photo}}';
    }

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
            [['declaration'], 'string'],
            [['status', 'created_at', 'updated_at', 'vote'], 'integer'],
            [['status', 'vote'], 'default', 'value' => 0],
            [['nickname', 'openid'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 30],
            [['photo'], 'string', 'max' => 255],
            [['city', 'shopname'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => 'open id',
            'nickname' => '昵称',
            'phone' => '电话',
            'photo' => '图片',
            'city' => '城市',
            'shopname' => '分店',
            'declaration' => '爱情宣言',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'vote' => '总票数',
        ];
    }

    public static function Photo($openid)
    {
        return static::find()->where(['openid' => $openid])->One();
    }
}
