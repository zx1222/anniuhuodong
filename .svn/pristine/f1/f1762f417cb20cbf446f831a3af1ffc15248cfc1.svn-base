<?php

/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2017/7/3
 * Time: 14:54
 */
namespace activity\ejiao\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class UserModel extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],

        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }
//    public static function getDb()
//    {
//        return Yii::$app->get('db2');
//    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()

    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'phone' => '电话',
            'address' => '邮箱',
            'created_at' => '创建时间',
        ];
    }
}