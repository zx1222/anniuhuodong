<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\modules\chongyang\models\Config;
use Yii;
use yii\console\Controller;
use app\modules\ejiaoduilian\models\PrizePool;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ReejiaoduilianController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {


        $prizeModel = PrizePool::find()
            ->where(['status' => 12])
//            ->andWhere(['in', 'aid', [2, 3, 4, 5]])
            ->andWhere(['type' => '帐号余额不足，请到商户平台充值后再重试'])
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
                $billNo = $lukeyModel->order;
                $lukeyModel->status = 20;
                $cash = [2 => 100, 3 => 200, 4 => 500, 5 => 1000];
                $orderNo = Yii::$app->hongbao->buildRedPack($lukeyModel->openid, $cash[$lukeyModel->aid],'新年到，福利滚滚来！', '新春福利 | 同仁堂阿胶邀您对春联，迎开门红！', '同仁堂阿胶恭喜您!', $billNo);
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