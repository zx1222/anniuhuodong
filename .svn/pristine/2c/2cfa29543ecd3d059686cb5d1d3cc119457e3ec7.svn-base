<?php

namespace app\modules\ejiaotiebiaoqianadmin\controllers;

use Yii;
use app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianLabels;
use app\modules\ejiaotiebiaoqianadmin\models\EjiaotiebiaoqianLabelsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LabelsController implements the CRUD actions for EjiaotiebiaoqianLabels model.
 */
class LabelsController extends Controller
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
     * Lists all EjiaotiebiaoqianLabels models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EjiaotiebiaoqianLabelsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EjiaotiebiaoqianLabels model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if ($model->status == 0) {
            $result = ['name' => '待审核', 'htmlClass' => 'label-info'];
        } elseif ($model->status == 1) {
            $result = ['name' => '审核成功', 'htmlClass' => 'label-success'];
        } else {
            $result = ['name' => '审核失败', 'htmlClass' => 'label-danger'];
        }

        return $this->render('view', [
            'model' => $model,
            'result' => $result,
        ]);
    }

    /**
     * Creates a new EjiaotiebiaoqianLabels model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EjiaotiebiaoqianLabels();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EjiaotiebiaoqianLabels model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EjiaotiebiaoqianLabels model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EjiaotiebiaoqianLabels model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EjiaotiebiaoqianLabels the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EjiaotiebiaoqianLabels::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
