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
var status_qa = $('.list_data_qa').data('val');;
$('.inp_status_qa').click(function () {
    if ($(this).prop('checked')) {
        $(".inp_status_qa").prop('checked', false);
        $(this).prop('checked', true);
        status_qa = $(this).data('val');
    } else {
        $(this).prop('checked', true);
    }
});
$('#project_id').change(function () {
    var dataIndex = $(this).find('option:selected').data('index');
    if (dataIndex == 0) {
        status_index = 0;
        $('.check_status_index').hide();
    } else {
        $('.check_status_index').show();
    }
});
$("#form_add").validate({
    onclick: false,
    rules: {
        "project_id": {
            required: true,
        },
        "job_type": {
            required: true,
        },
        "price": {
            required: true,
            min: 0,
        },
        "num_job_type": {
            required: true,
            min: 0,
        },
        "z_index": {
            required: false,
            min: 0,
            max: 100
        },
        "info": {
            required: true,
        }
    },
    messages: {
        "project_id": {
            required: "Không được để trống",
        },
        "job_type": {
            required: "Không được để trống",
        },
        "price": {
            required: "Không được để trống",
            min: "Giá trị phải lớn hơn 0",
        },
        "num_job_type": {
            required: "Không được để trống",
            min: "Giá trị phải lớn hơn 0",
        },
        "z_index": {
            min: "Giá trị phải lớn hơn 0",
            max: "Giá trị phải nhỏ hơn 100"
        },
        "info": {
            required: "Không được để trống",
        }
    },
    submitHandler: function (form) {
        $('.add_from').prop('disabled', true);
        var data = new FormData($("#form_add")[0]);
        var ctv = $('#ctv').val();
        var deadline = $('#deadline').val();
        $('#deadline').parent().find('.error').text('');
        $('#ctv').parent().find('.error').text('');
        if (ctv != 0 && deadline == '') {
            $('#deadline').parent().find('.error').text('Không được để trống');
            $('.add_from').prop('disabled', false);
            return false;
        }
        if (deadline != '' && ctv == 0) {
            $('#ctv').parent().find('.error').text('Không được để trống');
            $('#ctv').focus();
            $('.add_from').prop('disabled', false);
            return false;
        }

        data.append('status_index', status_index);
        data.append('status_qa', status_qa);
        $.ajax({
            url: '/add_job',
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
                } $('.add_from').prop('disabled', false);
            },
            error: function (xhr) {
                alert('Thất bại'); $('.add_from').prop('disabled', false);

            }
        });
        return false;
    }
});

$('#job_type').change(function () {
    var job_type_price = $(this).find('option:selected').data('price');
    $('#price').val(job_type_price);
    status_index = $(this).find('option:selected').data('index');
    $(".inp_status_index").prop('checked', false);
    $('.inp_status_index').each(function () {
        $(this).prop('checked', false);
        if ($(this).data('val') == status_index) {
            $(this).prop('checked', true);
        }
    });
    var job_type_val = $(this).val();
    var job_type_info = $('.info' + job_type_val).html();
    var job_type_info = $('.info' + job_type_val).html();
    $('#info').val(job_type_info);
});