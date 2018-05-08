<?php

namespace app\modules\anniuzhengwenadmin\controllers;

use Yii;
use app\modules\anniuzhengwenadmin\models\AnniuzhengwenArticle;
use app\modules\anniuzhengwenadmin\models\AnniuzhengwenArticleSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for AnniuzhengwenArticle model.
 */
class ArticleController extends Controller
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
     * Lists all AnniuzhengwenArticle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnniuzhengwenArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AnniuzhengwenArticle model.
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
     * Creates a new AnniuzhengwenArticle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AnniuzhengwenArticle();
        $model->scenario = 'create';
        if ($model->load(Yii::$app->request->post())) {
            $model->content = UploadedFile::getInstance($model, 'content');
            $model->content = $model->upload();
            if ($model->save()) {
                return $this->redirect(['index']);
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing AnniuzhengwenArticle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        ini_set("memory_limit", "1288M");
        $model = $this->findModel($id);
        $content = $model->content;
        $model->scenario = 'update';
        if ($model->load(Yii::$app->request->post())) {
            $model->content = UploadedFile::getInstance($model, 'content');
            if (!empty($model->content)) {
                //如果修改了图片，删除对应的文件
                unlink(Yii::getAlias('@uploadsPath/anniuzhengwen/' . $content));
                $model->content = $model->upload();
            }else{
                $model->content = $content;
            }
            if ($model->save()) {
                return $this->redirect(['index']);
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
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
        if (!empty($model->content)) {
            $del = unlink(Yii::getAlias('@uploadsPath/anniuzhengwen/' . $model->content));
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
     * Finds the AnniuzhengwenArticle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AnniuzhengwenArticle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AnniuzhengwenArticle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
