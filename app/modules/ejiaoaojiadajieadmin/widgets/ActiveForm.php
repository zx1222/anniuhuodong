<?php
namespace app\modules\ejiaoaojiadajieadmin\widgets;
use Yii;


class ActiveForm extends \yii\widgets\ActiveForm
{


    /**
     * Initializes the widget.
     * This renders the form open tag.
     */
    public function init()
    {
        $this->fieldConfig =  [
        'template' => "{label}\n<div class=\"col-md-10\">{input}{hint}{error}</div>",
        'labelOptions' => ['class' => 'col-md-2 control-label'],
    ];
        parent::init();

    }

}
