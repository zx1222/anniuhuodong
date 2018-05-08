<?php

namespace app\modules\anniuzhengwen\models;

use Yii;
use yii\data\ActiveDataProvider;

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
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anniuzhengwen_article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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

    public static function Articles()
    {
        $dataProvider = static::find()->select('id,title,vote')->limit(10)->all();

        return $dataProvider;
    }
}
