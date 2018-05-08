<?php

namespace app\modules\ejiaoaojiadajieadmin\models;

use Yii;
use yii\helpers\FileHelper;
/**
 * This is the model class for table "{{%ejiaoaojiadajie_photo}}".
 *
 * @property string $id
 * @property string $openid
 * @property string $username
 * @property integer $age
 * @property string $address
 * @property string $old_photo
 * @property string $new_photo
 * @property string $desc
 * @property integer $prize_status
 * @property integer $prize_pid
 * @property string $created_at
 * @property string $lukey_at
 * @property string $status
 * @property integer $vote
 */
class EjiaoaojiadajiePhoto extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ejiaoaojiaodajie_photo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['age', 'prize_status', 'prize_pid', 'vote'], 'integer'],
            [['created_at', 'lukey_at'], 'safe'],
            [['status'], 'string'],
            [['username'], 'string', 'max' => 32],
            [['address', 'old_photo', 'new_photo', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'username' => '用户名',
            'age' => '年龄',
            'address' => '所属门店',
            'old_photo' => '图像',
            'new_photo' => 'New Photo',
            'desc' => '图片描述',
            'prize_status' => 'Prize Status',
            'prize_pid' => 'Prize Pid',
            'created_at' => '添加时间',
            'lukey_at' => '投票时间',
            'status' => 'Status',
            'vote' => '投票总数',
        ];
    }

    public function upload()
    {
        $filename = Yii::$app->getSecurity()->generateRandomString() . '.' . $this->imageFile->extension;
        /* $filename ->上传之后转化的文件名 */
        /* $savePath -> 定义保存路径 */
        $savePath = date('Y-m', time());
        $uploadsPath = \Yii::getAlias('@uploadsPath/ejiaodajie/' . $savePath) ;
        FileHelper::createDirectory($uploadsPath);
        /* 上传助手自动生成 */
        $this->imageFile->saveAs($uploadsPath . '/' . $filename);
        /* url保存路径为web/statics/ */
        return $savePath . '/' . $filename;
    }
}
