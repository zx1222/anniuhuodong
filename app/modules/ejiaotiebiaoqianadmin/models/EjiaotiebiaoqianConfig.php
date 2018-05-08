<?php

namespace app\modules\ejiaotiebiaoqianadmin\models;

use Yii;
use yii\helpers\FileHelper;

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
 * @property string $praiseimage
 * @property integer $chance
 */
class EjiaotiebiaoqianConfig extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ejiaotiebiaoqian_config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['praisename', 'praisecontent', 'praisenumber', 'chance'], 'required'],
            [['praisename', 'praisecontent'], 'unique'],
            [['praisefeild', 'max', 'min'], 'default', 'value' => ''],
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
            'praisename' => '奖项名称',
            'min' => 'Min',
            'max' => 'Max',
            'praisecontent' => '奖项等级',
            'praisenumber' => '奖项库存',
            'praiseimage' => '奖项图片',
            'chance' => '奖品概率',
        ];
    }
    public function upload()
    {
        $filename = Yii::$app->getSecurity()->generateRandomString() . '.' . $this->imageFile->extension;
        /* $filename ->上传之后转化的文件名 */
        /* $savePath -> 定义保存路径 */
        $savePath = date('Y-m', time());
        $uploadsPath = \Yii::getAlias('@uploadsPath/ejiaotiebiaoqian/' . $savePath) ;
        FileHelper::createDirectory($uploadsPath);
        /* 上传助手自动生成 */
        $this->imageFile->saveAs($uploadsPath . '/' . $filename);
        return $savePath . '/' . $filename;
    }
}
