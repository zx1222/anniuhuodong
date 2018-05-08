<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2017/3/18
 * Time: 16:11
 */

namespace app\modules\ejiaoaojiadajieadmin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\ejiaoaojiadajieadmin\models\EjiaoaojiadajiePhoto;
use app\components\MyImage;


class ActivityController extends Controller
{

    public function actionBatchimage()
    {
        ini_set("memory_limit", "1288M");
        $name = EjiaoaojiadajiePhoto::find()->select(['id'])->all();
        foreach ($name as $k => $item) {
            $this->image($item['id']);
        }

    }

    public function Image($id)
    {

        //通过id查询用户信息
        $nameData = EjiaoaojiadajiePhoto::findOne($id);

        if (!empty($nameData)) {

            $array = array(
                0 => array(
                    'image' => Yii::getAlias('@uploadsPath/ejiaodajie/' . $nameData->old_photo),
                    'width' => 0,
                    'height' => 230,
                ),
                1 => array(
                    'image' => Yii::getAlias('@uploadsPath/ejiaodajie/water.png'),
                    'width' => 0,
                    'height' => 0,
                ),
            );

        }


        //合成图片
        $myClass = new MyImage();
        $myClass->merge($array, $nameData);
    }



}