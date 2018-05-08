<?php

namespace app\modules\ejiaoaojiaodajie\models;

use Yii;

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
class EjiaoaojiadajiePhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ejiaoaojiaodajie_photo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['age', 'prize_status', 'prize_pid', 'vote'], 'integer'],
            [['created_at', 'lukey_at'], 'safe'],
            [['status'], 'string'],
            [['username'], 'string', 'max' => 32],
            [['address', 'old_photo', 'new_photo', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'age' => 'Age',
            'address' => 'Address',
            'old_photo' => 'Old Photo',
            'new_photo' => 'New Photo',
            'desc' => 'Desc',
            'prize_status' => 'Prize Status',
            'prize_pid' => 'Prize Pid',
            'created_at' => 'Created At',
            'lukey_at' => 'Lukey At',
            'status' => 'Status',
            'vote' => 'Vote',
        ];
    }
}
