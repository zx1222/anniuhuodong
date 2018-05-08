<?php

namespace app\modules\anniuzhengwenadmin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%anniuzhengwen_article}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property string $content
 * @property integer $vote
 * @property integer $created_at
 * @property integer $updated_at
 */
class AnniuzhengwenArticle extends \yii\db\ActiveRecord
{
    //public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anniuzhengwen_article}}';
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

        ];
    }

    public function scenarios()
    {
        return [
            'create' => ['title', 'author', 'content'],
            'update' => ['title', 'author'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','author'], 'required', 'on' => ['create', 'update']],
            [['title'], 'unique', 'on' => ['create', 'update']],
            [['content'], 'required', 'on' => 'create'],
            [['vote', 'created_at', 'updated_at'], 'integer'],
            [['title', 'content'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'author' => '作者',
            'content' => '内容',
            'vote' => '票数',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
        ];
    }

    public function upload()
    {
        $filename = Yii::$app->getSecurity()->generateRandomString() . '.' . $this->content->extension;
        /* $filename ->上传之后转化的文件名 */
        /* $savePath -> 定义保存路径 */
        $savePath = date('Y-m', time());
        $uploadsPath = \Yii::getAlias('@uploadsPath/anniuzhengwen/' . $savePath);
        FileHelper::createDirectory($uploadsPath);
        /* 上传助手自动生成 */
        $this->content->saveAs($uploadsPath . '/' . $filename);
        /* url保存路径为web/statics/ */
        return $savePath . '/' . $filename;
    }
}
