#阿胶贴标签活动

###1.数据表包含
微信记录用户信息表，记录标签的表，用户对应的标签表，奖品表，抽奖记录表，收货信息表，好友猜测标签记录表

###2.后台管理
####标签管理（管理员可以在后台进行标签管理----增删改查）

###3.前台
###自己给自己贴标贴
1.渲染后宫大选页面--动画贴标签页面
```php
 public function actionIndex()
    {
        $dataProvider = EjiaotiebiaoqianLabels::LabelsLists();
        $dataProvider = $dataProvider->getModels();
        $myLabels = EjiaotiebiaoqianSelflabels::MyLabels();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'labels' => $myLabels->labels
        ]);

    }
```
2.标签保存
```php
public function actionCreate()
    {
        $model = new EjiaotiebiaoqianSelflabels();
        $model->myself = Yii::$app->user->identity->openid;
        if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
            return $this->redirect('harem');
        } else {
            return $this->redirect('index');
        }
    }
```

3.进入我的后宫页面渲染
```php
  public function actionHarem()
    {
        $friends = EjiaotiebiaoqianFriends::Friends();
        return $this->render('harem', [
            'friends' => $friends,
        ]);
    }
```

3.进入翻牌页面渲染
```php
public function actionLottery()
{
    return $this->render('lottery');
}
```

4.翻牌子抽奖-----接口
抽奖中包含三部分，（1）查找库存大于0的奖品（2）用户中奖之后奖品库存减1，（3）记录用户的抽奖记录
#####接口请求地址：192.168.0.189/net_sindcorp_anniuhuodong/web/ejiaotiebiaoqian/default/lottery-run
#####接口请求方式：get
#####接口数据结构格式:json格式
#####接口请求参数
#####接口返回结果举例
```php
{
    "id": 5,
    "praisefeild": "",
    "praisename": "谢谢参与",
    "min": [
        "60",
        "300"
    ],
    "max": [
        "119",
        "359"
    ],
    "praisecontent": "谢谢参与",
    "praisenumber": -1,
    "praiseimage":'',
    "chance": 50
}
```

5.收货信息-----接口
#####接口请求地址：192.168.0.189/net_sindcorp_anniuhuodong/web/ejiaotiebiaoqian/default/receive
#####接口请求方式：get
#####接口数据结构格式:json格式
#####接口请求参数
#####必须参数：姓名，收货地址，手机号

#####接口返回结果举例

````php
//请求方式错误
{
    "code": 1,
    "desc": "请求方式错误"
}
//数据结构不完整
{
    "code": 1,
    "desc": {
        "username": [
            "姓名不能为空"
        ],
        "phone": [
            "电话不能为空"
        ],
        "address": [
            "地址不能为空"
        ],
    }
}
//手机号存在
{
    "code": 1,
    "desc": {
        "phone": [
            "电话已经存在不能重复使用"
        ]
    }
}
//请求成功
{
    "code": 0,
    "desc": "添加成功"
}
````
###好友贴标签
1.记录好友每次贴标签的记录并进行对比
#####接口请求地址：192.168.0.189/net_sindcorp_anniuhuodong/web/ejiaotiebiaoqian/share/guess-label
#####接口请求方式：get
#####接口数据结构格式:json格式
#####接口请求参数
#####必须参数：加密之后的openid，猜测的标签

#####接口返回结果举例

````php
//猜测失败
{
    "code": 1,
}
//猜测成功
{
    "code": 0,
}

