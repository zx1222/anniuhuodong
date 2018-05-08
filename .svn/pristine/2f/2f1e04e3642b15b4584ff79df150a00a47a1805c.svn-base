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
class WuhanController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {


        $prizeModel = PrizePool::find()
            ->where(['status' => 1])
            ->andWhere(['in', 'aid', [1, 3, 5]])
            ->andWhere(['order' => ''])
            ->andWhere(['result' => ''])
            ->orderBy(['rand()' => SORT_DESC])
            ->limit(5)
            ->all();

        if (!empty($prizeModel)) {
// 随机更新
            foreach ($prizeModel as $k => $lukeyModel) {

                $lukeyModel->status = 2;

                $cash =[1=>100,3=>1500,5=>500];
                $orderNo = Yii::$app->hongbao->buildRedPack($lukeyModel->openid, $cash[$lukeyModel->aid], '幸运抽大奖', '幸运抽大奖', '恭喜您!');
                if (PrizePool::updateAll(['status' => 2, 'order' => $orderNo], ['status' => 1, 'pid' => $lukeyModel->pid]) !== false) {
                    $res = Yii::$app->hongbao->send();
                }
                $lukeyModel->status = 3;

                $xml = simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA);

                $lukeyModel->result = $res;
                $lukeyModel->type = $xml->return_msg;

                $lukeyModel->update();
            }


        }

    }
}