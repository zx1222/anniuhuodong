// $(function () {
//     $('body').height($('body')[0].clientHeight);
//
//     Bmob.initialize("6b519fe740de732813cff6279f5b8d16", "98fb42b44071275cf7d870b9166f2c10");
//     var FaceTokens = Bmob.Object.extend("faceTokens");
//     var faceTokens = new FaceTokens();
//     var query = new Bmob.Query(FaceTokens);
//
//     //detect
//     var face_tokens = []
//     // $.ajax({
//     //     url: 'https://api-cn.faceplusplus.com/facepp/v3/detect',
//     //     type: 'POST',
//     //     data: {
//     //         api_key: 'PlCqTpw9tZbKnBVlFVV4y5FHMx-IS8ST',
//     //         api_secret: '6vuzkwTsMe3NoWMlZEm4mvydn_5IJiOb',
//     //         image_url: 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=740842372,4044357589&fm=27&gp=0.jpg',
//     //         return_attributes: 'gender,age,smiling,headpose,facequality,eyestatus,emotion'
//     //     },
//     //     success: function (res) {
//     //
//     //         if (res.faces.length > 1) {
//     //             alert('请上传一人照片')
//     //         }
//     //         else {
//     //             faceTokens.set("token",res.faces[0].face_token);
//     //             faceTokens.save(null, {
//     //                 success: function(object) {
//     //                     console.log('a');
//     //                 },
//     //                 error: function(model, error) {
//     //                     console.log("b");
//     //                 }
//     //             });
//     //             // var _faceTokens = face_tokens
//     //             //  _faceTokens.push(res.faces[0].face_token)
//     //             setTimeout(function () {
//     //                 $.ajax({
//     //                     url: 'https://api-cn.faceplusplus.com/facepp/v3/faceset/create',
//     //                     type: 'POST',
//     //                     data: {
//     //                         api_key: 'PlCqTpw9tZbKnBVlFVV4y5FHMx-IS8ST',
//     //                         api_secret: '6vuzkwTsMe3NoWMlZEm4mvydn_5IJiOb',
//     //                         face_tokens: _faceTokens.toString(),
//     //                     },
//     //                 })
//     //             }, 2000)
//     //
//     //         }
//     //     }
//     // })
//
//     //查询数据
//     query.find({
//         success: function(results) {
//             // 循环处理查询到的数据
//             for (var i = 0; i < results.length; i++) {
//                 var object = results[i];
//                 if(object.get('token')!==''&&object.get('token')!==undefined){
//                     face_tokens.push(object.get('token'))
//                 }
//             }
//             //creatFaceSet
//             $.ajax({
//                 url:'https://api-cn.faceplusplus.com/facepp/v3/faceset/create',
//                 type:'POST',
//                 data:{
//                     api_key:'PlCqTpw9tZbKnBVlFVV4y5FHMx-IS8ST',
//                     api_secret:'6vuzkwTsMe3NoWMlZEm4mvydn_5IJiOb',
//                     face_tokens:face_tokens.toString(),
//                     outer_id:'face_tokens'
//                 }
//             })
//         },
//         error: function(error) {
//             alert("查询失败: " + error.code + " " + error.message);
//         }
//     });
//
//
//     $('.btn-start').on('click', function () {
//         // https://api.ai.qq.com/fcgi-bin/face/face_facecompare
//         //腾讯ai
//             $.ajax({
//                 url: 'https://api.ai.qq.com/fcgi-bin/face/face_facecompare',
//                 type: 'POST',
//                 data: {
//                     app_id: '1106813649',
//                     time_stamp: (new Date()).getTime(),
//                     nonce_str: document.write(randomString(32)),
//                     // sign:
//                     outer_id:'face_tokens'
//                 }
//             })
//         //    search
//         $.ajax({
//             url: 'https://api-cn.faceplusplus.com/facepp/v3/search',
//             type: 'POST',
//             data: {
//                 api_key: 'PlCqTpw9tZbKnBVlFVV4y5FHMx-IS8ST',
//                 api_secret: '6vuzkwTsMe3NoWMlZEm4mvydn_5IJiOb',
//                 image_url: 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=740842372,4044357589&fm=27&gp=0.jpg',
//                 outer_id:'face_tokens'
//             }
//         })
//
//
//     })
// })
// function randomString(len) {
//     len = len || 32;
//     var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';    /****默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1****/
//     var maxPos = $chars.length;
//     var pwd = '';
//     for (i = 0; i < len; i++) {
//         pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
//     }
//     return pwd;
// }

$(function () {
    var curId = 0,
        idArr = [1, 2, 3, 4, 5],
        sizeArr = [1, 2, 3],
        angelArr = [1, 2, 3],
        itemList = $('.item'),
        targetIdArr = [],

    //目标结果
        target = [{id: 1, count: 1}, {id: 2, count: 2}],

    //   关卡
        level = 1,

    // 倒计时
        limit = 90;

    timer = null;
    setCardId($('.items-wrp'), idArr, sizeArr, angelArr, target)
    $('.item').on('click', function () {
        curId = $(this).attr('data-id');
        if (targetIdArr.indexOf(curId) > -1) {
            $(this).addClass('active')
        }
    })
});

function setCardId(container, idArr, sizeArr, angleArr, target) {
    var itemDom = '<div class="item"></div>';
    //目标结果id及数量
    var targetCount = 0,
        _idArr = idArr.slice(0),
        _sizeArr = sizeArr.slice(0),
        _angleArr = angleArr.slice(0);

    Array.prototype.indexOf = function (val) { //prototype 给数组添加属性
        for (var i = 0; i < this.length; i++) { //this是指向数组，this.length指的数组类元素的数量
            if (this[i] == val) return i; //数组中元素等于传入的参数，i是下标，如果存在，就将i返回
        }
        return -1;
    };
    Array.prototype.remove = function (val) {  //prototype 给数组添加属性
        var index = this.indexOf(val); //调用index()函数获取查找的返回值
        if (index > -1) {
            this.splice(index, 1); //利用splice()函数删除指定元素，splice() 方法用于插入、删除或替换数组的元素
        }
    };

    target.forEach(function (item, index) {
        targetIdArr.push(item.id);
        //从idArr上删除即将设定为目标的元素id
        _idArr.remove(item.id);
    });

    target.forEach(function (item, index) {
        for (var i = 0; i < item.count; i++) {
            targetCount++;
            var sizeId = Math.floor(Math.random() * _sizeArr.length),
                angleId = Math.floor(Math.random() * _angleArr.length);
            container.append(itemDom);
            $('.item').eq(targetCount - 1).addClass('item' + item.id + '\v' + 'size' + (sizeId + 1) + '\v' + 'angle' + (angleId + 1))
            $('.item').eq(targetCount - 1).attr('data-id', item.id)
        }
    });

    for (var i = 0; i < 20; i++) {
        var index = Math.floor(Math.random() * _idArr.length),
            sizeId = Math.floor(Math.random() * _sizeArr.length),
            angleId = Math.floor(Math.random() * _angleArr.length);
        container.append(itemDom);
        $('.item').eq(i + targetCount).addClass('item' + _idArr[index] + '\v' + 'size' + (sizeId + 1) + '\v' + 'angle' + (angleId + 1))
        $('.item').eq(i + targetCount).attr('data-id', _idArr[index])
    }
}