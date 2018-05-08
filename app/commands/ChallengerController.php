<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\modules\fathersday\models\PrizePoolChallenger;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ChallengerController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {

        if( Yii::$app->cache->get('c_empty') != false){
            return;
        }

        $prizeModel = PrizePoolChallenger::find()
            ->where(['status' => 1])
            ->andWhere(['in', 'aid', [1, 2, 4, 5]])
            ->andWhere(['order' => ''])
            ->andWhere(['result' => ''])
            ->orderBy(['rand()' => SORT_DESC])
            ->limit(5)
            ->all();

        if (!empty($prizeModel)) {
// 随机更新
            foreach ($prizeModel as $k => $lukeyModel) {

                $lukeyModel->status = 2;

                $cash = [1 => 1500, 2 => 1000, 4 => 2000, 5 => 500];
                $orderNo = Yii::$app->hongbao->buildRedPack($lukeyModel->openid, $cash[$lukeyModel->aid], '父亲节活动', '祝天下父亲身体健康', '恭喜您!');
                if (PrizePoolChallenger::updateAll(['status' => 2, 'order' => $orderNo], ['status' => 1, 'pid' => $lukeyModel->pid]) !== false) {
                    $res = Yii::$app->hongbao->send();
                }
                $lukeyModel->status = 3;

                $xml = simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA);

                $lukeyModel->result = $res;
                $lukeyModel->type = $xml->return_msg;

                $lukeyModel->update();

                if ($lukeyModel->type == '帐号余额不足，请到商户平台充值后再重试'){
                    Yii::$app->cache->set('c_empty', '1', 36000);
                    break;
                }
            }


        }

    }
}