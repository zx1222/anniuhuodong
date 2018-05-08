<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\ejiaotiebiaoqianadmin\widgets;

use yii\grid\Column;
use yii\helpers\Html;

/**
 * SerialColumn displays a column of row numbers (1-based).
 *
 * To add a SerialColumn to the [[GridView]], add it to the [[GridView::columns|columns]] configuration as follows:
 *
 * ```php
 * 'columns' => [
 *     // ...
 *     [
 *         'class' => 'yii\grid\SerialColumn',
 *         // you may configure additional properties here
 *     ],
 * ]
 * ```
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class RecommendColumn extends Column
{
    /**
     * @inheritdoc
     */
    public $header = '推荐';

    public $attribute;
    public $recommend;


    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        $res = '';

        if (is_array($this->recommend) && in_array($model->getAttribute($this->attribute), array_keys($this->recommend))) {
            $data = $this->recommend[$model->getAttribute($this->attribute)]['name'];
            $class = $this->recommend[$model->getAttribute($this->attribute)]['htmlClass'];
            $res = Html::tag('span', $data, ['class' => 'label label-' . $class]);
        }
        return $res;


    }
}
