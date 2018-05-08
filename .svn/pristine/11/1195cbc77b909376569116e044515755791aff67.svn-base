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
class AnniujianyaController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {


        $prizeModel = PrizePool::find()
            ->where(['status' => 10])
            ->andWhere([ 'aid'=>2])
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

                $cash = [2 => 100];
                $orderNo = Yii::$app->hongbao->buildRedPack($lukeyModel->openid, $cash[$lukeyModel->aid], '降压大作战', '再接再厉好礼在等你！', '安宫牛黄丸恭喜您!');
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