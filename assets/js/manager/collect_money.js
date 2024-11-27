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
            url: '/delete_money',
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
$('.add_index').click(function () {
    var html = `<div class="list_index_2">
                    <div class="this_add_project w_50 inp_index">
                        <input type="text" placeholder="Nhập ghi chú" class="name_index">
                        <p class="error error_name"></p>
                    </div>
                    <div class="this_add_project w_50 inp_index">
                        <input type="text" placeholder="Nhập ghi chú" class="num_index">
                        <p class="error error_num"></p>
                    </div>
                </div>`;
    $('.list_index').append(html);
});
var status_index = 1;
$('.inp_status_index').click(function () {
    if ($(this).prop('checked')) {
        $(".inp_status_index").prop('checked', false);
        $(this).prop('checked', true);
        status_index = $(this).data('val');
        if (status_index == 0) {
            $('.list_index').hide();
            $('.status_index.active').removeClass('active');
        } else {
            $('.list_index').show();
            $('.status_index').addClass('active');
        }
    }
});
$("#form_add").validate({
    onclick: false,
    rules: {
        "money": {
            required: true,
        },
        "bank_type": {
            required: true,
        },
        "bank_status": {
            required: true,
        },
        "bank_status": {
            required: true,
        },
        "bank_time": {
            required: true,
        },
        "project_id": {
            required: true,
        },
    },
    messages: {
        "money": {
            required: "Không được để trống",
        },
        "bank_type": {
            required: "Không được để trống",
        },
        "bank_status": {
            required: "Không được để trống",
        },
        "bank_status": {
            required: "Không được để trống",
        },
        "bank_time": {
            required: "Không được để trống",
        },
        "project_id": {
            required: "Không được để trống",
        },
    },
    submitHandler: function (form) {
        console.log(status_index)
        var data = new FormData($("#form_add")[0]);
        $.ajax({
            url: '/add_collect_money',
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

function toUpperCaseInput(evt) {
    var input = evt.target;
    input.value = input.value.toUpperCase();
}
var id_filter = 0, bank_type = 0, bs = 0, bc = '', created_at_start = 0, created_at_end = 0, cus = 0, input_source = 0, ts = 0, te = 0;
function filter_select(e) {
    id_filter = $('select[name="project"]').val() ? $('select[name="project"]').val() : 0;
    cus = $('select[name="customer"]').val() ? encodeURIComponent($('select[name="customer"]').val()) : 0;
    bank_type = $('select[name="type"]').val() ? $('select[name="type"]').val() : 0;
    bs = $('select[name="bank_status"]').val() ? $('select[name="bank_status"]').val() : 0;
    bc = $('select[name="bank_code"]').val() ? $('select[name="bank_code"]').val() : 0;
    input_source = $('select[name="input_source"]').val() ? $('select[name="input_source"]').val() : 0;
    created_at_start = $('input[name="created_at_start"]').val() ? new Date($('input[name="created_at_start"]').val()).getTime() / 1000 - 25200 : 0;
    created_at_end = $('input[name="created_at_end"]').val() ? new Date($('input[name="created_at_end"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    ts = $('input[name="time_s"]').val() ? new Date($('input[name="time_s"]').val()).getTime() / 1000 - 25200 : 0;
    te = $('input[name="time_e"]').val() ? new Date($('input[name="time_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    filter()
}
function filter() {
    var get_type = '', get_bs = '', get_bc = '', get_created = '', get_created_end = '', get_cus = '', get_in = '', get_ts = '', get_te = '';
    if (cus != 0) {
        get_cus = '&cus=' + cus;
    }
    if (bank_type != 0) {
        get_type = '&type=' + bank_type;
    }
    if (bs != 0) {
        get_bs = '&bs=' + bs;
    }
    if (bc != '') {
        get_bc = '&bc=' + bc;
    }
    if (input_source != 0) {
        get_in = '&in=' + input_source;
    }
    if (created_at_start > 0) {
        get_created = '&cs=' + created_at_start;
    }
    if (created_at_end > 0) {
        get_created_end = '&ce=' + created_at_end;
    }
    if (ts > 0) {
        get_ts = '&ts=' + ts;
    }
    if (te > 0) {
        get_te = '&te=' + te;
    }
    var url_filter = "/quan-ly-thu-tien/?id=" + id_filter + get_created + get_created_end + get_type + get_bs + get_bc + get_cus + get_in + get_ts + get_te;
    window.location.href = url_filter;
}

function export_excel() {
    var currentUrl = window.location.search;
    // console.log(currentUrl);
    window.location.href = '/excel_collect_money/' + currentUrl;
}