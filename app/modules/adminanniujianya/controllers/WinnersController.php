<?php

namespace app\modules\adminanniujianya\controllers;

use Yii;
use app\modules\anniujianya\models\PrizePool;
use app\modules\anniujianya\models\WeixinUser;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * WinnersController implements the CRUD actions for PrizePool model.
 */
class WinnersController extends Controller
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
     * Lists all PrizePool models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PrizePool::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all PrizePool models.
     * @return mixed
     */
    public function actionRebuild($page = 0)
    {
        ini_set('max_execution_time', 0);
        $query = WeixinUser::find()
            ->where(['d3_pid' => 1, 'd3_status' => 20]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => '50']);
        $pages->setPage($page);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        foreach ($models as $model) {
            $modelPrize = PrizePool::find()
                ->where(['openid' => $model->openid, 'aid' => $model->d3_pid])
                ->all();
            if (!$modelPrize) {
                $newPrize = new PrizePool();
                $newPrize->openid = $model->openid;
                $newPrize->aid = $model->d3_pid;
                $newPrize->status = 1;
                $newPrize->ip = $model->ip;
                $newPrize->created_at = $model->created_at;
                $newPrize->save();

            }


        }
        $page++;
        if ($page % 20 == 0) {
            return $this->redirect(['rebuild','page' => $page]);
        }
        if ($page < $pages->getPageCount()) {
            return $this->runAction('rebuild', ['page' => $page]);
        }
//        echo Html::a('NEXT', $pages->createUrl($page));

    }

}
