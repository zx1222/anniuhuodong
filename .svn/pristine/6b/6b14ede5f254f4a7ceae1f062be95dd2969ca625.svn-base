<?php

namespace app\modules\ejiaoaojiadajieadmin\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use app\modules\ejiaoaojiadajieadmin\models\EjiaoaojiadajiePhoto;
use app\components\MyImage;
use yii\imagine\BaseImage;
use yii\helpers\FileHelper;
use yii\db\Transaction;

/**
 * Default controller for the `adminfathersday` module
 */
class DefaultController extends Controller
{
    /**
     * 列表页面展示
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => EjiaoaojiadajiePhoto::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 添加
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCreate()
    {
        $model = new EjiaoaojiadajiePhoto();
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if (!empty($model->imageFile)) {
                $model->created_at = date('Y-m-d H:i:s', time());
                $model->lukey_at = date('Y-m-d H:i:s', time());
                $model->old_photo = $model->upload();
                unset($model['imageFile']);
            }
            //开启事务
            $trans = Yii::$app->db->beginTransaction();

            try {
                if ($model->save()) {
                    $id = $model->attributes['id'];
                    $path = $this->image($id);
                    $model->new_photo = $path;
                    $model->ticket = $this->ticket($id);
                    if ($model->save()) {
                        $trans->commit();
                        \Yii::$app->getSession()->setFlash('success', "保存成功！");
                        return $this->redirect(['index']);

                    } else {
                        $trans->rollBack();
                    }
                } else {
                    $trans->rollBack();
                    throw new NotFoundHttpException(print_r($model->errors));
                }
            } catch (Exception $e) {
                $trans->rollback();
                $this->response(array('status' => 1, 'msg' => $e->getMessage()));
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * 修改
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        ini_set("memory_limit", "1288M");
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if (!empty($model->imageFile)) {
                //如果修改了图片，删除对应的文件
                if(!empty($model->old_photo)){
                    unlink(Yii::getAlias('@uploadsPath/ejiaodajie/' . $model->old_photo));
                }


                $model->old_photo = $model->upload();
                unset($model['imageFile']);
            }

            //开启事务
            $trans = Yii::$app->db->beginTransaction();

            try {
                if ($model->save()) {
                    $path = $this->image($id);
                    $model->new_photo = $path;
                    if ($model->save()) {
                        $trans->commit();
                        \Yii::$app->getSession()->setFlash('success', "修改成功！");
                        return $this->redirect(['index']);

                    } else {
                        $trans->rollBack();
                    }
                } else {
                    $trans->rollBack();
                    throw new NotFoundHttpException(print_r($model->errors));
                }
            } catch (Exception $e) {
                $trans->rollback();
                $this->response(array('status' => 1, 'msg' => $e->getMessage()));
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * 删除
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        //删除对应的文件
        if(!empty($model->old_photo)){
            $del = unlink(Yii::getAlias('@uploadsPath/ejiaodajie/' . $model->old_photo));
        }
        //删除数据
        $result = $model->delete();
        if ($result && $del) {
            \Yii::$app->getSession()->setFlash('success', "删除成功！");
        } else {
            \Yii::$app->getSession()->setFlash('success', "删除失败！");
        }
        return $this->redirect(['index']);
    }

    /**
     * 查找详情
     * Finds the Vendor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Vendor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EjiaoaojiadajiePhoto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * 上传图片时候生成海报图
     * @param $id
     * @return string
     */

    public function Image($id)
    {


        ini_set("memory_limit", "1288M");
        //通过id查询用户信息
        $nameData = $this->findModel($id);

        if(empty($nameData->ticket)){
            //获取二维码原图片
            $ticket = $this->ticket($id);
        }else{
            $ticket = $nameData->ticket;
        }

        $bigImage = Yii::$app->exchange->showQrcode($ticket);

        if (!empty($nameData)) {

            $array = array(
                0 => array(
                    'image' => Yii::getAlias('@uploadsPath/ejiaodajie/' . $nameData->old_photo),
                    'width' => 0,
                    'height' => 200,
                ),
                1 => array(
                    'image' => Yii::getAlias('@uploadsPath/ejiaodajie/water.png'),
                    'width' => 0,
                    'height' => 0,
                ),
                2 => array(
                    'image' => $bigImage,
                    'width' => 408,
                    'height' => 778,
                ),
            );

        }

        //合成图片
        $myClass = new MyImage();
        $myClass->merge($array, $nameData);

        //合成图片保存的路径
        $savePath = 'poster';
        $uploadsPath = Yii::getAlias('@uploadsPath/ejiaodajie/' . $savePath);
        FileHelper::createDirectory($uploadsPath);

        return $savePath . '/' . $id . '.jpg';

    }


    /**
     * 批量生成海报图并且保存入库
     */
    public function actionBatchimage()
    {
        set_time_limit(0);
        ini_set("memory_limit", "1288M");
        $name = EjiaoaojiadajiePhoto::find()->select(['id'])->all();
        foreach ($name as $k => $item) {
            $path = $this->image($item['id']);
            $model = $this->findModel($item['id']);
            $model->new_photo = $path;
            if(empty($model->ticket)){
                $model->ticket = $this->ticket($item['id']);
            }
            $model->save();
        }

    }


    /**
     * @return mixed 获取ticket数据
     */
    public function Ticket($id)
    {
        $model = $this->findModel($id);
        $reply = [
            'MsgType' => 'news',
            'Articles' => [
                [
                    'title' => '为' . $model->username . '投票,还能参与抽奖~',
                    'description' => '首届"金牌熬胶员评选大赛"火热投票中,点击参与活动',
                    'picUrl' => 'https://mmbiz.qlogo.cn/mmbiz_png/XiaCBaRjicjTNTPF49WmcS1wibEibiamfP1rYXvtGAfPphOvgxAGfUibfhKmuo4kptvFZNhSk1I9FCl371KYMhKz7TvA/0?wx_fmt=png',
                    'url' => "http://ejiao.sindcorp.net/ejiaoaojiaodajie/default/photo?id=" . $id,
                ]
            ]
        ];
        $res = Yii::$app->exchange->generateQrcode('aojiaodajie', 'QR_SCENE', 3600 * 24 * 7, json_encode($reply));
        return $res['ticket'];
    }

}
