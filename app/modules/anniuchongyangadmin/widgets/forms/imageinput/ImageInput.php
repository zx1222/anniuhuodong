<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 16/5/23
 * Time: 上午2:28
 */

namespace app\modules\anniuchongyangadmin\widgets\forms\imageinput;

use Yii;
use yii\helpers\Html;
use yii\widgets\InputWidget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

class ImageInput extends InputWidget
{

    public $imageViewAction = ['image'];
    public $hintFileSize = '200KB';
    public $hintImageSize = '400px*400px';
    public $hintExtensions = 'png';
    public $requestParams = [];
    public $question;

    public function run()
    {
        $view = $this->getView();
        ImageInputAsset::register($view);


        if ($this->hasModel()) {
            $input = Html::activeFileInput($this->model, $this->attribute, ['id' => $this->options['id'], 'class' => 'file']);
            $_value = Html::getAttributeValue($this->model, $this->attribute);

        } else {
            $input = Html::fileInput($this->id, $this->value, ['id' => $this->options['id'], 'class' => 'file']);
            $_value = $this->value;
        }
        $shadow = Html::a('上传图片', 'javascript:;', ['class' => 'btn btn-default']);

        $button = Html::tag('div', $shadow . $input, ['class' => 'pass']);
        $tips = Html::tag('p', '大小：不超过' . Html::tag('span', $this->hintFileSize), ['class' => 'first']);
        $tips .= Html::tag('p', '尺寸：' . Html::tag('span', $this->hintImageSize));
        $tips .= Html::tag('p', '格式：' . Html::tag('span', $this->hintExtensions));

//        $this->imageViewAction = Url::to(ArrayHelper::merge($this->imageViewAction, ArrayHelper::merge(['hash' => $_value],$this->requestParams)));
        $imageUrl = Yii::getAlias('@web/' . Yii::getAlias('@uploadsUrl/' . $this->attribute));

        $imageBackground = !empty($_value) ? ['style' => 'background-image:url(' . $imageUrl . ')'] : [];
        $imagePreview = Html::tag('div', '', ArrayHelper::merge(['class' => 'upload', 'id' => 'preview-' . $this->options['id']], $imageBackground));
        $main = Html::tag('div', $button . $tips, ['class' => 'main']);

        $filed = Html::tag('div', $imagePreview . $main, ['class' => 'pics small']);

        $_id = $this->options['id'];
        $js = "jQuery(\"input#{$_id}\").previewimage({container: \"#preview-{$_id}\"});";
        $view->registerJs($js);
        if ($this->question == 1) {
            return Html::tag('div', $filed, ['class' => ' m-xcovers miinnoFormImageInput']);
        } else {
            return Html::tag('div', $filed, ['class' => ' m-xcovers miinnoFormImageInput miinnoForm1ImageInput']);
        }


    }


}