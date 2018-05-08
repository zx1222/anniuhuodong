<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/6
 * Time: 下午11:57
 */
namespace app\modules\chongyang\models;
use Yii;
use yii\base\Model;

class WinForm extends Model{

    public $name;
    public $phone;
    public $address;

    public function rules()
    {
        return [
            [['name', 'phone','address'], 'required'],
            [['phone'], 'match', 'pattern' => '/^(1(([35][0-9])|(47)|[8][012356789]))\d{8}$/', 'message' => '请输入有效号码！'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'name' => '姓名',
            'phone' => '手机号',
            'address' => '收货地址',
        ];
    }
}
