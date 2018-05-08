<?php

namespace app\modules\ejiaoaojiaodajie\controllers;


use app\modules\ejiaoaojiaodajie\BL\ChallengerStatusTransfer;
use app\modules\ejiaoaojiaodajie\models\EjiaoaojiadajiePhoto;
use app\modules\ejiaoaojiaodajie\models\Photo;
use app\modules\ejiaoaojiaodajie\models\PhotoForm;
use app\modules\ejiaoaojiaodajie\models\Vote;
use app\modules\ejiaoaojiaodajie\models\VoteUser;
use Imagine\Image\Box;
use Imagine\Image\ImagineInterface;
use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\Url;
use  yii\data\ActiveDataProvider;

use app\modules\ejiaoaojiaodajie\BL\Lottery;
use app\modules\ejiaoaojiaodajie\BL\ChallengerLottery;
use app\modules\ejiaoaojiaodajie\BL\StatusTransfer;
use app\modules\ejiaoaojiaodajie\models\User;
use app\modules\ejiaoaojiaodajie\models\WinForm;
use yii\imagine\Image;

/**
 * Default controller for the `fathersday` module
 */
class DefaultController extends Controller
{
    public function init()
    {
        parent::init();
        $this->view->title = Yii::$app->params['site_name'];
    }

    public function beforeAction($action)
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['oauth/index', 'forword' => urlencode(Url::current([], true))], true));
        }

        return parent::beforeAction($action); // TODO: Change the autogenerated stub

    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
//        $reply = [
//            'MsgType' => 'news',
//            'Articles' => [
//                [
//                    'title' => '熬胶大姐评选',
//                    'description' => '为1号选手投票',
//                    'picUrl' => 'http://mmbiz.qpic.cn/mmbiz_jpg/UpNdVDv9kfE5DVRKAOHqjrwd3Rkvh3RKouafly31UOT0511zkszfCpFlFJmkcTBHZTwk42WicKeg0Oibe7S2WZnw/640?wx_fmt=jpeg&wxfrom=5&wx_lazy=1',
//                    'url' => 'http://mp.weixin.qq.com/s?__biz=MzIzNTA1MzMwOA==&amp;mid=534926917&amp;idx=1&amp;sn=8ae8e49ac8ed01fecea5c6361cf985ca&amp;chksm=72fbffd6458c76c0d309c822f419294c71e9ab605a4f28f9fd67de787feb23516a1bb2ac0010&amp;scene=18#rd'
//                ]
//            ]
//        ];
//       $res=  Yii::$app->exchange->generateQrcode('aojiaodajie', 'QR_SCENE', 3600,json_encode($reply));
//       \X::result($res,1);
        return $this->render('index');
    }


    /**
     * 看看别人的照片
     * Renders the exhibition view for the module
     * @return string
     */
    public function actionExhibition()
    {
        $no = Yii::$app->request->get('no');
        $query = EjiaoaojiadajiePhoto::find()->select('id,username,age,address,old_photo,vote,order');

        if (!empty($no)) {
            $query->where(['or', ['order' => $no], ['username' => $no]]);
        }
        $query->orderBy(["CONVERT(username USING gbk)" => SORT_ASC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('exhibition', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 查看详情,在此页面投票
     * Renders the vote view for the module
     * @return string
     */
    public function actionPhoto($id)
    {

        $viewData = EjiaoaojiadajiePhoto::findOne($id);

        return $this->render('photo', [
            'photoModel' => $viewData,
            'ActivityStatusIsEnd' => StatusTransfer::isEnd()
        ]);
    }

    /**
     * 投票操作
     * Renders the lottery view for the module
     * @return string
     */
    public function actionVote($id)
    {
        if (StatusTransfer::isEnd()) {
            return;
        }

        if (Yii::$app->user->isGuest) {
            $res['code'] = 403;
        }
        $openid = Yii::$app->user->identity->openid;

        if (($photoModel = EjiaoaojiadajiePhoto::findOne(['id' => $id])) === null) {
            $res['code'] = 404;
            return json_encode($res);

        }

        $currentDay = (new \DateTime())->format('Y-m-d 00:00:00');

        $voteModel = Vote::find()->where(['>=', 'created_at', $currentDay])->andWhere(['openid' => $openid])->one();

        if (empty($voteModel)) {

            $voteModel = new Vote();

            $voteModel->openid = $openid;
            $voteModel->photo_id = $photoModel->id;
            $voteModel->ip = $_SERVER["REMOTE_ADDR"];

            if ($voteModel->save() !== false) {
                $photoModel->vote = Vote::find()->where(['photo_id' => $photoModel->id])->count();
                $photoModel->save();
            }

            $res['code'] = 200;

        } else {
            $res['code'] = 304;
        }

        return json_encode($res);


    }

    /**
     * 投票人抽奖
     * Renders the lottery view for the module
     * @return string
     */
    public function actionLottery()
    {
        if (StatusTransfer::isEnd()) {
            return;
        }
        StatusTransfer::markRenew();

        return $this->render('lottery', [
            'forbidden' => StatusTransfer::allowLottery(),
            'formModel' => new WinForm()
        ]);
    }

    /**
     * Renders the index view for the module 抽奖
     * @return string
     */
    public function actionLotteryRun()
    {
        if (StatusTransfer::isEnd()) {
            return;
        }

        if (Yii::$app->request->isAjax && Yii::$app->request->post()) {
            // 计算今天第几天

            if (StatusTransfer::getOrdinal() > 7) {
                return;
            }


            if (StatusTransfer::allowLottery() || StatusTransfer::getToDayStatus() % 10 == 0) {
                // 本日抽奖次数达到上线:不允许再抽
                echo json_encode(['code' => '40001', 'error' => '本日抽奖达到上线']);
                return false;
            }

            if (!StatusTransfer::allowLottery() && StatusTransfer::getToDayPid() != 0) {
                // 本日已经获奖:可抽但不会中奖
                $result = Lottery::getBad();
                StatusTransfer::markPause();

            }

            if (!StatusTransfer::allowLottery() && StatusTransfer::getToDayPid() == 0) {
                // 可以正常抽奖
                $result = Lottery::run();
            }

            $min = $result['min'];
            $max = $result['max'];
            if (is_array($min)) { //多等奖的时候
                $i = mt_rand(0, count($min) - 1);
                $result['angle'] = mt_rand($min[$i], $max[$i]);
            } else {
                $result['angle'] = mt_rand($min, $max); //随机生成一个角度
            }
            $result['praisename'] = $result['praisename'];


            return json_encode($result);
        }

    }

    /**
     * Renders the index view for the module 领奖
     * @return string
     */
    public function actionReceive()
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }
        $model = new WinForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->user->identity->realname = $model->name;
            Yii::$app->user->identity->mobile = $model->phone;
            Yii::$app->user->identity->address = $model->address;
            if (Yii::$app->user->identity->save() !== false) {
                return 1;
            } else {
                return 0;
            }
        }
    }
}
