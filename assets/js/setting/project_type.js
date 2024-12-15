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
$("#form_add").validate({
    onclick: false,
    rules: {
        "name": {
            required: true,
        },
        "status": {
            required: true,
        },
        "price": {
            required: true,
        },
        "file_ex": {
            required: true,
        },
        "list_brand[]": {
            required: true,
        },
    },
    messages: {
        "name": {
            required: "Nhập tên dự án",
        },
        "status": {
            required: 'Chọn trạng thái',
        },
        "price": {
            required: "Không được để trống",
        },
        "file_ex": {
            required: "Không được để trống",
        },
        "list_brand[]": {
            required: "Không được để trống",
        },
    },
    submitHandler: function (form) {
        $('.btn_add_project').prop('disabled', true);
        var data = new FormData($("#form_add")[0]);
        var check_discount = true;
        var check_job_type = true;
        $('.name_discount').each(function () {
            if ($(this).val() == '') {
                $(this).parent().find('.error').text('Không được để trống');
                check_discount = false;
                return false;
            } else {
                $(this).parent().find('.error').text('');
                check_discount = true;
            }
        });
        $('.val_discount').each(function () {
            if ($(this).val() == '') {
                $(this).parent().find('.error').text('Không được để trống');
                check_discount = false;
                return false;
            } else {
                $(this).parent().find('.error').text('');
                check_discount = true;
            }
        });
        $('.list_discount_2').each(function (index) {
            if ($(this).find('.name_discount').val() != '' && $(this).find('.val_discount').val() != '') {
                data.append('data_discount[' + index + '][name]', $(this).find('.name_discount').val());
                data.append('data_discount[' + index + '][number]', $(this).find('.val_discount').val());
            }
        });
        if ($('.list_job_type').find('.job_type').length > 0) {
            $('.list_job_type').find('.job_type').each(function () {
                $(this).parents('.list_job_type_2').find('.error').text('Không được để trống');
                if ($(this).val() > 0) {
                    $(this).parents('.list_job_type_2').find('.error').text('');
                    check_job_type = true;

                } else {
                    check_job_type = false;
                    return false;
                }
            })
        }
        if ($('.list_job_type').find('.number').length > 0) {
            $('.list_job_type').find('.number').each(function () {
                $(this).parents('.list_job_type_2').find('.error').text('Không được để trống');
                if ($(this).val() != '') {
                    $(this).parents('.list_job_type_2').find('.error').text('');
                    check_job_type = true;

                } else {
                    check_job_type = false;
                    return false;
                }
            })
        }
        $('.list_job_type_2').each(function (index) {
            if ($(this).data('index') == 1) {
                $(this).find('.error_ratio').text('Không được để trống');
                if ($(this).find('.ratio').val() != '') {
                    $(this).find('.error_ratio').text('');
                    check_job_type = true;

                } else {
                    check_job_type = false;
                    return false;
                }
            }
        });
        $('.list_job_type_2').each(function (index) {
            if ($(this).find('.job_type').val() > 0 && $(this).find('.number').val() > 0) {
                data.append('data_job_type[' + index + '][job_type]', $(this).find('.job_type').val());
                data.append('data_job_type[' + index + '][number]', $(this).find('.number').val());
                data.append('data_job_type[' + index + '][index]', $(this).data('index'));
                data.append('data_job_type[' + index + '][ratio]', $(this).find('.ratio').val());
            }
        });
        if ( check_discount == false || check_job_type == false) {
            return false;
        }
        $.ajax({
            url: '/add_project_type',
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
        text: "Bạn chắc chắn muốn xóa loại dự án?",
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
        data.append('table', 'project_type');
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
});

$('.img_edit').click(function () {
    var img_edit = $(this).data('id');
    var data = new FormData();
    data.append('id', img_edit);
    data.append('table', 'project_type');
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
                $('#form_add').find('input[name="price"]').val(response.array_data.price);
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
var id_filter = 0, bank_type = 0, created_at_start = 0, created_at_end = 0, au = 0, n = 0, br = 0, get_type = '';
function filter_select(e) {
    job_type = $('select[name="job_type"]').val() ? $('select[name="job_type"]').val() : 0;
    n = encodeURIComponent($('select[name="name"]').val());
    au = encodeURIComponent($('select[name="author"]').val());
    bank_type = $('select[name="stt_in"]').val();
    br = $('select[name="brand"]').val() ? $('select[name="brand"]').val() : 0;
    created_at_start = new Date($('input[name="created_at_start"]').val()).getTime() / 1000 - 25200;
    created_at_end = new Date($('input[name="created_at_end"]').val()).getTime() / 1000 - 25200 + 84600;
    filter()
}
function filter() {
    var get_type = '', get_type_job = '', get_created = '', get_created_end = '', get_au = '', get_n = '', get_br = '';
    if (n != 0) {
        get_n = '&n=' + n;
    }
    if (au != 0) {
        get_au = '&au=' + au;
    }
    if (bank_type != 0) {
        get_type = '&type=' + bank_type;
    }
    if (created_at_start > 0) {
        get_created = '&cs=' + created_at_start;
    }
    if (created_at_end > 0) {
        get_created_end = '&ce=' + created_at_end;
    }
    if (br > 0) {
        get_br = '&br=' + br;
    } if (job_type != 0) {
        get_type_job = '&type_job=' + job_type;
    }
    var url_filter = "/loai-du-an/?id=" + id_filter + get_created + get_created_end + get_type + get_au + get_n + get_br + get_type_job;
    window.location.href = url_filter;
}
function index_job_type(e) {
    var status_index = 1;
    if ($(e).prop('checked')) {
        $(e).parents('.list_job_type_2').find(".inp_status_index").prop('checked', false);
        $(e).prop('checked', true);
        status_index = $(e).data('val');
        $(e).parents('.list_job_type_2').data('index', status_index)
        if (status_index == 0) {
            $(e).parents('.list_job_type_2').find('.ratio').val('');
            $(e).parents('.list_job_type_2').find('.ratio').attr('disabled', true);
        } else {
            $(e).parents('.list_job_type_2').find('.ratio').attr('disabled', false);
        }
    } else {
        $(e).prop('checked', true);
    }
}
var job_index = $('.name_index_2').html();
$('.add_index').click(function () {
    var html = `<div class="list_index_2">
                    <div class="this_add_project w_50 inp_index">
                        `+ job_index + `
                        <p class="error error_name"></p>
                    </div>
                    <div class="this_add_project w_50 inp_index">
                        <input type="text" placeholder="Nhập ghi chú" class="num_index" value="75">
                                    <p class="ab_%">| %</p>
                        <p class="error error_num"></p>
                    </div>
                    <div class="del_index" onclick="del_index(this)">
                        <img src="/images/del2.svg" alt="xóa">
                    </div>
                </div>`;
    $('.list_index').append(html);
});
$('.add_discount').click(function () {
    var html = `<div class="list_discount_2">
                    <div class="this_add_project w_50 inp_index">
                        <input type="text" placeholder="Nhập" class="name_discount" value="">
                        <p class="error error_name"></p>
                    </div>
                    <div class="this_add_project w_50 inp_index">
                        <input type="text" placeholder="Nhập" class="val_discount" value="">
                        <p class="error error_val"></p>
                    </div>
                    <div class="del_index" onclick="del_index(this)">
                        <img src="/images/del2.svg" alt="xóa">
                    </div>
                </div>`;
    $('.list_discount').append(html);
});
var job_type = $('.job_type_2').html();
$('.add_job_type').click(function () {
    var length_job_type = $('.list_job_type_2').length + 1;
    var html = `<div class="list_job_type_2">
                     <div class="this_add_project w_30 inp_index">
                        <div class="d_flex justify_content_space">
                            <p class="title_input">Loại công việc</p>
                            <div class="job_type_index d_flex ">
                                <p class="title_input">Index</p>
                                <div class="data_index">
                                    <input type="checkbox" data-val="1" checked class="inp_status_index" onclick="index_job_type(this)" id="checkbox`+ length_job_type + `a">
                                    <label for="checkbox`+ length_job_type + `a" class="checkmark"></label>
                                    <p>Có</p>
                                </div>
                                <div class="data_index">
                                    <input type="checkbox" data-val="0" class="inp_status_index" onclick="index_job_type(this)" id="checkbox`+ length_job_type + `b">
                                    <label for="checkbox`+ length_job_type + `b" class="checkmark"></label>
                                    <p>Không</p>
                                </div>
                            </div>
                        </div>
                       `+ job_type + `
                        <p class="error error_name"></p>
                    </div>
                    <div class="this_add_project w_30 inp_index data_discount">
                                    <p class="title_input">Số lượng</p>
                                    <input type="text" class="input_num number" placeholder="Nhập">
                                    <p class="error error_val"></p>
                                </div>
                    <div class="this_add_project w_30 inp_index data_discount">
                                    <p class="title_input">Tỉ lệ index mong muốn </p>
                                    <input type="text" class="input_num ratio" placeholder="Nhập">
                                    <p class="error error_ratio"></p>
                                </div>
                    <div class="del_index" onclick="del_index(this)">
                        <img src="/images/del2.svg" alt="xóa">
                    </div>
                </div>`;
    $('.list_job_type').append(html);
    $('.select2').select2({
        placeholder: 'Chọn',
        'height': '100%'
    }); updateSelectOptions();
});
function del_index(e) {
    $(e).parent().remove();
}
function export_excel() {
    var currentUrl = window.location.search;
    // console.log(currentUrl);
    window.location.href = '/excel_project_type/' + currentUrl;
}
function updateSelectOptions(e) {
    var selectedValues = [];
    $('.list_job_type').find('.job_type').each(function () {
        var selectedValue = $(this).val();
        if (selectedValue) {
            selectedValues.push(selectedValue);
        }
    });
    console.log(selectedValues)
    $('.list_job_type').find('.job_type').each(function () {
        var $select = $(this);
        var currentSelected = $select.val();
        console.log(currentSelected)
        $select.find('option').each(function () {
            var $option = $(this);
            $option.prop('disabled', false);
            if (selectedValues.includes($option.val()) && $option.val() != currentSelected) {
                $option.prop('disabled', true);
            }
        });
        $select.select2();
    });
    var value_job_type = $(e).val();
    if (value_job_type > 0) {
        var data = new FormData();
        data.append('id', value_job_type);
        data.append('table', 'job_type');
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
                    $(e).parents('.list_job_type_2').find('.ratio').val(response.array_data.ratio);
                    if (response.array_data.status_index == 0) {
                        $(e).parents('.list_job_type_2').find('.ratio').val('');
                        $(e).parents('.list_job_type_2').find('.ratio').attr('disabled', true);
                    } else {
                        $(e).parents('.list_job_type_2').find('.ratio').attr('disabled', false);
                    }
                    $(e).parents('.list_job_type_2').find(".inp_status_index").prop('checked', false);
                    $(e).parents('.list_job_type_2').find('.inp_status_index').each(function () {
                        if ($(this).data('val') == response.array_data.status_index) {
                            $(this).prop('checked', true);
                        }
                    })
                    $(e).parents('.list_job_type_2').data('index', response.array_data.status_index)
                }
            },
            error: function (xhr) {
                alert('Thất bại');
            }
        });
    }
} updateSelectOptions();