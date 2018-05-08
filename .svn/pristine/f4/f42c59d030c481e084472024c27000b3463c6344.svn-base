<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2017/11/6
 * Time: 15:19
 */

namespace app\modules\peixiaowangluo\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use app\modules\peixiaowangluo\models\Company;
use yii\data\ActiveDataProvider;

class ApiController extends Controller
{
    /**
     * 配销公司列表展示
     * @param string $keywords 搜索地区关键字
     * @return string
     */
    public function actionList($keywords = '')
    {
        //接收值
        $request = Yii::$app->request;
        $query = Company::find()
            ->where(['status' => Company::STATUS_ACTIVE]);

        if ($keywords) {
            $query->andWhere(['like', 'region', $keywords]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);
        $data = $dataProvider->getModels();
        if ($request->isGet) {
            $result = [
                'code' => 0,
                'data' => $data,
                'total' => count($data)
            ];

        } else {
            $result = [
                'code' => 1,
                'desc' => '请求方式错误',
            ];
        }

        return $result;

    }

    /**
     * 根据配销公司id获取详情
     * @param $id
     * @return string
     * @throws BadRequestHttpException
     * @throws NotFoundHttpException
     */
    public function actionDetail($id)
    {
        if (!is_numeric($id)) {
            throw new BadRequestHttpException('参数错误', 400);
        }
        //接收值
        $request = Yii::$app->request;
        $detailData = Company::find()
            ->where(['id' => $id])
            ->andWhere(['status' => Company::STATUS_ACTIVE])
            ->one();
        if ($request->isGet) {
            if ($detailData === null) {
                throw new NotFoundHttpException('资源不存在', 404);
            }
            $result = [
                'code' => 0,
                'data' => $detailData,
            ];

        } else {
            $result = [
                'code' => 1,
                'desc' => '请求方式错误',
            ];
        }

        return $result;
    }
}