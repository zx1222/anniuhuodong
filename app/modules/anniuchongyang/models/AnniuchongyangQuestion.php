<?php

namespace app\modules\anniuchongyang\models;

use Yii;
use yii\helpers\ArrayHelper;

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
class AnniuchongyangQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%anniuchongyang_question}}';
    }

    public function fields()
    {
        $default = [
            'id',
            'question_category',
            'title',
            'author',
            'question',
        ];
        $extra = [
            'choice' => function ($model) {
                return [
                    $model->choiceA,
                    $model->choiceB,
                ];
            }
        ];

        return ArrayHelper::merge($default, $extra);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_category', 'created_at', 'updated_at'], 'integer'],
            [['question'], 'string'],
            [['choiceA', 'choiceB', 'choiceC', 'choiceD', 'right_choice'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_category' => 'Question Category',
            'question' => 'Question',
            'choiceA' => 'Choice A',
            'choiceB' => 'Choice B',
            'choiceC' => 'Choice C',
            'choiceD' => 'Choice D',
            'right_choice' => 'Right Choice',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * 查找每关的题目
     * @param $category 分类
     * @param int $limit 条数
     * @param int $order 排序
     * @return AnniuchongyangQuestion[]|array|\yii\db\ActiveRecord[]
     */
    public static function Question($category, $limit = 5, $order = '')
    {
        $query = static::find()->where(['question_category' => $category])->limit($limit);

        if($order){
            $query->orderBy(['rand()'=>SORT_DESC]);
        }
        return $query->all();
    }

    /**
     * 查找未做过的题目
     * @param $question_id 问题id
     * @param $category 分类
     * @param int $limit 条数
     * @return AnniuchongyangQuestion[]|array|\yii\db\ActiveRecord[]
     */
    public static function Rest($question_id, $category, $limit = 5)
    {
        //查找未做过的题目
        $question = AnniuchongyangQuestion::find()
            ->where(['not in', 'id', $question_id])
            ->andWhere(['question_category' => $category])
            ->limit($limit)
            ->all();
        return $question;
    }

    public static function Answer($id)
    {
        return static::find()->where(['id' => $id])->one();
    }
}
