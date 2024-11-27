var status_index = $('.list_data_index').data('val');
$('.inp_status_index').click(function () {
    if ($(this).prop('checked')) {
        $(".inp_status_index").prop('checked', false);
        $(this).prop('checked', true);
        status_index = $(this).data('val');
    } else {
        $(this).prop('checked', true);
    }
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
// $('.add_project').click(function () {
//     $('.popup_add_project').show();
// })
$("#form_add").validate({
    onclick: false,
    rules: {
        "customer_id": {
            required: true,
        },
        "status": {
            required: true,
        },
    },
    messages: {
        "customer_id": {
            required: "không được để trống",
        },
        "status": {
            required: 'Chọn trạng thái',
        },
    },
    submitHandler: function (form) {
        $('.btn_add_project').prop('disabled', true);
        var data = new FormData($("#form_add")[0]);
        var check_return = true;
        if ($('.list_discount').find('.project_type').length > 0) {
            $('.list_discount').find('.project_type').each(function () {
                $(this).parents('.list_discount_2').find('.error').text('Không được để trống');
                if ($(this).val() > 0) {
                    $(this).parents('.list_discount_2').find('.error').text('');
                    check_return = true;

                } else {
                    check_return = false;
                    return false;
                }
            })
        }
        if ($('.list_discount').find('.val_discount').length > 0) {
            $('.list_discount').find('.val_discount').each(function () {
                $(this).parents('.list_discount_2').find('.error').text('Không được để trống');
                if ($(this).val() != '') {
                    $(this).parents('.list_discount_2').find('.error').text('');
                    check_return = true;

                } else {
                    check_return = false;
                    return false;
                }
            })
        }
        $('.list_discount_2').each(function (index) {
            if ($(this).find('.project_type').val() > 0 && $(this).find('.val_discount').val() > 0) {
                data.append('data_revenue[' + index + '][project_type]', $(this).find('.project_type').val());
                data.append('data_revenue[' + index + '][number]', $(this).find('.val_discount').val());
            }
        });
        if (check_return == false) {
            return false;
        }
        $.ajax({
            url: '/add_unit_price',
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
        text: "Bạn chắc chắn muốn xóa loại công việc?",
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
        data.append('table', 'job_type');
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
    data.append('table', 'unit_price');
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
                $('#form_add').find('input[name="revenue"]').val(response.array_data.revenue);
                $('#form_add').find('textarea[name="info"]').val(response.array_data.info);
                $('#form_add').find('select[name="status"]').find('option').each(function () {
                    $(this).prop('selected', false);
                    if ($(this).val() == response.array_data.status) {
                        $(this).prop('selected', true);
                    }
                });
                $('#form_add').find('select[name="project_type"]').find('option').each(function () {
                    $(this).prop('selected', false);
                    if ($(this).val() == response.array_data.project_type) {
                        $(this).prop('selected', true);
                        var value = $(this).val();
                        $('#form_add').find('select[name="project_type"]').val(value).trigger('change');
                    }
                });
                $('#form_add').find('select[name="customer_id"]').find('option').each(function () {
                    $(this).prop('selected', false);
                    if ($(this).val() == response.array_data.customer_id) {
                        $(this).prop('selected', true);
                        var value = $(this).val();
                        $('#form_add').find('select[name="customer_id"]').val(value).trigger('change');
                    }
                });
                $('#form_add').find('input[name="price"]').val(response.array_data.price);
                $('.popup_add_project').show()
            }
        },
        error: function (xhr) {
            alert('Thất bại');
        }
    });
})
var id_filter = 0, type_project = 0, created_at_start = 0, created_at_end = 0, au = 0, cus = 0, stt = 0;
function filter_select(e) {
    type_project = $('select[name="project_type"]').val();
    cus = encodeURIComponent($('select[name="customer"]').val());
    au = encodeURIComponent($('select[name="author"]').val());
    created_at_start = new Date($('input[name="created_at_start"]').val()).getTime() / 1000 - 25200;
    created_at_end = new Date($('input[name="created_at_end"]').val()).getTime() / 1000 - 25200 + 84600;
    stt = $('select[name="stt"]').val();
    filter()
}
function filter() {
    var get_type = '', get_created = '', get_created_end = '', get_au = '', get_cus = '', get_st = '';
    if (type_project != 0) {
        get_type = '&type=' + type_project;
    }
    if (cus != 0) {
        get_cus = '&cus=' + cus;
    }
    if (au != 0) {
        get_au = '&au=' + au;
    }
    if (created_at_start > 0) {
        get_created = '&cs=' + created_at_start;
    }
    if (created_at_end > 0) {
        get_created_end = '&ce=' + created_at_end;
    }
    if (stt != 0) {
        get_st = '&st=' + stt;
    }
    var url_filter = "/don-gia/?id=" + id_filter + get_created + get_created_end + get_type + get_au + get_cus + get_st;
    window.location.href = url_filter;
}
function export_excel() {
    var currentUrl = window.location.search;
    // console.log(currentUrl);
    window.location.href = '/excel_unit_price/' + currentUrl;
}
var project_type = $('.project_type_2').html();
$('.add_discount').click(function () {
    var html2 = `
                 <div class="list_discount_2">
                    <div class="this_add_project w_50 inp_index">
                        <p class="title_input">Loại dự án</p>
                        `+ project_type + `
                        <p class="error error_name"></p>
                    </div>
                    <div class="this_add_project w_50 inp_index data_discount">
                        <p class="title_input">Số tiền</p>
                        <select class="val_discount select2">
                        <option value="">Chọn</option>
                        </select>
                        <p class="error error_val"></p>
                    </div><div class="del_index" onclick="del_index(this)">
                                                    <img src="/images/del2.svg" alt="xóa">
                                                </div>
                </div>`;
    $('.list_discount').append(html2);
    $('.select2').select2({
        placeholder: 'Chọn',
        'height': '100%'
    }); updateSelectOptions();
});
function del_index(e) {
    $(e).parent().remove();
}

function handleInputNum(event, element) {
    let inputValue = $(element).val();
    let numberValue = Number(inputValue + event.key);
    if (event.key < '0' || event.key > '9') {
        event.preventDefault();
        return;
    }
    if (numberValue < 0) {
        event.preventDefault();
        $(element).val(0);
    }
}

function inp_num_blur(e) {
    let inputValue = $(e).val();
    if (inputValue < 0) {
        $(this).val(0);
    }
};
function updateSelectOptions(e) {
    var selectedValues = [];
    $('.list_discount').find('.project_type').each(function () {
        var selectedValue = $(this).val();
        if (selectedValue) {
            selectedValues.push(selectedValue);
        }
    });
    $('.list_discount').find('.project_type').each(function () {
        var $select = $(this);
        var currentSelected = $select.val();
        $select.find('option').each(function () {
            var $option = $(this);
            $option.prop('disabled', false);
            if (selectedValues.includes($option.val()) && $option.val() != currentSelected) {
                $option.prop('disabled', true);
            }
        });
        $select.select2();
    });
    var value_project_type = $(e).val();
    if (value_project_type > 0) {
        var data = new FormData();
        data.append('id', value_project_type);
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
                    if (response.array_data.data_discount) {
                        var data_discount = JSON.parse(response.array_data.data_discount);
                        var html_val = '';
                        data_discount.forEach(function (item, index) {
                            html_val += ' <option value="' + item.number + '" >' + item.name + ' ' + Number(item.number).toLocaleString('vi-VN') + ' vnđ</option>';
                        });
                        var html_dis = `<p class="title_input">Số tiền</p>
                                            <select class="val_discount select2">
                                                <option value="" >Chọn</option>
                                                `+ html_val + `
                                            </select>
                                             <p class="error error_val"></p>`;
                        $(e).parents('.list_discount_2').find('.data_discount').html(html_dis);
                        $('.select2').select2({
                            placeholder: 'Chọn',
                            'height': '100%'
                        });
                        console.log(html_dis);

                    }
                }
            },
            error: function (xhr) {
                alert('Thất bại');
            }
        });
    }
} updateSelectOptions();