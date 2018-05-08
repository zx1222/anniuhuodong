<?php

namespace app\modules\ejiaotiebiaoqian\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%ejiaotiebiaoqian_userinfo}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $phone
 * @property string $address
 * @property integer $created_at
 * @property integer $updated_at
 */
class EjiaotiebiaoqianUserinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ejiaotiebiaoqian_userinfo}}';
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
            [['username', 'phone', 'address'], 'required','message' => '{attribute}不能为空'],
            [['phone'], 'match', 'pattern' => '/^1[3|4|5|7|8][0-9]{9}$/', 'message' => '请输入有效号码！'],
            [['address'], 'string'],
            [['prize_id','created_at', 'updated_at'], 'integer'],
            [['username'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '姓名',
            'phone' => '手机号',
            'address' => '收货地址',
            'prize_id' => '奖品id',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
