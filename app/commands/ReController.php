<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\modules\zhuanpan\models\PrizePool;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ReController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {

        $prizeModel = PrizePool::find()
            ->where(['status' => 3])
            ->andWhere(['aid' => 1])
            ->andWhere(['type' => '帐号余额不足，请到商户平台充值后再重试'])
            ->orderBy(['rand()' => SORT_DESC])
            ->limit(5)
            ->groupBy(['ip'])
            ->all();

        if (!empty($prizeModel)) {
// 随机更新
            foreach ($prizeModel as $k => $lukeyModel) {
                $billNo = $lukeyModel->order;
                $orderNo = Yii::$app->hongbao->buildRedPack($lukeyModel->openid, 100, '母亲节', '母亲节', '恭喜您!',$billNo);;
                if (PrizePool::updateAll(['status' => 4, 'order' => $orderNo], ['status' => 3, 'pid' => $lukeyModel->pid]) !== false) {
                    $res = Yii::$app->hongbao->send();
                }
                $lukeyModel->status = 5;

                $xml = simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA);

                $lukeyModel->result = $res;
                $lukeyModel->type = $xml->return_msg;

                $lukeyModel->update();
            }


        }

    }
}