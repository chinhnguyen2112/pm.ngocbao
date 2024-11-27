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
        }else{
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
            min: 0
        },
        "customer": {
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
        "input_source":{
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
            min: "Giá trị phải lớn hơn 0"
        },
        "customer": {
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
        "input_source":{
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
        $('.add_from').prop('disabled', true);
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
                $('.add_from').prop('disabled', false);
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
                $('.add_from').prop('disabled', false);

            }
        });
        return false;
    }
});