$(function () {
    //    swiper
     mySwiper = new Swiper('.swiper-container', {
        direction: 'vertical',
        autoplayStopOnLast: true,
        onInit: function (swiper) {
            swiperAnimateCache(swiper);
            swiperAnimate(swiper);
        },
        onSlideChangeEnd: function (swiper) {
            swiperAnimate(swiper);
        }
    });

    $('.btn-regulation').on('click', function () {
        $(this).siblings('.shade-regulation').show();
    })
    //    p2的按钮事件
    $('.swiper-wrapper .swiper-slide:nth-of-type(2) .btn-back').on('click', function () {
        $(this).parents('.shade-regulation').hide();
    })
    $('.btn-join').on('click', function () {
        $('.swiper-wrapper .swiper-slide:nth-of-type(2)').removeClass('swiper-no-swiping');
        mySwiper.slideTo(2, 500, false);
    })


    var upload_url = $('#upload').attr('data-url');
    var form_url = $('#form').attr('data-url');
    //    图片上传
    var uploader = WebUploader.create({

        // 选完文件后，是否自动上传。
        auto: true,

        // swf文件路径
        swf: 'Uploader.swf',

        // 文件接收服务端。
        server: upload_url,
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#filePicker',
        // 只允许选择图片文件。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/jpg,image/jpeg,image/png'
        },
        compress: false,

    });
    uploader.on('fileQueued', function (file) {
        var $li = $(
                '<div id="' + file.id + '" class="file-item thumbnail">' +
                '<img>' +
                '</div>'
            ),
            $btns = $('<div class="file-panel">' +
                '<span class="cancel">删除</span>').appendTo($li),
            $img = $li.find('img');

        uploader.options.formData.baseUrl = $('#fileList img').attr('src');

        // $list为容器jQuery实例
        $('#fileList').append($li);
        //        展示缩略图  选取图片按钮隐藏
        $('#fileList').css({
            'z-index': '2'
        })
        $('.addPhoto').hide();

        // 创建缩略图
        // 如果为非图片文件，可以不用调用此方法。
        // thumbnailWidth x thumbnailHeight 为 100 x 100
        uploader.makeThumb(file, function (error, src) {
            if (error) {
                $img.replaceWith('<span>不能预览</span>');
                return;
            }

            $img.attr('src', src);
        }, 100, 100);

        $btns.on('click', 'span', function () {
            var index = $(this).index(),
                deg;

            if (index == 0) {
                var $li = $('#' + file.id);
                $li.off().find('.file-panel').off().end().remove();
                $('.addPhoto').show()
                $('#fileList').css({
                    'z-index': '-1'
                })
            }

        });

    });



    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on('uploadSuccess', function (file, response) {
        $('#' + file.id).addClass('upload-state-done');
        $('#hideField').text(response._raw)

    });

    // 文件上传失败，显示上传出错。
    uploader.on('uploadError', function (file) {
        var $li = $('#' + file.id),
            $error = $li.find('div.error');

        // 避免重复创建
        if ( !$error.length ) {
            $error = $('<div class="error"></div>').appendTo( $li );
        }

        $error.text('上传失败');
    });


    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on('uploadComplete', function (file) {

        $('#' + file.id).find('.progress').remove();
    });


    // 表单提交
    $('.btn-submit').click(function () {
        var data = {
            nickname: $('form').find('.nickname').val(),
            phone: $('form').find('.phone').val(),
            city: $('form').find('.city').val(),
            shopname: $('form').find('.substore').val(),
            declaration: $('form').find('.manifesto').val(),
            photo: $('#hideField').text()
        };
        //表单必填检验
        var flag = inputCheck(data);

        var btn_submit = this;

        if (flag == true) {
            //重置表单
            $(this).parent('form')[0].reset();

            $.ajax({
                url: form_url,
                data: data,
                type: 'GET',

                success: function (data) {
                    $('.link-confirm').attr('href', JSON.parse(data).url)
                    $('.shade-audit ').show();
                },
            });
        }
    });
});


//表单检验

function inputCheck(data) {
    var flag = false;
    var telCheck = /^1[34578][0-9]{9}/;
    if (data.nickname == "") {
        swal("请输入昵称!");
        return flag = false;
    } else if (!telCheck.test(data.phone)) {
        swal("请输入正确的手机号!");
        return flag = false;
    } else if (data.city == "") {
        swal("请输入所在城市!");
        return flag = false;
    } else if (data.shopname == "") {
        swal("请输入分店名称!");
        return flag = false;
    } else if (data.declaration == "") {
        swal("请输入您爱的宣言!");
        return flag = false;
    } else if (data.photo == "") {
        swal("请上传您的照片!");
        return flag = false;
    }
    else if (data.nickname != "" && telCheck.test(data.phone) && data.city !== "" && data.shopname != "" && data.declaration != "" && data.photo != "") {
        return flag = true;
    }

}
