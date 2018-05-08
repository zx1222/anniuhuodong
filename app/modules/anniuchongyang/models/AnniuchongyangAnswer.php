<?php

namespace app\modules\anniuchongyang\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%anniuchongyang_choice}}".
 *
 * @property integer $id
 * @property string $user_id
 * @property integer $question_id
 * @property string $answer
 * @property integer $created_at
 * @property integer $updated_at
 */
class AnniuchongyangAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anniuchongyang_answer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'created_at'], 'integer'],
            [['user_id'], 'string', 'max' => 32],
            [['answer'], 'string', 'max' => 10],
        ];
    }

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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'question_id' => 'Question ID',
            'answer' => 'Answer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getQuestion(){
        return $this->hasOne(AnniuchongyangQuestion::className(),['id'=>'question_id']);
    }
}
