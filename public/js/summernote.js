(function ($) {
    var $summernote = $('#summernote').summernote({
        callbacks: {
            onImageUpload: function (files) {
                sendFile($summernote, files[0]);
            },
            onMediaDelete: function (target) {
                removeFile(target);
            }
        }
    });

    //ajax上传图片
    function sendFile($summernote, file) {

        var formData = new FormData();
        formData.append("file", file);

        $.ajax({
            url: "/admin/article/upload",//
            data: formData,
            type: 'POST',

            //如果提交data是FormData类型，那么下面三句一定需要加上
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (data) {
                $('#summernote').summernote('insertImage', data.url);  //直接插入路径就行，filename可选
                console.log(data);
            },

            error: function () {
                alert("上传图片失败！");
            }
        });
    }

    //删除图片
    function removeFile(target) {
        var imgsrc = target[0].currentSrc;
        console.log(imgsrc)
        var formData = new FormData();
        formData.append("img", imgsrc);
        $.ajax({
            data: formData,
            type: "POST",
            url: "/admin/article/deleteImg",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
            }
        });

    }

})(jQuery)
