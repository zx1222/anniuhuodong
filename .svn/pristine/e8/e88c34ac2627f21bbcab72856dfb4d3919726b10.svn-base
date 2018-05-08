<?php

namespace app\modules\ejiaotiebiaoqian\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%ejiaotiebiaoqian_selflabels}}".
 *
 * @property integer $id
 * @property string $myself
 * @property string $labels
 * @property integer $created_at
 * @property integer $updated_at
 */
class EjiaotiebiaoqianSelflabels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ejiaotiebiaoqian_selflabels}}';
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
            [['created_at', 'updated_at'], 'integer'],
            [['myself', 'labels'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'myself' => 'Myself',
            'labels' => 'Labels',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * 查询自己已经有的标签
     * @param $openId
     * @return EjiaotiebiaoqianSelflabels|array|null|ActiveRecord
     */
    public static function MyLabels($openId)
    {
        return static::find()->where(['myself' =>$openId])->one();
    }
}
