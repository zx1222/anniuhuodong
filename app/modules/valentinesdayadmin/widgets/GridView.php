<?php
namespace app\modules\valentinesdayadmin\widgets;

use Yii;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class GridView extends \yii\grid\GridView
{
//    public $tableOptions = ['class' => ''];
    public $layout = "<div class='m-wxcon-table m-xlbstab'>{items}</div>\n<div class='m-xpagings'>{summary}\n{pager}</div>";
    public $summaryOptions = ['class' => 'date'];


    function init()
    {
        parent::init();
        $this->summary = Html::tag('div', '共 <span>{totalCount}</span> 条数据', ['class' => 'date']);
        $this->pager['options'] = ['class' => 'pagination pull-right'];
        $this->options['class'] = 'grid-view';
        $this->tableOptions = ['class' => 'table table-striped table-hover'];
        $this->layout = "{items}\n<div class='datatable-footer'>{summary}\n{pager}</div> <div class='clearfix'></div>";
        $this->summaryOptions = ['class' => 'dataTables_info'];

    }

    /**
     * Renders the pager.
     * @return string the rendering result
     */
    public function renderPager()
    {
        $pagination = $this->dataProvider->getPagination();
        if ($pagination === false || $this->dataProvider->getCount() <= 0) {
            return '';
        }
        /* @var $class LinkPager */
        $pager = $this->pager;
        $class = ArrayHelper::remove($pager, 'class', LinkPager::className());
        $pager['pagination'] = $pagination;
        $pager['view'] = $this->getView();

        return $class::widget($pager);
    }
}