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
        var check_return = false;
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
            if ($(this).find('.job_type').val() > 0 && $(this).find('.number').val() > 0) {
                data.append('data_job_type[' + index + '][job_type]', $(this).find('.job_type').val());
                data.append('data_job_type[' + index + '][number]', $(this).find('.number').val());
            }
        });
        if (status_index == 1) {
            $('.name_index').each(function () {
                if ($(this).find('option:selected').val() > 0) {
                    check_return = true;
                    $(this).parent().find('.error').text('');
                } else {
                    $(this).parent().find('.error').text('Không được để trống');
                    check_return = false;
                    return false;
                }
            });
            $('.num_index').each(function () {
                if ($(this).val() == '') {
                    $(this).parent().find('.error').text('Không được để trống');
                    check_return = false;
                    return false;
                } else {
                    $(this).parent().find('.error').text('');
                    check_return = true;
                }
            });
            $('.list_index_2').each(function (index) {
                if ($(this).find('.name_index').val() > 0 && $(this).find('.num_index').val() != '') {
                    data.append('data_index[' + index + '][name]', $(this).find('.name_index').val());
                    data.append('data_index[' + index + '][number]', $(this).find('.num_index').val());
                }
            });
        } else {
            check_return = true;
        }
        if (check_return == false || check_discount == false || check_job_type == false) {
            return false;
        }
        data.append('status_index', status_index);
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
var id_filter = 0, bank_type = 0, created_at_start = 0, created_at_end = 0, au = 0, n = 0, br = 0;
function filter_select(e) {
    n = encodeURIComponent($('select[name="name"]').val());
    au = encodeURIComponent($('select[name="author"]').val());
    bank_type = $('select[name="stt_in"]').val();
    br = $('select[name="brand"]').val() ? $('select[name="brand"]').val() : 0;
    created_at_start = new Date($('input[name="created_at_start"]').val()).getTime() / 1000 - 25200;
    created_at_end = new Date($('input[name="created_at_end"]').val()).getTime() / 1000 - 25200 + 84600;
    filter()
}
function filter() {
    var get_type = '', get_created = '', get_created_end = '', get_au = '', get_n = '', get_br = '';
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
    }
    var url_filter = "/loai-du-an/?id=" + id_filter + get_created + get_created_end + get_type + get_au + get_n + get_br;
    window.location.href = url_filter;
}
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
    } else {
        $(this).prop('checked', true);
    }
}); var job_index = $('.name_index_2').html();
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
    var html = `<div class="list_job_type_2">
                     <div class="this_add_project w_50 inp_index">
                     <p class="title_input">Loại công việc</p>
                       `+ job_type + `
                        <p class="error error_name"></p>
                    </div>
                    <div class="this_add_project w_50 inp_index data_discount">
                                    <p class="title_input">Số lượng</p>
                                    <input type="text" class="input_num number" placeholder="Nhập">
                                    <p class="error error_val"></p>
                                </div>
                    <div class="del_index" onclick="del_index(this)">
                        <img src="/images/del2.svg" alt="xóa">
                    </div>
                </div>`;
    $('.list_job_type').append(html); 
    $('.select2').select2({
        placeholder: 'Chọn',
        'height': '100%'
    });updateSelectOptions();
});
function del_index(e) {
    $(e).parent().remove();
}

$('.inp_status_index').each(function () {
    if ($(this).prop('checked')) {
        status_index = $(this).data('val');
    }
    if (status_index == 0) {
        $('.list_index').hide();
        $('.status_index.active').removeClass('active');
    }
});
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
                    if (response.array_data.job_type) {
                        var job_type = JSON.parse(response.array_data.job_type);
                        var html_val = '';
                        job_type.forEach(function (item, index) {
                            html_val += ' <option value="' + item.id + '" >' + item.name + '</option>';
                        });
                        var html_dis = `<p class="title_input">Loại công việc</p>
                                            <select class="job_type select2">
                                                <option value="" >Chọn</option>
                                                `+ html_val + `
                                            </select>
                                             <p class="error error_val"></p>`;
                        $(e).parents('.list_job_type_2').find('.data_job_type').html(html_dis);
                        $('.select2').select2({
                            placeholder: 'Chọn',
                            'height': '100%'
                        });
                    }
                }
            },
            error: function (xhr) {
                alert('Thất bại');
            }
        });
    }
} updateSelectOptions();