<?php

namespace app\modules\ejiaotiebiaoqian\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%ejiaotiebiaoqian_labels}}".
 *
 * @property integer $id
 * @property string $labels
 * @property integer $created_at
 * @property integer $updated_at
 */
class EjiaotiebiaoqianLabels extends \yii\db\ActiveRecord
{
    const STATUS_SHOW = 1;

    const STATUS_NO_SHOW = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ejiaotiebiaoqian_labels}}';
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
            [['labels','status'], 'required'],
            ['labels', 'unique'],
            [['created_at', 'updated_at'], 'integer'],
            [['labels'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'labels' => '标签',
            'status'=>'状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
    /**
     * @return string
     */
    public static function status()
    {
        return [
            self::STATUS_SHOW => ['name' => '显示', 'htmlClass' => ' label-success'],
            self::STATUS_NO_SHOW => ['name' => '隐藏', 'htmlClass' => 'label-info'],
        ];
    }

    /**
     * 展示所有的标签列表
     * @return ActiveDataProvider
     */
    public static function LabelsLists()
    {
        $query = static::find()->where(['status' => static::STATUS_SHOW]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' =>false,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ],
        ]);
        return $provider;
    }
}

