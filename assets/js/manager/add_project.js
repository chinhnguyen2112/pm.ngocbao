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
function del_index(e) {
    $(e).parent().remove();
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
});
$("#form_add").validate({
    onclick: false,
    rules: {
        "customer_id": {
            required: true,
        },
        "list_brand[]": {
            required: true,
        },
        "project_type": {
            required: true,
        },
        "revenue": {
            required: true,
            min: 0
        },
        "info": {
            required: true,
        },
        "website": {
            required: true,
        },
    },
    messages: {
        "customer_id": {
            required: "Không được để trống",
        },
        "list_brand[]": {
            required: "Không được để trống",
        },
        "project_type": {
            required: "Không được để trống",
        },
        "revenue": {
            required: "Không được để trống",
            min: "Giá trị phải lớn hơn 0",
        },
        "info": {
            required: "Không được để trống",
        },
        "website": {
            required: "Không được để trống",
        },
    },
    submitHandler: function (form) {
        $('.add_from').prop('disabled', true);
        var data = new FormData($("#form_add")[0]);
        var check_job_type = true;
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
        var check_return = false;
        $('.inp_status_index').each(function () {
            if ($(this).prop('checked')) {
                status_index = $(this).data('val');
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
        console.log(check_return)
        if (check_return == false || check_job_type == false) {
            return false;
        }
        data.append('status_index', status_index);
        $.ajax({
            url: '/add_project',
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
                $('.add_from').prop('disabled', false);
            },
            error: function (xhr) {
                alert('Thất bại');
                $('.add_from').prop('disabled', false);

            }
        });
        return false;
    }
});
$('#customer_id').change(function () {
    var customer_id = $('#customer_id').val();
    var project_type = $('#project_type').val();
    if (project_type > 0) {
        var data = new FormData();
        data.append('customer_id', customer_id);
        data.append('project_type', project_type);
        $.ajax({
            url: '/get_unit_price',
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            data: data,
            success: function (response) {
                if (response.status == 1) {
                    $('#revenue').val(response.revenue);
                } else {
                    var project_type_price = $('#project_type').find('option:selected').data('price');
                    $('#revenue').val(project_type_price);
                }
            },
            error: function (xhr) {
                alert('Thất bại');

            }
        });
        return false;
    }
});
$('#project_type').change(function () {
    var id_project_type = $(this).val();
    var project_type_price = $(this).find('option:selected').data('price');
    var project_type_file_ex = $(this).find('option:selected').data('file');
    $('#revenue').val(project_type_price);

    $('#customer_id').trigger('change');
    $('#file_ex').val(project_type_file_ex);
    status_index = $(this).find('option:selected').data('index');
    $(".inp_status_index").prop('checked', false);
    $('.inp_status_index').each(function () {
        if ($(this).data('val') == status_index) {
            $(this).prop('checked', true);
        }
    });
    if (status_index == 0) {
        $('.list_index').hide();
        $('.status_index.active').removeClass('active');
    } else {
        $('.list_index').show();
        $('.status_index').addClass('active');
    }

    var data = new FormData();
    data.append('id', id_project_type);
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
                $('.list_index_2').remove();
                if (response.array_data.data_index) {
                    $.each(JSON.parse(response.array_data.data_index), function (index, value) {
                        var num_index = value.number;
                        var name = value.name;
                        var html_index = `<div class="list_index_2">
                                            <div class="this_add_project w_50 inp_index check_select`+ index + `">
                                                `+ job_index + `
                                                <p class="error error_name"></p>
                                            </div>
                                            <div class="this_add_project w_50 inp_index">
                                                <input type="text" placeholder="Nhập tỉ lệ" class="num_index" value="`+ num_index + `">
                                                <p class="ab_%">| %</p>
                                                <p class="error" style="display:none;">Không được để trống</p>
                                            </div>
                                        </div>`;
                        $('.list_index').append(html_index);
                        $('.check_select' + index).val(name).trigger('change');
                        $('.check_select' + index).find('option').each(function () {
                            if ($(this).val() == name) {
                                console.log(1)
                                $(this).prop('selected', true);
                            }
                        });

                    })
                }

                $('.list_job_type_3').html('');
                if (response.array_data.job_type) {
                    $.each(JSON.parse(response.array_data.job_type), function (index, value) {
                        var id_job_type= value.job_type;
                        var number_job_type = value.number;
                        var html3 = `<div class="list_job_type_2">
                                        <div class="this_add_project w_50 inp_index  check_type`+ index + `">
                                            <p class="title_input">Loại công việc</p>
                                            `+ job_type + `
                                            <p class="error error_name"></p>
                                        </div>
                                        <div class="this_add_project w_50 inp_index data_discount">
                                                        <p class="title_input">Số lượng</p>
                                                        <input type="text" class="input_num number" placeholder="Nhập" value="`+ number_job_type + `">
                                                        <p class="error error_val"></p>
                                                    </div>
                                        <div class="del_index" onclick="del_index(this)">
                                            <img src="/images/del2.svg" alt="xóa">
                                        </div>
                                    </div>`;
                                    $('.list_job_type_3').append(html3); 
                        $('.check_type' + index).val(id_job_type).trigger('change');
                        $('.check_type' + index).find('option').each(function () {
                            if ($(this).val() == id_job_type) {
                                $(this).prop('selected', true);
                            }
                        });
                    })
                } $('.select2').select2({
                    placeholder: 'Chọn',
                    'height': '100%'
                });
            }
        },
        error: function (xhr) {
            alert('Thất bại');

        }
    });
    return false;

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
    }); updateSelectOptions();
});
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