$('.select2').select2({
    placeholder: 'Chọn',
    'height': '100%'
});
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
        "name": {
            required: true,
        },
        "stk": {
            required: true,
        },
        "bank": {
            required: true,
        },
        "status": {
            required: true,
        },
    },
    messages: {
        "name": {
            required: "Nhập tên đầu việc",
        },
        "stk": {
            required: 'Nhập STK',
        },
        "bank": {
            required: "Chọn ngân hàng",
        },
        "status": {
            required: 'Chọn trạng thái',
        },
    },
    submitHandler: function (form) {
        $('.btn_add_project').prop('disabled', true);
        var data = new FormData($("#form_add")[0]);
        $.ajax({
            url: '/add_input_source',
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
                $('.btn_add_project').prop('disabled', false);
            },
            error: function (xhr) {
                alert('Thất bại');
                $('.btn_add_project').prop('disabled', false);

            }
        });
        return false;
    }
});
$('.btn_del').click(function () {
    swal({
        title: "Xác nhận",
        text: "Bạn chắc chắn muốn xóa?",
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
        data.append('table', 'input_source');
        $.ajax({
            url: '/delete_type',
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
$('.img_edit').click(function () {
    var img_edit = $(this).data('id');
    var data = new FormData();
    data.append('id', img_edit);
    data.append('table', 'input_source');
    $.ajax({
        url: '/get_table',
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
                $('#form_add').find('input[name="id"]').val(img_edit);
                $('#form_add').find('input[name="name"]').val(response.array_data.name);
                $('#form_add').find('input[name="stk"]').val(response.array_data.stk);
                $('#form_add').find('select[name="bank"]').find('option').each(function () {
                    $(this).prop('selected', false);
                    if ($(this).val() == response.array_data.bank) {
                        $(this).prop('selected', true);
                        var value = $(this).val();
                        $('#form_add').find('select[name="bank"]').val(value).trigger('change');
                    }
                });
                $('#form_add').find('select[name="status"]').find('option').each(function () {
                    $(this).prop('selected', false);
                    if ($(this).val() == response.array_data.status) {
                        $(this).prop('selected', true);
                    }
                });
                $('.popup_add_project').show()
            }
        },
        error: function (xhr) {
            alert('Thất bại');
        }
    });
})
function onlyNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
var id_filter = 0, bank_type = 0, stk = 0, created_at_start = 0, created_at_end = 0, au = 0, ni = 0, nb = 0;
function filter_select(e) {
    ni = encodeURIComponent($('select[name="name"]').val());
    au = encodeURIComponent($('select[name="author"]').val());
    nb = encodeURIComponent($('select[name="name_bank"]').val());
    bank_type = $('select[name="stt_in"]').val();
    stk = $('select[name="stk"]').val();
    input_source = $('select[name="input_source"]').val();
    created_at_start = new Date($('input[name="created_at_start"]').val()).getTime() / 1000 - 25200;
    created_at_end = new Date($('input[name="created_at_end"]').val()).getTime() / 1000 - 25200 + 84600;
    filter()
}
function filter() {
    var get_type = '', get_stk = '', get_created = '', get_created_end = '', get_au = '', get_ni = '', get_nb = '';
    if (ni != 0) {
        get_ni = '&ni=' + ni;
    }
    if (au != 0) {
        get_au = '&au=' + au;
    }
    if (nb != 0) {
        get_nb = '&nb=' + nb;
    }
    if (bank_type != 0) {
        get_type = '&type=' + bank_type;
    }
    if (stk != 0) {
        get_stk = '&stk=' + stk;
    }
    if (created_at_start > 0) {
        get_created = '&cs=' + created_at_start;
    }
    if (created_at_end > 0) {
        get_created_end = '&ce=' + created_at_end;
    }
    var url_filter = "/thong-tin-nguon-nhan/?id=" + id_filter + get_created + get_created_end + get_type + get_stk + get_au + get_ni + get_nb;
    window.location.href = url_filter;
}
function export_excel() {
    var currentUrl = window.location.search;
    // console.log(currentUrl);
    window.location.href = '/excel_input_source/' + currentUrl;
}