<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2017/11/6
 * Time: 14:20
 */

namespace app\modules\peixiaowangluo\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


class Company extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;

    const STATUS_HIDDEN = 0;

    /**
     * @return string
     */
    public static function status()
    {
        return [
            self::STATUS_ACTIVE => ['name' => '显示', 'htmlClass' => ' label-success'],
            self::STATUS_HIDDEN => ['name' => '隐藏', 'htmlClass' => 'label-info'],
        ];
    }

    /**
     * 取出对应的字段
     * @return array
     */
    public function fields()
    {
        return [
            'id',
            'shop_name',
            'region',
            'address',
            'telephone',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%peixiao_company}}';
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
            [
                'class' => BlameableBehavior::className(),
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['shop_name', 'unique'],
            [['shop_name', 'status', 'region', 'address', 'telephone'], 'required'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['shop_name'], 'string', 'max' => 100],
            [['region', 'address'], 'string', 'max' => 255],
            [['telephone'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_name' => '公司名称',
            'region' => '区域',
            'address' => '地址',
            'status' => '状态',
            'telephone' => '电话',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'created_by' => '创建人',
            'updated_by' => '修改人',
        ];
    }
}