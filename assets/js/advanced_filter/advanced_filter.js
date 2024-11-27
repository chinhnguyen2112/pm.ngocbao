$('.check_full').click(function () {
    if ($(this).prop('checked')) {
        $(this).parent().parent().find('.check_i').prop('checked', true);
    } else {
        $(this).parent().parent().find('.check_i').prop('checked', false);
    }
});
$('.check_i').click(function () {
    if (!$(this).prop('checked')) {
        $(this).parent().parent().find('.check_full').prop('checked', false);
    }
})
var list_advanced = $('.list_advanced_filter').val();
var page_id = $('.list_advanced_filter').data('page');
var page_class = 'list_data_advanced_' + page_id;
var array_advanced;
if (list_advanced === '') {
    $('.show_advanced').append($('.' + page_class).html());
} else {
    array_advanced = list_advanced.split(",").map(Number);
    $('.' + page_class).find('.this_advanced').each(function () {
        console.log($(this).data('value'))
        if (array_advanced.includes($(this).data('value'))) {
            $('.hide_advanced').append($(this));
        } else {
            $('.show_advanced').append($(this));
        }
    })
}
$('.save_project').click(function () {
    swal({
        title: "Xác nhận",
        text: "Bạn chắc chắn lưu cấu hình này?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Có",
        cancelButtonText: "Không",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {
        var checked_hide = [];
        $('.show_advanced').find('.check_i').each(function () {
            if ($(this).prop('checked')) {
                checked_hide.push($(this).val());
            }
        })
        $('.hide_advanced').find('.check_i').each(function () {
            if (!$(this).prop('checked')) {
                checked_hide.push($(this).val());
            }
        })
        var data = new FormData();
        data.append('arr_hide', checked_hide);
        data.append('page_id', page_id);
        $.ajax({
            url: '/save_advanced_filter',
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            data: data,
            success: function (response) {
                if (response.status == 0) {
                    swal({
                        title: "Có lỗi xảy ra",
                        text: response.msg,
                        type: "error",
                    });
                } else {
                    swal({
                        title: "Thành công",
                        text: response.msg,
                        type: "success",
                    }, function () {
                        window.location.reload();
                    });
                }
            },
            error: function (xhr) {
                alert('Thất bại');

            }
        });
    });
})
