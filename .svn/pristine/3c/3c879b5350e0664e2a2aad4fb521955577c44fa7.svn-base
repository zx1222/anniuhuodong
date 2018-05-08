<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2017/10/19
 * Time: 16:01
 */

namespace app\commands;

use yii\console\Controller;
use Yii;
use app\modules\anniuchongyang\models\PrizePool;

class AnniuchongyangController extends Controller
{
    /**
     * 红包发放
     * @return int
     */
    public function actionIndex()
    {

        $prizeModel = PrizePool::find()
            ->where(['status' => 10])
            ->andWhere(['between','aid',1,3])
            //->andWhere(['aid' => [1, 2, 3]])
            ->andWhere(['order' => ''])
            ->andWhere(['result' => ''])
            ->orderBy(['rand()' => SORT_DESC])
            ->limit(5)
            ->all();

//
//        $sentCount = PrizePool::find()->where(['<>', 'openid', ''])->count();
//        $configModels = Config::find()->all();
//        $redPackCount = 0;
//        foreach ($configModels as $config) {
//            $redPackCount = $redPackCount + $config->praisenumber;
//        }
//        if (($redPackCount < $sentCount)) {
//            return 500;
//        }

        if (!empty($prizeModel)) {
// 随机更新
            foreach ($prizeModel as $k => $lukeyModel) {

                $lukeyModel->status = 11;

                $cash = [1 => 100, 2 => 200, 3 => 500];
                $orderNo = Yii::$app->hongbao->buildRedPack($lukeyModel->openid, $cash[$lukeyModel->aid], '幸运大转盘', '重阳节诗词大会', '安宫牛黄丸恭喜您!');
                if (PrizePool::updateAll(['status' => 11, 'order' => $orderNo], ['status' => 10, 'pid' => $lukeyModel->pid]) !== false) {
                    $res = Yii::$app->hongbao->send();
                }
                $lukeyModel->status = 12;

                $xml = simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA);

                $lukeyModel->result = $res;
                $lukeyModel->type = $xml->return_msg;

                $lukeyModel->update();
            }

            return 200;
        }

    }
}