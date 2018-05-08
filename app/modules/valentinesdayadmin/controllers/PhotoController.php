<?php

namespace app\modules\valentinesdayadmin\controllers;

use Yii;
use yii\web\Controller;
use app\modules\valentinesdayadmin\models\Photo;
use app\modules\valentinesdayadmin\models\PhotoSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LoversController implements the CRUD actions for LoversUser model.
 */
class PhotoController extends Controller
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
     * Lists all LoversUser models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new PhotoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LoversUser model.
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
     * Updates an existing LoversUser model.
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
     * Finds the LoversUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LoversUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Photo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
