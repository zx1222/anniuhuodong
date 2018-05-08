<?php

namespace app\modules\ejiaoyuandan2018\models;

use Yii;

/**
 * This is the model class for table "{{%ejiaotiebiaoqian_config}}".
 *
 * @property integer $id
 * @property string $praisefeild
 * @property string $praisename
 * @property string $min
 * @property string $max
 * @property string $praisecontent
 * @property integer $praisenumber
 * @property integer $chance
 */
class Config extends \yii\db\ActiveRecord
{
    const BAD_ID = 6;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ejiaoyuandan_config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['praisename', 'min', 'max', 'praisecontent', 'praisenumber', 'chance'], 'required'],
            ['praisefeild', 'default', '1'],
            [['praisecontent'], 'string'],
            [['praisenumber', 'chance'], 'integer'],
            [['praisefeild'], 'string', 'max' => 10],
            [['praisename'], 'string', 'max' => 20],
            [['min', 'max'], 'string', 'max' => 100],
            [['praiseimage'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'praisefeild' => 'Praisefeild',
            'praisename' => 'Praisename',
            'min' => 'Min',
            'max' => 'Max',
            'praisecontent' => 'Praisecontent',
            'praisenumber' => 'Praisenumber',
            'chance' => 'Chance',
        ];
    }
}
