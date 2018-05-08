<?php
use app\modules\ejiaoaojiaodajie\Asset;
use yii\helpers\Html;
use yii\helpers\Url;

$assetsUrl = Asset::getAssetUrl('images');
$this->render('/layouts/_jsapi-share', ['model' => $photoModel]);
?>

    <div class="page3 page">
        <!--参赛者投票详情页面-->
        <div class="logo" id="logo">
            <!-- logo -->
        </div>
        <div class="topstrap bg-post"></div>
        <div class="personage-info bg-post page-post-center">
            <div class="personage-info-title bg-post page-post-center"></div>
            <div class="personage-info-content">
                <div class="row">
                    <div class="col-xs-6 text-right">
                        <p class=" content-title"><?= $photoModel->order ?>号 <?= $photoModel->username ?></p>
                    </div>
                    <div class="col-xs-6 ">
                        <div class=" center-block poll poll-vote"><?= $photoModel->vote ?></div>
                    </div>
                </div>
                <img src="<?= Yii::getAlias('@uploadsUrl/ejiaodajie/' . $photoModel->old_photo) ?>" alt="阿胶大姐头像"
                     class="center-block dajietop">
                <ul>
                    <?php if(!empty($photoModel->age)):?>
                        <li><span class="player-title">年龄:</span> <?= $photoModel->age ?></li>
                    <?php endif;?>
                    <li><span class="player-title">所在门店:</span> <?= $photoModel->address ?></li>
                    <li><span class="player-title">参赛者宣言:</span> <?= $photoModel->desc ?></li>
                </ul>
                <div class="in-vote center-block page-post-center" style="display: none">
                    <a href="javascript:void(0);" class="voteHandler btn-shadow in-vote-link"></a>
                </div>
            </div>
        </div>
        <!--遮罩层-->
        <div class="mask bg-post" style="display: none"></div>
        <!--个人生成海报-->
        <div class="poster bg-post page-post-center" style="display: none">
            <div class="vote-success bg-post page-post-center"></div>
            <div class="forward bg-post page-post-center"></div>
            <div class="poster-content bg-post page-post-center">
                <img src="<?= Yii::getAlias('@uploadsUrl/ejiaodajie/' . $photoModel->new_photo) ?>" alt="" class="">
            </div>
            <div
                class="poster-lottery bg-post page-post-center"><?= Html::a('', ['lottery'], ['class' => 'btn-shadow']) ?></div>
        </div>

    </div>
    <div class="page3-2 page">

        <!--遮罩层-->
        <div class="mask bg-post"></div>
        <!--个人生成海报-->
        <div class="poster bg-post page-post-center">
            <div class="vote-failyre bg-post page-post-center"></div>
            <div class="forward bg-post page-post-center"></div>
            <div class="poster-content bg-post page-post-center">
                <img src="<?= Yii::getAlias('@uploadsUrl/ejiaodajie/' . $photoModel->new_photo) ?>" alt="" class="">
            </div>
            <div class="bt-close bg-post page-post-center"></div>
        </div>

    </div>
    <div class="page9 page" style="display: none">
        <!--了解阿胶-->
        <div class="topstrap bg-post"></div>
        <div class="title bg-post page-post-center"></div>
        <div class="themewords  bg-post page-post-center"></div>
        <div class="anniu bg-post page-post-center"></div>
        <div class="knowanniu bg-post page-post-center">
            <a href="https://mp.weixin.qq.com/s?__biz=MzIzNTA1MzMwOA==&mid=534926917&idx=1&sn=8ae8e49ac8ed01fecea5c6361cf985ca&chksm=72fbffd6458c76c0d309c822f419294c71e9ab605a4f28f9fd67de787feb23516a1bb2ac0010&mpshare=1&scene=1&srcid=0322e4g8QBE91fS0xGTvbuBg&key=8899aecb9c973c6c8c6493165fe94135e8a90543a7341803a5d62a4f46d617455d3685ac3a1ded170c33ea3769504ea8f8b83eba12bae8e6b1bae5a4ce5b277571a547fada2e351e9beb85fb29c26415&ascene=0&uin=MTIwMDc1&devicetype=iMac+MacBookPro8%2C2+OSX+OSX+10.12.3+build(16D32)&version=12020010&nettype=WIFI&fontScale=100&pass_ticket=ncNvrd%2BVbmDo8mwT6UceHChkAGJFaDx8jVCS9BxBtAc%3D"
               class="knowanniu-link"></a>
        </div>
        <div class="share bg-post page-post-center"></div>
        <!--遮罩层-->
        <div class="mask bg-post" style="display: none"></div>
        <!--     分享箭头图片-->
        <div class="share-bg bg-post" style="display: none"></div>
    </div>
<?php
$url = \yii\helpers\Url::to(['vote', 'id' => $photoModel->id], true);
$js = <<<EOF
  $("a.voteHandler").one('click', function () {
        $.get('{$url}',function(data){
            code = data.code;
            if (code == 200){
                $(".page3 .mask").show();
                $(".page3 .poster").show();
            } else if(code == 304){
                 $(".page3").hide();
                 $(".page3 .mask").show();
                $(".page3 .poster").show();
                $(".page3-2").show();
            }else if(code == 403){
            }else{
    
            }
        },"json");
    });
EOF;

//$this->registerJs($js);


?>