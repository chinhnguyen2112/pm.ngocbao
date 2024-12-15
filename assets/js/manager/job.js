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
        text: "Bạn chắc chắn muốn xóa công việc?",
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
        $.ajax({
            url: '/del_job',
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
var id_filter = 0, au = 0, job_type = 0, num_job_type = 0, created_at_start = 0, created_at_end = 0, web = 0, sctv = 0, ctv = 0, qa = 0, sqa = 0, tss = 0, tse = 0, tes = 0, tee = 0, tcs = 0, tce = 0, dls = 0, dle = 0, js = 0, je = 0, cr = 0, sj = 0, zs = -1, ze = -1;
function filter_select(e) {
    id_filter = $('select[name="job"]').val() ? $('select[name="job"]').val() : 0;
    web = $('select[name="website"]').val() ? encodeURIComponent($('select[name="website"]').val()) : 0;
    job_type = $('select[name="job_type"]').val() ? $('select[name="job_type"]').val() : 0;
    num_job_type = $('select[name="num_job_type"]').val() ? $('select[name="num_job_type"]').val() : 0;
    au = $('select[name="author"]').val() ? encodeURIComponent($('select[name="author"]').val()) : 0;
    created_at_start = $('input[name="created_at_start"]').val() ? new Date($('input[name="created_at_start"]').val()).getTime() / 1000 - 25200 : 0;
    created_at_end = $('input[name="created_at_end"]').val() ? new Date($('input[name="created_at_end"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    dls = $('input[name="deadline_start"]').val() ? new Date($('input[name="deadline_start"]').val()).getTime() / 1000 - 25200 : 0;
    dle = $('input[name="deadline_end"]').val() ? new Date($('input[name="deadline_end"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tss = $('input[name="time_start_s"]').val() ? new Date($('input[name="time_start_s"]').val()).getTime() / 1000 - 25200 : 0;
    tse = $('input[name="time_start_e"]').val() ? new Date($('input[name="time_start_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tes = $('input[name="ctv_end_s"]').val() ? new Date($('input[name="ctv_end_s"]').val()).getTime() / 1000 - 25200 : 0;
    tee = $('input[name="ctv_end_e"]').val() ? new Date($('input[name="ctv_end_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tcs = $('input[name="time_check_s"]').val() ? new Date($('input[name="time_check_s"]').val()).getTime() / 1000 - 25200 : 0;
    tce = $('input[name="time_check_e"]').val() ? new Date($('input[name="time_check_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    js = $('input[name="job_end_s"]').val() ? new Date($('input[name="job_end_s"]').val() + " UTC").getTime() / 1000 - 25200 : 0;
    je = $('input[name="job_end_e"]').val() ? new Date($('input[name="job_end_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    ctv = $('select[name="ctv"]').val() ? $('select[name="ctv"]').val() : 0;
    sctv = $('select[name="status_ctv"]').val() ? $('select[name="status_ctv"]').val() : 0;
    cr = $('select[name="check_replly"]').val() ? $('select[name="check_replly"]').val() : 0;
    qa = $('select[name="qa"]').val() ? $('select[name="qa"]').val() : 0;
    sqa = $('select[name="qa_check"]').val() ? $('select[name="qa_check"]').val() : 0;
    sj = $('select[name="status_job"]').val() ? $('select[name="status_job"]').val() : 0;
    zs = $('input[name="z_index_s"]').val() ? $('input[name="z_index_s"]').val() : 0;
    ze = $('input[name="z_index_e"]').val() ? $('input[name="z_index_e"]').val() : 0;
    filter();
}
function filter() {
    var get_author = '', get_type = '', get_type_num = '', get_created = '', get_created_end = '', get_web = '', get_sctv = '', get_ctv = '', get_qa = '', get_sqa = '', get_tss = '', get_tse = '', get_tes = '', get_tee = '', get_tcs = '', get_tce = '', get_dls = '', get_dle = '', get_js = '', get_je = '', get_cr = '', get_sj = '', get_zs = '', get_ze = '';
    if (web != 0) {
        get_web = '&web=' + web;
    } if (job_type > 0) {
        get_type = '&type=' + job_type;
    } if (num_job_type != 0) {
        get_type_num = '&type_num=' + num_job_type;
    } if (au > 0) {
        get_author = '&au=' + au;
    }
    if (created_at_start > 0) {
        get_created = '&cs=' + created_at_start;
    }
    if (created_at_end > 0) {
        get_created_end = '&ce=' + created_at_end;
    }
    if (ctv != 0) {
        get_ctv = '&ctv=' + ctv;
    }
    if (dls > 0) {
        get_dls = '&dls=' + dls;
    }
    if (dle > 0) {
        get_dle = '&dle=' + dle;
    }
    if (tss > 0) {
        get_tss = '&tss=' + tss;
    }
    if (tse > 0) {
        get_tse = '&tse=' + tse;
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
    if (js > 0) {
        get_js = '&js=' + js;
    }
    if (je > 0) {
        get_je = '&je=' + je;
    }
    if (sctv != 0) {
        get_sctv = '&sctv=' + sctv;
    }
    if (cr != 0) {
        get_cr = '&cr=' + cr;
    }
    if (qa > 0) {
        get_qa = '&qa=' + qa;
    }
    if (sqa > 0) {
        get_sqa = '&sqa=' + sqa;
    }
    if (sj > 0) {
        get_sj = '&sj=' + sj;
    }
    if (zs > 0) {
        get_zs = '&zs=' + zs;
    }
    if (ze > 0) {
        get_ze = '&ze=' + ze;
    }
    var url_filter = "/quan-ly-cong-viec/?id=" + id_filter + get_created + get_created_end + get_dls + get_dle + get_author + get_type + get_type_num + get_web + get_sctv + get_ctv + get_qa + get_sqa + get_tss + get_tse + get_tes + get_tee + get_tcs + get_tce + get_js + get_je + get_cr + get_sj + get_zs + get_ze;
    window.location.href = url_filter;
}
function export_excel() {
    var currentUrl = window.location.search;
    // console.log(currentUrl);
    window.location.href = '/excel_jobs/' + currentUrl;
}