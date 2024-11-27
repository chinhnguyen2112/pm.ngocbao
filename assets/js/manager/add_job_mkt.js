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
var job_type = $('.job_type_2').html();
$('.add_job_type').click(function () {
    var html2 = `<div class="this_add_project w_50 w_job_type">
                    <p class="title_input">Loại công việc </p>
                    `+ job_type + `
                        <p class="error error_job"></p>
                    <div class="del_index del_job_type" onclick="del_index(this)">
                        <img src="/images/del2.svg" alt="xóa">
                    </div>
                </div>`;
    $('.list_job_type').append(html2);
    $('.select2').select2({
        placeholder: 'Chọn',
        'height': '100%'
    });
}); 
var status_index = $('.list_data_index').data('val');
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
function del_index(e) {
    $(e).parent().remove();
}
get_type_job();
function get_type_job() {
    var id_project_type = $('#project_type').val();
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
                $('.list_job_type').html('');
                var arr;
                if ((response.array_data.job_type).indexOf(',') !== -1) {
                    arr = (response.array_data.job_type).split(",");
                } else {
                    arr = [(response.array_data.job_type)];
                }
                if (response.array_data.job_type) {
                    $.each(arr, function (index, value) {
                        var html3 = `<div class="this_add_project w_50 w_job_type check_type` + index + `">
                                    <p class="title_input">Loại công việc </p>
                                    `+ job_type + `
                                    <div class="del_index del_job_type" onclick="del_index(this)">
                                        <img src="/images/del2.svg" alt="xóa">
                                    </div>
                                </div>`;
                        $('.list_job_type').append(html3);
                        $('.check_type' + index).val(value).trigger('change');
                        $('.check_type' + index).find('option').each(function () {
                            if ($(this).val() == value) {
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
}

$("#form_add").validate({
    onclick: false,
    submitHandler: function (form) {
        $('.add_from').prop('disabled', true);
        var data = new FormData($("#form_add")[0]);
        var allSelected = true;
        var arr_job = [];
        if ($('.list_job_type').find('.job_type').length > 0) {
            $('.list_job_type').find('.job_type').each(function () {
                $(this).parent().find('.error').text('Không được để trống');
                if ($(this).val() > 0) {
                    $(this).parent().find('.error').text('');
                    arr_job.push($(this).val());

                } else {
                    allSelected = false;
                    return false;
                }
            })
            data.append('data_job_type', arr_job);
        }
        var check_return = false;
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
        if (check_return == false || allSelected == false) {
            return false;
        }
        data.append('status_index', status_index);
        $.ajax({
            url: '/add_project_mkt',
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
                        window.location.href='/quan-ly-du-an/';
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