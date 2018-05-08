<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\spotlights\models\SpotlightsSlice */

$this->title = '添加参与者';
?>

<div class="content ">
    <div class="form-horizontal spotlights-slice-create">
        <div class="panel panel-flat ">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>

</div>