<?php

namespace app\modules\fathersday\models;

use Yii;

/**
 * This is the model class for table "{{%fathersday_photo}}".
 *
 * @property integer $id
 * @property string $openid
 * @property string $old_photo
 * @property string $new_photo
 * @property string $desc
 * @property integer $prize_status
 * @property integer $prize_pid
 * @property string $lukey_at
 * @property string $created_at
 * @property string $status
 * @property integer $vote
 */
class Photo extends \yii\db\ActiveRecord
{
    public $wx_username;
    public $wx_avatar;
    /**
     * @inheritdoc
     */
    const  STATUS_APPROVED = 'approved';
    const  STATUS_PENDING = 'pending';
    const  STATUS_REFUSED = 'refused';

    public static function tableName()
    {
        return '{{%fathersday_photo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['openid'], 'required'],
            [['prize_status', 'prize_pid', 'vote'], 'integer'],
            [['old_photo', 'new_photo', 'desc'], 'safe'],
            [['status'], 'string'],
            [['openid'], 'string', 'max' => 32],
            [['desc'], 'string', 'max' => 255],
            [['openid'], 'unique'],

            [['new_photo', 'old_photo'], 'file', 'extensions' => 'png, jpg, jpeg',],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => 'Openid',
            'old_photo' => '老照片',
            'new_photo' => '新照片',
            'desc' => '图说',
            'prize_status' => 'Prize Status',
            'prize_pid' => 'Prize Pid',
            'lukey_at' => '抽奖时间',
            'created_at' => '创建时间',
            'status' => '状态',
            'vote' => '投票总数',
        ];
    }
    public function getWeixinUser(){
        return $this->hasOne(WeixinUser::className(),['openid'=>'openid']);
    }
}
