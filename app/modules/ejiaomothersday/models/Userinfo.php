<?php

namespace app\modules\ejiaomothersday\models;

use yii\base\Model;


/**
 *
 * @property string $username
 * @property string $phone
 * @property string $address
 */
class Userinfo extends Model
{
    public $username;
    public $phone;
    public $address;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'phone', 'address'], 'required', 'message' => '{attribute}不能为空'],
            [['phone'], 'match', 'pattern' => '/^1[3|4|5|7|8][0-9]{9}$/', 'message' => '请输入有效号码！'],
            [['address'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '姓名',
            'phone' => '手机号',
            'address' => '收货地址',
        ];
    }
}
