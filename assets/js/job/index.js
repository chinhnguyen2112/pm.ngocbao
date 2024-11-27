function onlyNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
$('.img_edit').click(function () {
    var img_edit = $(this).data('id');
    var data = new FormData();
    data.append('id', img_edit);
    $.ajax({
        url: '/get_job_index',
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
                $('#form_add').find('input[name="time_next"]').val(response.time_index_next);
                var html_index = `
                        <div class="this_add_project w_50">
                            <p class="title_input">Tỉ lệ index thực tế</p>
                        </div>`;
                $.each(response.data_index_real, function (index, value) {
                    var num_index = value.number;
                    if (response.check_real == 0) {
                        num_index = '';
                    }
                    html_index += `<div class="list_index_2">
                                        <div class="this_add_project w_50 inp_index">
                                            <p class="name_index" data-id="`+ value.id_i + `">` + value.name + `</p>
                                        </div>
                                        <div class="this_add_project w_50 inp_index">
                                            <input type="text" placeholder="Nhập tỉ lệ" class="num_index" value="`+ num_index + `">
                                            <p class="ab_%">| %</p>
                                            <p class="error" style="display:none;">Không được để trống</p>
                                        </div>
                                    </div>`;

                })
                $('.list_index').html(html_index);
                $('.popup_add_project').show()
            }
        },
        error: function (xhr) {
            alert('Thất bại');
        }
    });
})
$("#form_add").validate({
    onclick: false,
    submitHandler: function (form) {
        $('.btn_add_project').prop('disabled', true);
        var data = new FormData($("#form_add")[0]);
        var check_input = 0;
        $('.list_index_2').each(function (index) {
            if ($(this).find('.name_index').data('id') > 0 && $(this).find('.num_index').val() != '') {
                data.append('data_index[' + index + '][name]', $(this).find('.name_index').data('id'));
                data.append('data_index[' + index + '][number]', $(this).find('.num_index').val());
            } else {
                check_input = 1;
                $(this).find('.error').show();
            }
        });
        if (check_input == 1) {
            $('.btn_add_project').prop('disabled', false);
            return false;
        } else {
            $.ajax({
                url: '/edit_job_index',
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
    }
});
var id_filter = 0, web = 0, tis = 0, tie = 0, tns = 0, tne = 0, dls = 0, dle = 0, au = 0, st = 0;
function filter_select(e) {
    id_filter = $('select[name="project"]').val() ? $('select[name="project"]').val() : 0;
    web = $('select[name="website"]').val() ? encodeURIComponent($('select[name="website"]').val()) : 0;
    dls = $('input[name="deadline_start"]').val() ? new Date($('input[name="deadline_start"]').val()).getTime() / 1000 - 25200 : 0;
    dle = $('input[name="deadline_end"]').val() ? new Date($('input[name="deadline_end"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tis = $('input[name="time_index_s"]').val() ? new Date($('input[name="time_index_s"]').val()).getTime() / 1000 - 25200 : 0;
    tie = $('input[name="time_index_e"]').val() ? new Date($('input[name="time_index_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tns = $('input[name="time_next_s"]').val() ? new Date($('input[name="time_next_s"]').val()).getTime() / 1000 - 25200 : 0;
    tne = $('input[name="time_next_e"]').val() ? new Date($('input[name="time_next_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    au = $('select[name="author"]').val() ? encodeURIComponent($('select[name="author"]').val()) : 0;
    st = $('select[name="status_index"]').val() ? $('select[name="status_index"]').val() : 0;
    filter();
}
function filter() {
    var get_author = '', get_web = '', get_tis = '', get_tie = '', get_tns = '', get_tne = '', get_dls = '', get_dle = '', get_st = '';
    if (web != 0) {
        get_web = '&web=' + web;
    }
    if (au > 0) {
        get_author = '&au=' + au;
    }
    if (dls > 0) {
        get_dls = '&dls=' + dls;
    }
    if (dle > 0) {
        get_dle = '&dle=' + dle;
    }
    if (tis > 0) {
        get_tis = '&tis=' + tis;
    }
    if (tie > 0) {
        get_tie = '&tie=' + tie;
    }
    if (tns > 0) {
        get_tns = '&tns=' + tns;
    }
    if (tne > 0) {
        get_tne = '&tne=' + tne;
    }
    if (st > 0) {
        get_st = '&st=' + st;
    }
    var url_filter = "/cong-viec-index/?id=" + id_filter + get_dls + get_dle + get_web + get_tis + get_tie + get_tns + get_tne + get_author + get_st;
    window.location.href = url_filter;
}
function export_excel() {
    var currentUrl = window.location.search;
    // console.log(currentUrl);
    window.location.href = '/excel_jobs_index/' + currentUrl;
}