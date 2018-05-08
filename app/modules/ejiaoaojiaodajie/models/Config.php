<?php

namespace app\modules\ejiaoaojiaodajie\models;

use Yii;

/**
 * This is the model class for table "{{%config}}".
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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ejiaoaojiaodajie_config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['praisefeild', 'praisename', 'min', 'max', 'praisecontent', 'praisenumber', 'chance'], 'required'],
            [['praisecontent'], 'string'],
            [['praisenumber', 'chance'], 'integer'],
            [['praisefeild'], 'string', 'max' => 10],
            [['praisename'], 'string', 'max' => 20],
            [['min', 'max'], 'string', 'max' => 100],
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
