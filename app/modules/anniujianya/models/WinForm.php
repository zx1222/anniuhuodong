<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/6
 * Time: 下午11:57
 */
namespace app\modules\anniujianya\models;
use Yii;
use yii\base\Model;

class WinForm extends Model{

    public $extra;

    public function rules()
    {
        return [
            [['extra'], 'required'],
            ['extra', 'string', 'length' => [4, 100],'tooShort'=>'文字太简短啦！','tooLong'=>'这一句话是不是有点长？']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'extra' => '内容',
        ];
    }
}
