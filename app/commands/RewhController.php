<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\modules\wuhan\models\PrizePool;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class RewhController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {

        $prizeModel = PrizePool::find()
            ->where(['status' => 5])
            ->andWhere(['aid' => 1])
//            ->andWhere(['type' => '帐号余额不足，请到商户平台充值后再重试'])
            ->andWhere(['type' => '红包发放失败,请更换单号再重试'])
            ->orderBy(['rand()' => SORT_DESC])
            ->limit(5)
            ->groupBy(['ip'])
            ->having(['count(*)' => 1])
            ->all();

        if (!empty($prizeModel)) {
// 随机更新
            foreach ($prizeModel as $k => $lukeyModel) {
                $billNo = $lukeyModel->order;
                $orderNo = Yii::$app->hongbao->buildRedPack($lukeyModel->openid, 100, '幸运抽大奖', '幸运抽大奖', '恭喜您!', $billNo);
                if (PrizePool::updateAll(['status' => 6, 'order' => $orderNo], ['status' => 5, 'pid' => $lukeyModel->pid]) !== false) {
                    $res = Yii::$app->hongbao->send();
                }
                $lukeyModel->status = 7;

                $xml = simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA);

                $lukeyModel->result = $res;
                $lukeyModel->type = $xml->return_msg;

                $lukeyModel->update();
            }


        }

    }
}