$('.check_full').click(function () {
    if ($(this).prop('checked')) {
        $(this).parents('table').find('.check_i').prop('checked', true);
        $('.box_btn_project').show();
    } else {
        $(this).parents('table').find('.check_i').prop('checked', false);
        $('.box_btn_project').hide();
    }
})
$('.check_i').click(function () {
    if ($(this).prop('checked')) {
        if (!$('.box_btn_project').is(':visible')) {
            $('.box_btn_project').show();
        }
    } else {
        var check_box = 0;
        $('.check_i').each(function () {
            if ($(this).prop('checked')) {
                check_box = 1;
            }
        })
        if (check_box == 0 && $('.box_btn_project').is(':visible')) {
            $('.box_btn_project').hide();
        } else if (check_box == 1 && !$('.box_btn_project').is(':visible')) {
            $('.box_btn_project').show();
        }
    }
})
$('.btn_project_cancel').click(function () {
    $(this).parents('.main_filter').find('input[type="checkbox"]').prop('checked', false);
    $('.box_btn_project').hide();
})
$('.add_project').click(function () {
    $('.popup_add_project').show();
})
$("#form_add").validate({
    onclick: false,
    rules: {
        "username": {
            required: true,
        },
        "password": {
            required: true,
        },
        "name": {
            required: true,
        },
        "phone": {
            required: true,
            minlength: 8,
            digits: true
        },
        "email": {
            required: true,
            email: true
        },
        "role": {
            required: true,
        },
        "list_brand[]": {
            required: true,
        },
        "status": {
            required: true,
        },
    },
    messages: {
        "username": {
            required: "Tên đăng nhập trống",
        },
        "password": {
            required: "Mật khẩu trống",
        },
        "name": {
            required: "Họ và tên trống",
        },
        "phone": {
            required: "Số điện thoại trống",
            minlength: "Sai định dạng",
            digits: "Sai định dạng"
        },
        "email": {
            required: "Email trống",
            email: "Sai định dạng email"
        },
        "role": {
            required: "Chưa chọn vai trò",
        },
        "list_brand[]": {
            required: "Không được để trống",
        },
        "status": {
            required: "Chưa chọn trạng thái",
        },
    },
    submitHandler: function (form) {
        var data = new FormData($("#form_add")[0]);
        $.ajax({
            url: '/add_user',
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
        return false;
    }
});
var check_edit = 0;
var id_edit = 0
var tag_edit = '';
function edit_text(e, tag, id) {
    if (check_edit == 0) {
        check_edit = 1;
        $(e).attr('contenteditable', 'true');
        var val = $(e).text();
        if (val != '') {
            id_edit = id;
            tag_edit = tag;
        } else {
            swal({
                title: "Có lỗi xảy ra",
                text: "Không được để trống",
                type: "error",
            });
        }
        return false;
    }
}
$('.edit_text').keypress(function (event) {
    if (event.keyCode == 13 || event.which == 13) {
        ajax_edit(this, tag_edit, id_edit)
    }
});
function ajax_edit(e, tag, id) {
    var val = $(e).text();
    var data = new FormData();
    data.append('name', tag);
    data.append('value', val);
    data.append('id', id);
    $.ajax({
        url: '/change_input_source',
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
                    $(e).removeAttr('contenteditable');
                    check_edit = 0;
                    $(e).text(val)
                });
            }
        },
        error: function (xhr) {
            alert('Thất bại');

        }
    });
}
// function edit_option(e) {
//     if (check_edit == 0) {
//         check_edit = 1;
//         $(e).find('.status_project').addClass('active');
//     }
// }
// function change_option(e, tag) {
//     swal({
//         title: "Xác nhận",
//         text: "Bạn có muốn chuyển tài khoản này thành " + $(e).text() + "?",
//         type: "info",
//         showCancelButton: true,
//         confirmButtonColor: "#DD6B55",
//         confirmButtonText: "Có",
//         cancelButtonText: "Không",
//         closeOnConfirm: false,
//         showLoaderOnConfirm: true
//     }, function () {
//         var data = new FormData();
//         data.append('name', tag);
//         data.append('value', $(e).data('val'));
//         data.append('id', $(e).parents('.status_project').data('id'));
//         $.ajax({
//             url: '/change_user',
//             type: "POST",
//             cache: false,
//             contentType: false,
//             processData: false,
//             dataType: "json",
//             data: data,
//             success: function (response) {
//                 if (response.status == 0) {
//                     swal({
//                         title: "Có lỗi xảy ra",
//                         text: response.msg,
//                         type: "error",
//                     });
//                 } else {
//                     swal({
//                         title: "Thành công",
//                         text: response.msg,
//                         type: "success",
//                     }, function () {
//                         check_edit = 0;
//                         window.location.reload();
//                     });
//                 }
//             },
//             error: function (xhr) {
//                 alert('Thất bại');

//             }
//         });
//     })
// }

$("#form_edit").validate({
    onclick: false,
    rules: {
        "username": {
            required: true,
        },
        "name": {
            required: true,
        },
        "phone": {
            required: true,
            minlength: 8,
            digits: true
        },
        "email": {
            required: true,
            email: true
        },
        "role": {
            required: true,
        },
        "list_brand[]": {
            required: true,
        },
        "status": {
            required: true,
        },
    },
    messages: {
        "username": {
            required: "Tên đăng nhập trống",
        },
        "name": {
            required: "Họ và tên trống",
        },
        "phone": {
            required: "Số điện thoại trống",
            minlength: "Sai định dạng",
            digits: "Sai định dạng"
        },
        "email": {
            required: "Email trống",
            email: "Sai định dạng email"
        },
        "role": {
            required: "Chưa chọn vai trò",
        },
        "list_brand[]": {
            required: "Không được để trống",
        },
        "status": {
            required: "Chưa chọn trạng thái",
        },
    },
    submitHandler: function (form) {
        var data = new FormData($("#form_edit")[0]);
        $.ajax({
            url: '/edit_user',
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
        return false;
    }
});
$('.edit_account').click(function () {
    var data = new FormData();
    data.append('id', $(this).data('id'));
    $.ajax({
        url: '/get_user',
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
                $('.update_account').find('input[name="id"]').val(response.user.id);
                $('.update_account').find('input[name="username"]').val(response.user.username);
                $('.update_account').find('input[name="name"]').val(response.user.name);
                $('.update_account').find('input[name="phone"]').val(response.user.phone);
                $('.update_account').find('input[name="email"]').val(response.user.email);
                $('.update_account').find('.select_add').find('option').each(function () {
                    if ($(this).attr('value') == response.user.role) {
                        $(this).attr('selected', true);
                    }
                })
                if (response.user.role == 6) {
                    var arr;
                    if (response.user.list_brand && (response.user.list_brand).indexOf(',') !== -1) {
                        arr = (response.user.list_brand).split(",");
                        $('.list_brand').val(arr).trigger('change');
                    } else if (response.user.list_brand && (response.user.list_brand).indexOf(',') === -1){
                        arr = [(response.user.list_brand)];
                    $('.list_brand').val(arr).trigger('change');
                    }
                    $('.update_account').find('.sl_job_type').show();
                }

                $('.update_account').find('.status').find('option').each(function () {
                    if ($(this).attr('value') == response.user.status) {
                        $(this).attr('selected', true);
                    }
                })
                $('.update_account').show();
                $('.add_account').hide();
                $('.popup_add_project').show();
            }
        },
        error: function (xhr) {
            alert('Thất bại');

        }
    });
})
$(document).click(function (event) {
    $target = $(event.target);
    if (!$target.closest('.status_project').length && $('.status_project').is(":visible") && !$target.closest('.status_project').length) {
        $('.status_project').removeClass(' active');
        check_edit = 0;
    }

});

$('.btn_del').click(function () {
    swal({
        title: "Xác nhận",
        text: "Bạn chắc chắn muốn xóa người dùng?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Có",
        cancelButtonText: "Không",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {
        var checkedIds = [];
        $('.check_i').each(function () {
            if ($(this).prop('checked')) {
                checkedIds.push($(this).val());
            }
        })
        var data = new FormData();
        data.append('arr_id', checkedIds);
        $.ajax({
            url: '/delete_user',
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
});

$('.username').on('keypress', function (event) {
    let key = event.key;
    if (!/[a-zA-Z0-9]/.test(key) || key === ' ') {
        event.preventDefault();
    }
});

$('.add_role').change(function () {
    if ($(this).val() == 6) {
        $('.sl_job_type').show();
    } else {
        $('.sl_job_type').hide();
    }
})
var id_filter = 0, bank_type = 0, created_at_start = 0, created_at_end = 0, p = 0, r = 0, acc = 0;
function filter_select(e) {
    r = encodeURIComponent($('select[name="r"]').val());
    p = encodeURIComponent($('select[name="p"]').val());
    bank_type = $('select[name="stt_in"]').val();
    acc = $('select[name="acc"]').val();
    created_at_start = new Date($('input[name="created_at_start"]').val()).getTime() / 1000 - 25200;
    created_at_end = new Date($('input[name="created_at_end"]').val()).getTime() / 1000 - 25200 + 84600;
    filter()
}
function filter() {
    var get_type = '', get_created = '', get_created_end = '', get_p = '', get_r = '', get_acc = '';
    if (r != 0) {
        get_r = '&r=' + r;
    }
    if (p != 0) {
        get_p = '&p=' + p;
    }
    if (bank_type != 0) {
        get_type = '&type=' + bank_type;
    }
    if (acc != 0) {
        get_acc = '&acc=' + acc;
    }
    if (created_at_start > 0) {
        get_created = '&cs=' + created_at_start;
    }
    if (created_at_end > 0) {
        get_created_end = '&ce=' + created_at_end;
    }
    var url_filter = "/tai-khoan/?id=" + id_filter + get_created + get_created_end + get_type + get_p + get_r + get_acc;
    window.location.href = url_filter;
}
function export_excel() {
    var currentUrl = window.location.search;
    // console.log(currentUrl);
    window.location.href = '/excel_accounts/' + currentUrl;
}