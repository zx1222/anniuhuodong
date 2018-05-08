<?php

namespace app\modules\anniuchongyangadmin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%anniuchongyang_question}}".
 *
 * @property integer $id
 * @property integer $question_category
 * @property string $question
 * @property string $choiceA
 * @property string $choiceB
 * @property string $choiceC
 * @property string $choiceD
 * @property string $right_choice
 * @property integer $created_at
 * @property integer $updated_at
 */
class QuestionModel extends \yii\db\ActiveRecord
{
    const FIRST = 1;

    const SECOND = 2;

    const THIRD = 3;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anniuchongyang_question}}';
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_category','right_choice','choiceA','choiceB','title','author'], 'required'],
            [['question_category', 'created_at', 'updated_at'], 'integer'],
            [['question'], 'string'],
            [['title', 'author'], 'string', 'max' => 100],
            [['choiceA', 'choiceB', 'choiceC', 'choiceD', 'right_choice'], 'string', 'max' => 255],
            ['right_choice', 'in', 'range'=> ['a','b','A','B'],'message'=> '值必须为a,b,A,B'],
        ];
    }

    /**
     * @return string
     */
    public static function status()
    {
        return [
            self::FIRST => ['name' => '第一关', 'htmlClass' => 'label-success'],
            self::SECOND => ['name' => '第二关', 'htmlClass' => ' label-primary'],
            self::THIRD => ['name' => '第三关', 'htmlClass' => 'label-info'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_category' => '问题分类',
            'title' => '题目',
            'author' => '作者',
            'question' => '问题',
            'choiceA' => '选项A',
            'choiceB' => '选项B',
            'choiceC' => '选项C',
            'choiceD' => '选项D',
            'right_choice' => '正确答案',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
        ];
    }
}
