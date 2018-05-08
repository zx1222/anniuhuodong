<?php

namespace app\modules\valentinesdayadmin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%photo}}".
 *
 * @property integer $id
 * @property string $nickname
 * @property string $phone
 * @property string $photo
 * @property string $city
 * @property string $shopname
 * @property string $declaration
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Photo extends \yii\db\ActiveRecord
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
            ['phone', 'match', 'pattern' => '/^(13[0-9]|15[012356789]|14[57]|17[0678]|18[0-9])[0-9]{8}$/', 'message' => '手机号码格式不正确'],
            ['phone', 'unique'],
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

    /**
     * @return string
     */
    public static function status()
    {
        return [

            self::STATUS_FAIL => ['name' => '审核失败', 'htmlClass' => 'label-info'],

            self::STATUS_SUCCESS => ['name' => '审核成功', 'htmlClass' => ' label-success'],

            self::STATUS_STAY => ['name' => '待审核', 'htmlClass' => ' label-danger'],

        ];
    }
}
