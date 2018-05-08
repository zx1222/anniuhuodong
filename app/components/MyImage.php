<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2017/3/20
 * Time: 15:09
 */

namespace app\components;

use Yii;
use Imagine;
use yii\imagine\BaseImage;
use yii\helpers\FileHelper;

class MyImage extends BaseImage
{

    /**
     * 图片合成
     * @param $array
     */
    public function merge($array, $nameData)
    {

        //合成图片保存的路径
        $savePath = 'poster';
        $uploadsPath = Yii::getAlias('@uploadsPath/ejiaodajie/' . $savePath);
        FileHelper::createDirectory($uploadsPath);

        //实例化类
        $imagine = new \Imagine\Gd\Imagine();

        //将生成的二维码保存本地的
        FileHelper::createDirectory(Yii::getAlias('@uploadsPath/ejiaodajie/thumb'));

        BaseImage::thumbnail($array[2]['image'], 172, 172)->save(Yii::getAlias('@uploadsPath/ejiaodajie/thumb/' . $nameData->id . '.jpg'));

        $array[2]['image'] = Yii::getAlias('@uploadsPath/ejiaodajie/thumb/' . $nameData->id . '.jpg');
        //打开画布
        $collage = $imagine->open(Yii::getAlias('@uploadsPath/ejiaodajie/canvas.jpg'));

        $first = $imagine->open($array[0]['image']);

        //获取一个图片的详情
        $height = $first->getSize()->getHeight();
        $width = $first->getSize()->getWidth();

        if ($width < 600 || $height < 680) {

            $array[0]['width'] = 0;
            $array[0]['height'] = 300;

        } else {

            BaseImage::thumbnail(Yii::getAlias('@uploadsPath/ejiaodajie/' . $nameData->old_photo), 600, 680)->save(Yii::getAlias('@uploadsPath/ejiaodajie/poster/' . $nameData->id . '.jpg'), ['quality' => 100]);

        }

        //循环在画布上贴图片
        foreach ($array as $k => $path) {
            //打开照片
            $photo = $imagine->open($path['image']);


            $collage->paste($photo, new \Imagine\Image\Point($path['width'], $path['height']));


        }
        $collage->save(Yii::getAlias('@uploadsPath/ejiaodajie/poster/' . $nameData->id . '.jpg'), ['quality' => 100]);
        if (!empty($nameData)) {
            //添加编号
            BaseImage::text(Yii::getAlias('@uploadsPath/ejiaodajie/poster/' . $nameData->id . '.jpg'), $nameData->order, Yii::getAlias('@uploadsPath/ejiaodajie/1.ttf'), [0, 640], ['color' => 'ffff37', 'size' => 50])->save(Yii::getAlias('@uploadsPath/ejiaodajie/poster/' . $nameData->id . '.jpg'), ['quality' => 100]);


            //添加名字
            BaseImage::text(Yii::getAlias('@uploadsPath/ejiaodajie/poster/' . $nameData->id . '.jpg'), $nameData->username, Yii::getAlias('@uploadsPath/ejiaodajie/1.ttf'), [60, 640], ['color' => 'fff', 'size' => 50])->save(Yii::getAlias('@uploadsPath/ejiaodajie/poster/' . $nameData->id . '.jpg'), ['quality' => 100]);

            //添加地址
            if (strlen($nameData->address) > 24) {
                $name = substr($nameData->address, 0, 24);
                $endName = substr($nameData->address, 24);

                $str = $name . "\n" . $endName;
            } else {

                $str = $nameData->address;
            }

            BaseImage::text(Yii::getAlias('@uploadsPath/ejiaodajie/poster/' . $nameData->id . '.jpg'), $str, Yii::getAlias('@uploadsPath/ejiaodajie/1.ttf'), [10, 760], ['color' => 'fff', 'size' => 30])->save(Yii::getAlias('@uploadsPath/ejiaodajie/poster/' . $nameData->id . '.jpg'), ['quality' => 100]);

        }
    }

}