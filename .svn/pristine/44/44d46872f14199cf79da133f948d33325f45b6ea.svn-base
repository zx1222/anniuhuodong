<?php

namespace app\modules\ejiaotiebiaoqianadmin\controllers;

use Yii;
use app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianConfig;
use app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianConfigSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PrizeConfigController implements the CRUD actions for EjiaotiebiaoqianConfig model.
 */
class PrizeConfigController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EjiaotiebiaoqianConfig models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EjiaotiebiaoqianConfigSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EjiaotiebiaoqianConfig model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EjiaotiebiaoqianConfig model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EjiaotiebiaoqianConfig();

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if (!empty($model->imageFile)) {
                $model->praiseimage = $model->upload();
                unset($model['imageFile']);
            }
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EjiaotiebiaoqianConfig model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if (!empty($model->imageFile)) {
                $re = is_file(Yii::getAlias('@uploadsPath/ejiaotiebiaoqian/' . $model->praiseimage));
                if ($re) {
                    //如果修改了图片，删除对应的文件
                    if (!empty($model->praiseimage)) {
                        unlink(Yii::getAlias('@uploadsPath/ejiaotiebiaoqian/' . $model->praiseimage));
                    }
                }
                $model->praiseimage = $model->upload();
                unset($model['imageFile']);
            }
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EjiaotiebiaoqianConfig model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $re = is_file(Yii::getAlias('@uploadsPath/ejiaotiebiaoqian/' . $model->praiseimage));
        if ($re) {
            //如果修改了图片，删除对应的文件
            if (!empty($model->praiseimage)) {
                unlink(Yii::getAlias('@uploadsPath/ejiaotiebiaoqian/' . $model->praiseimage));
            }
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EjiaotiebiaoqianConfig model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EjiaotiebiaoqianConfig the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EjiaotiebiaoqianConfig::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
