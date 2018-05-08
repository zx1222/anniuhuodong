<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2018/4/19
 * Time: 14:30
 */

namespace app\modules\ejiaomothersday\controllers;


use yii\web\Controller;
use app\modules\ejiaomothersday\models\Config;
use app\modules\ejiaomothersday\models\PrizePool;

class ConfigController extends Controller
{

    /**
     * Lists all Config models.
     * @return mixed
     */
    public function actionInitPool()
    {

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