<?php

namespace app\modules\anniuyuandan2018\models;

use Yii;

/**
 * This is the model class for table "{{%ejiaotiebiaoqian_weixin_user}}".
 *
 * @property string $openid
 * @property string $authKey
 * @property string $wx_username
 * @property integer $wx_sex
 * @property string $wx_country
 * @property string $wx_province
 * @property string $wx_city
 * @property string $wx_avatar
 * @property integer $wx_subscribe
 * @property string $wx_access_token
 * @property integer $wx_expires
 * @property string $ip
 * @property string $created_at
 * @property string $realname
 * @property string $mobile
 * @property string $address
 * @property integer $d1_status
 * @property integer $d1_pid
 * @property integer $d2_status
 * @property integer $d2_pid
 * @property integer $d3_status
 * @property integer $d3_pid
 * @property integer $d4_status
 * @property integer $d4_pid
 * @property integer $d5_status
 * @property integer $d5_pid
 * @property integer $d6_status
 * @property integer $d6_pid
 * @property integer $d7_status
 * @property integer $d7_pid
 * @property string $extra
 */
class WeixinUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anniuyuandan_weixin_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['openid'], 'required'],
            [['wx_sex', 'wx_subscribe', 'wx_expires', 'd1_status', 'd1_pid', 'd2_status', 'd2_pid', 'd3_status', 'd3_pid', 'd4_status', 'd4_pid', 'd5_status', 'd5_pid', 'd6_status', 'd6_pid', 'd7_status', 'd7_pid'], 'integer'],
            [['wx_avatar', 'wx_access_token'], 'string'],
            [['created_at'], 'safe'],
            [['openid', 'realname'], 'string', 'max' => 32],
            [['authKey'], 'string', 'max' => 100],
            [['wx_username', 'wx_country', 'wx_province', 'wx_city'], 'string', 'max' => 30],
            [['ip'], 'string', 'max' => 15],
            [['mobile'], 'string', 'max' => 11],
            [['address', 'extra'], 'string', 'max' => 255],
            [['openid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'openid' => 'Openid',
            'authKey' => 'Auth Key',
            'wx_username' => 'Wx Username',
            'wx_sex' => 'Wx Sex',
            'wx_country' => 'Wx Country',
            'wx_province' => 'Wx Province',
            'wx_city' => 'Wx City',
            'wx_avatar' => 'Wx Avatar',
            'wx_subscribe' => 'Wx Subscribe',
            'wx_access_token' => 'Wx Access Token',
            'wx_expires' => 'Wx Expires',
            'ip' => 'Ip',
            'created_at' => 'Created At',
            'realname' => 'Realname',
            'mobile' => 'Mobile',
            'address' => 'Address',
            'd1_status' => 'D1 Status',
            'd1_pid' => 'D1 Pid',
            'd2_status' => 'D2 Status',
            'd2_pid' => 'D2 Pid',
            'd3_status' => 'D3 Status',
            'd3_pid' => 'D3 Pid',
            'd4_status' => 'D4 Status',
            'd4_pid' => 'D4 Pid',
            'd5_status' => 'D5 Status',
            'd5_pid' => 'D5 Pid',
            'd6_status' => 'D6 Status',
            'd6_pid' => 'D6 Pid',
            'd7_status' => 'D7 Status',
            'd7_pid' => 'D7 Pid',
            'extra' => 'Extra',
        ];
    }

}
