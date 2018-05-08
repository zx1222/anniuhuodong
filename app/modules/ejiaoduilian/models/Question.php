<?php
/**
 * Created by PhpStorm.
 * User: ezsky
 * Date: 2017/1/23
 * Time: 上午10:16
 */

namespace app\modules\ejiaoduilian\models;


class Question
{
    static public function generate()
    {
        $question = self::question();
        shuffle($question);
        return array_slice($question, 0, 10);
    }

    static private function question()
    {
        return [
            [
                'q' => '闻鸡起舞从今日',
                'o' => [
                    ['text' => '跃马扬鞭正此时', 'isTrue' => 1],
                    ['text' => '春风化雨醉今朝', 'isTrue' => 0],
                    ['text' => '一夜风和遍地春', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '春信千家传紫燕',
                'o' => [
                    ['text' => '福音万户报金鸡', 'isTrue' => 1],
                    ['text' => '燕舞千家幸福年', 'isTrue' => 0],
                    ['text' => '爆竹声声报平安', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '把酒当歌歌盛世',
                'o' => [
                    ['text' => '闻鸡起舞舞新春', 'isTrue' => 1],
                    ['text' => '鸡迎新岁处处春', 'isTrue' => 0],
                    ['text' => '金鸡报晓四海春', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '鸡鸣燕舞千门福',
                'o' => [
                    ['text' => '世盛人欢四海春', 'isTrue' => 1],
                    ['text' => '喜鹊喳喳报福音', 'isTrue' => 0],
                    ['text' => '喜事连连万户春', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '彩凤鸣春春不老',
                'o' => [
                    ['text' => '雄鸡报晓晓生晖', 'isTrue' => 1],
                    ['text' => '鸡韵成歌盛世常', 'isTrue' => 0],
                    ['text' => '金鸡唱晓运鸿达', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '开门迎春春满院',
                'o' => [
                    ['text' => '抬头见喜喜事多', 'isTrue' => 1],
                    ['text' => '抬头见喜迎春归', 'isTrue' => 0],
                    ['text' => '爆竹迎新福又来', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '张灯结彩迎新春',
                'o' => [
                    ['text' => '欢天喜地庆佳节', 'isTrue' => 1],
                    ['text' => '载歌载舞贺新年', 'isTrue' => 0],
                    ['text' => '喜气洋洋庆佳节', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '事业辉煌年年好',
                'o' => [
                    ['text' => '财源广进步步高', 'isTrue' => 1],
                    ['text' => '万事如意福来到', 'isTrue' => 0],
                    ['text' => '家庭和乐万事兴', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '家兴人兴事业兴',
                'o' => [
                    ['text' => '福旺财旺运气旺', 'isTrue' => 1],
                    ['text' => '喜来福到好运到', 'isTrue' => 0],
                    ['text' => '冬去春来幸福来', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '富贵吉祥年年在',
                'o' => [
                    ['text' => '如意财源日日来', 'isTrue' => 1],
                    ['text' => '幸福平安好运来', 'isTrue' => 0],
                    ['text' => '好运连连幸福来', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '锦上添花花似锦',
                'o' => [
                    ['text' => '新春报喜喜迎春', 'isTrue' => 1],
                    ['text' => '幸福如意喜事多', 'isTrue' => 0],
                    ['text' => '新春福到满园春', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '辞旧岁岁岁有余',
                'o' => [
                    ['text' => '迎新年年年添福', 'isTrue' => 1],
                    ['text' => '迎新除旧添新福', 'isTrue' => 0],
                    ['text' => '财源广进乐不断', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '一年四季春常在',
                'o' => [
                    ['text' => '万紫千红永开花', 'isTrue' => 1],
                    ['text' => '万事大吉吉祥来', 'isTrue' => 0],
                    ['text' => '全家喜乐乐开怀', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '一帆风顺年年好',
                'o' => [
                    ['text' => '万事如意步步高', 'isTrue' => 1],
                    ['text' => '好运连连鸿福来', 'isTrue' => 0],
                    ['text' => '事事如意岁岁安', 'isTrue' => 0]
                ]
            ],
            [
                'q' => '五更鸡声声唱晓',
                'o' => [
                    ['text' => '千里马步步登高', 'isTrue' => 1],
                    ['text' => '芝麻开花节节高', 'isTrue' => 0],
                    ['text' => '爆竹声声贺新春', 'isTrue' => 0]
                ]
            ],
        ];
    }
}