
var check_edit = 0;
var id_edit = 0
var tag_edit = '';
function edit_text(e, tag, id) {
    if (check_edit == 0) {
        check_edit = 1;
        $(e).attr('contenteditable', 'true');
        id_edit = id;
        tag_edit = tag;
        $(e).addClass('active_edit');
        return false;
    }
}
// $('.edit_text').keypress(function (event) {
//     if (event.keyCode == 13 || event.which == 13) {
//         ajax_edit(this, tag_edit, id_edit)
//     }
// });
$('.img_edit').click(function () {
    var img_edit = $(this).data('id');
    var data = new FormData();
    data.append('id', img_edit);
    $.ajax({
        url: '/get_job_qa',
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
                if (response.status_qa_check == 1) {
                    $('#form_add').find('select[name="status"]').html('<option selected value="1">Hoành thành</option>');

                } else {
                    $('#form_add').find('select[name="status"]').html('<option selected value="0">' + response.name + '</option><option value="1">Hoàn thành</option>');
                }
                $('#form_add').find('input[name="id"]').val(img_edit);
                $('#form_add').find('input[name="punish"]').val(response.punish);
                $('#form_add').find('input[name="punish"]').prop('readonly', false)
                if (response.status_job == 1) {
                    $('#form_add').find('input[name="punish"]').prop('readonly', true)
                }
                $('#form_add').find('input[name="file_qa_check"]').val(response.file_qa_check);
                $('#form_add').find('textarea[name="content_qa_check"]').val(response.content_qa_check);
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
        var file_qa_check = $('input[name="file_qa_check"]').val();
        if (file_qa_check != '') {
            $.ajax({
                url: '/edit_job_qa',
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
        } else {
            $('.btn_add_project').prop('disabled', false);
            $('input[name="file_qa_check"]').parent().find('.error').show();
        }
    }
});
$('.next_index').click(function () {
    var data = new FormData();
    data.append('id', $(this).data('id'));
    swal({
        title: "Xác nhận",
        text: "Chuyển tất cả công việc của dự án sang index?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Có",
        cancelButtonText: "Không",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {
        $.ajax({
            url: '/next_index',
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
    });
})
var id_filter = 0, job_type = 0,num_job_type = 0, created_at_start = 0, created_at_end = 0, web = 0, sctv = 0, sqa = 0, tss = 0, tse = 0, tes = 0, tee = 0, tcs = 0, tce = 0, dls = 0, dle = 0, cr = 0, au = 0, ctv = 0, sj = 0, sin = 0;
function filter_select(e) {
    id_filter = $('select[name="job"]').val() ? $('select[name="job"]').val() : 0;
    web = $('select[name="website"]').val() ? encodeURIComponent($('select[name="website"]').val()) : 0;
    job_type = $('select[name="job_type"]').val() ? $('select[name="job_type"]').val() : 0;
    num_job_type = $('select[name="num_job_type"]').val() ? $('select[name="num_job_type"]').val() : 0;
    created_at_start = $('input[name="created_at_start"]').val() ? new Date($('input[name="created_at_start"]').val()).getTime() / 1000 - 25200 : 0;
    created_at_end = $('input[name="created_at_end"]').val() ? new Date($('input[name="created_at_end"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    dls = $('input[name="deadline_start"]').val() ? new Date($('input[name="deadline_start"]').val()).getTime() / 1000 - 25200 : 0;
    dle = $('input[name="deadline_end"]').val() ? new Date($('input[name="deadline_end"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tes = $('input[name="ctv_end_s"]').val() ? new Date($('input[name="ctv_end_s"]').val()).getTime() / 1000 - 25200 : 0;
    tee = $('input[name="ctv_end_e"]').val() ? new Date($('input[name="ctv_end_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tcs = $('input[name="time_check_s"]').val() ? new Date($('input[name="time_check_s"]').val()).getTime() / 1000 - 25200 : 0;
    tce = $('input[name="time_check_e"]').val() ? new Date($('input[name="time_check_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    sqa = $('select[name="qa_check"]').val() ? $('select[name="qa_check"]').val() : 0;
    cr = $('select[name="check_replly"]').val() ? $('select[name="check_replly"]').val() : 0;
    au = $('select[name="author"]').val() ? encodeURIComponent($('select[name="author"]').val()) : 0;
    ctv = $('select[name="ctv"]').val() ? $('select[name="ctv"]').val() : 0;
    sj = $('select[name="status_job"]').val() ? $('select[name="status_job"]').val() : 0;
    sin = $('select[name="status_index"]').val() ? $('select[name="status_index"]').val() : 0;
    filter();
}
function filter() {
    var get_type = '', get_type_num = '', get_author = '', get_created = '', get_created_end = '', get_web = '', get_sctv = '', get_sqa = '', get_tss = '', get_tse = '', get_tes = '', get_tee = '', get_tcs = '', get_tce = '', get_dls = '', get_dle = '', get_cr = '', get_ctv = '', get_sj = '', get_sin = '';
    if (web != 0) {
        get_web = '&web=' + web;
    } if (job_type > 0) {
        get_type = '&type=' + job_type;
    }if (num_job_type != 0) {
        get_type_num = '&type_num=' + num_job_type;
    } 
    if (created_at_start > 0) {
        get_created = '&cs=' + created_at_start;
    }
    if (created_at_end > 0) {
        get_created_end = '&ce=' + created_at_end;
    } if (au > 0) {
        get_author = '&au=' + au;
    }
    if (dls > 0) {
        get_dls = '&dls=' + dls;
    }
    if (dle > 0) {
        get_dle = '&dle=' + dle;
    }
    if (tes > 0) {
        get_tes = '&tes=' + tes;
    }
    if (tee > 0) {
        get_tee = '&tee=' + tee;
    }
    if (tcs > 0) {
        get_tcs = '&tcs=' + tcs;
    }
    if (tce > 0) {
        get_tce = '&tce=' + tce;
    }
    if (cr != 0) {
        get_cr = '&cr=' + cr;
    }
    if (sqa > 0) {
        get_sqa = '&sqa=' + sqa;
    }
    if (ctv > 0) {
        get_ctv = '&ctv=' + ctv;
    }
    if (sj > 0) {
        get_sj = '&sj=' + sj;
    }
    if (sin > 0) {
        get_sin = '&sin=' + sin;
    }
    var url_filter = "/cong-viec-qa/?id=" + id_filter + get_created + get_created_end + get_dls + get_dle + get_type +get_type_num+ get_web + get_sctv + get_sqa + get_tss + get_tse + get_tes + get_tee + get_tcs + get_tce + get_cr + get_author + get_ctv + get_sj + get_sin;
    window.location.href = url_filter;
}

function export_excel() {
    var currentUrl = window.location.search;
    // console.log(currentUrl);
    window.location.href = '/excel_qa/' + currentUrl;
}