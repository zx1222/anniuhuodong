<?php
/**
 * Created by PhpStorm.
 * User: Miinno-10
 * Date: 2018/1/23
 * Time: 15:30
 */

namespace app\modules\ejiaonewyear\controllers;


use yii\web\Controller;
use app\modules\ejiaonewyear\models\Config;
use app\modules\ejiaonewyear\models\PrizePool;

class ConfigController extends Controller
{

    /**
     * Lists all Config models.
     * @return mixed
     */
    public function actionInitPool()
    {
        exit;
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