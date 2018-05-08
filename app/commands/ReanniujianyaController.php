<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;


use Yii;
use yii\console\Controller;
use app\modules\anniujianya\models\PrizePool;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ReanniujianyaController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {


        $prizeModel = PrizePool::find()
            ->where(['status' => 12])
//            ->andWhere(['type' => '帐号余额不足，请到商户平台充值后再重试'])
            ->andWhere(['type' => '系统错误，请稍后使用原单号重试，请勿更换单号'])
//            ->andWhere(['type' => '请求已受理，请稍后使用原单号查询发放结果'])
//            ->andWhere(['type' => '发放失败，此请求可能存在风险，已被微信拦截'])
            ->orderBy(['rand()' => SORT_DESC])
            ->limit(5)
            ->all();

        if (!empty($prizeModel)) {
// 随机更新
            foreach ($prizeModel as $k => $lukeyModel) {
                $billNo = $lukeyModel->order;
                $lukeyModel->status = 20;
                $cash = [2 => 100];
                $orderNo = Yii::$app->hongbao->buildRedPack($lukeyModel->openid, $cash[$lukeyModel->aid],  '降压大作战', '再接再厉好礼在等你！', '安宫牛黄丸恭喜您!', $billNo);
                if (PrizePool::updateAll(['status' => 21, 'order' => $orderNo], ['status' => 12, 'pid' => $lukeyModel->pid]) !== false) {
                    $res = Yii::$app->hongbao->send();
                }
                $lukeyModel->status = 22;

                $xml = simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA);

                $lukeyModel->result = $res;
                $lukeyModel->type = $xml->return_msg;

                $lukeyModel->update();
            }

            return 200;
        }

    }
}