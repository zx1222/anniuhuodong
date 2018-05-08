<?php

namespace app\modules\ejiaotiebiaoqian\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%ejiaotiebiaoqian_friends}}".
 *
 * @property integer $id
 * @property string $friends
 * @property string $myself
 * @property string $labels
 * @property integer $created_at
 * @property integer $updated_at
 */
class EjiaotiebiaoqianFriends extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ejiaotiebiaoqian_friends}}';
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
            [['friends', 'myself', 'labels'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'friends' => 'Friends',
            'myself' => 'Myself',
            'labels' => 'Labels',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * 查找好友为自己贴标签的次数
     * @return EjiaotiebiaoqianFriends[]|array|\yii\db\ActiveRecord[]
     *
     */
    public static function Friends()
    {
        return static::find()->select('*,count(*) as counts')->where(['myself' => Yii::$app->user->identity->openid])->groupBy('friends')->with('friends')->asArray()->all();
    }

    /**
     * 关联的用户信息
     * @return \yii\db\ActiveQuery
     */
    public function getFriends()
    {
        return $this->hasOne(EjiaotiebiaoqianWeixinUser::className(), ['openid' => 'friends']);
    }

    /**
     * 判断猜测标签
     * @param $myself 分享的用户的
     * @param $labels 用户本身的标签
     * @return EjiaotiebiaoqianFriends|array|null|ActiveRecord
     */
//    public static function GuessTrue($myself, $labels)
//    {
//        $labels = explode(',', $labels);
//        return static::find()->where(['myself' => $myself])->andWhere("FIND_IN_SET(" . $labels[0] . ",labels)")->andWhere("FIND_IN_SET(" . $labels[1] . ",labels)")->andWhere("FIND_IN_SET(" . $labels[2] . ",labels)")->andWhere(['friends'=>Yii::$app->user->identity->openid])->one();
//    }


    /**
     * 判断猜测标签
     * @param $myself 分享的用户的
     * @param $labels 用户本身的标签
     * @return EjiaotiebiaoqianFriends|array|null|ActiveRecord
     */
    public static function GuessTrue($myself, $labels)
    {
        $labels = explode(',', $labels);
        $guessLabels = static::find()->where(['myself' => $myself])
            ->andWhere(['friends' => Yii::$app->user->identity->openid])
            ->all();
        foreach ($guessLabels as $k => $v) {
            $allLabels = explode(',', $v->labels);
            if (!array_diff($labels, $allLabels)) {
                return $v->labels;
            }
        }
    }
}
