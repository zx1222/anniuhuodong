<?php

namespace app\modules\fathersday\models;

use Yii;

/**
 * This is the model class for table "{{%fathersday_photo}}".
 *
 * @property integer $id
 * @property string $openid
 * @property string $old_photo
 * @property string $new_photo
 * @property string $desc
 * @property integer $prize_status
 * @property integer $prize_pid
 * @property string $lukey_at
 * @property string $created_at
 * @property string $status
 * @property integer $vote
 */
class PhotoForm extends Photo
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['openid'], 'required'],
            [['prize_status', 'prize_pid', 'vote'], 'integer'],
            [['old_photo', 'new_photo', 'desc'], 'safe'],
            [['status'], 'string'],
            [['openid'], 'string', 'max' => 32],
            [['desc'], 'string', 'max' => 255],
            [['openid'], 'unique'],

            [['new_photo', 'old_photo'], 'file', 'extensions' => 'png, jpg, jpeg',],
        ];
    }

}
