<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2017/12/25
 * Time: 10:23
 */

namespace app\modules\ejiaoyuandan2018\controllers;


use yii\web\Controller;
use app\modules\ejiaoyuandan2018\models\Config;
use app\modules\ejiaoyuandan2018\models\PrizePool;

class ConfigController extends Controller
{

    /**
     * Lists all Config models.
     * @return mixed
     */
    public function actionInitPool()
    {
        echo 1;
        exit();
        ini_set('max_execution_time', 0);

        $prizeType = Config::find()->all();
        foreach ($prizeType as $k => $v) {

            if ($v->praisenumber > 0) {
                for ($i = 0; $i < $v->praisenumber; $i++) {
                    $model = new PrizePool();
                    $model->aid = $v->id;
                    $model->save();
                    unset($model);
                }
                echo $v->praisename;
            }

        }

        echo '~All OK!!!';
    }
}