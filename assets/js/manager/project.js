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
// $('.btn_project_cancel').click(function () {
//     $(this).parents('.main_filter').find('input[type="checkbox"]').prop('checked', false);
//     $('.box_btn_project').hide();
// })
$('.btn_project_cancel').click(function () {
    swal({
        title: "Xác nhận",
        text: "Bạn chắc chắn muốn xóa dự án? Dữ diệu sẽ không thể khôi phục sau khi xóa",
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
            url: '/del_project',
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

$('.df_add_job').click(function () {
    var id_project = $(this).parents('tr').data('id');
    swal({
        title: "Xác nhận",
        text: "Bạn xác nhận lựa chọn mặc định",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Có",
        cancelButtonText: "Không",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {
        var data = new FormData();
        data.append('id', id_project);
        $.ajax({
            url: '/default_job_mkt',
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
    })
})

var id_filter = 0, pic = 0, project_type = 0, created_at_start = 0, created_at_end = 0, cus = 0, web = 0, status_pro = 0, hs = 0, pd = 0, sctv = 0, debt = 0, ctv = 0, qa = 0, ind = 0, sqa = 0, sin = 0, tss = 0, tse = 0, tes = 0, tee = 0, tcs = 0, tce = 0, cts = 0, cte = 0, qas = 0, qae = 0, tps = 0, tpe = 0, tis = 0, tie = 0, tus = 0, tue = 0, br = 0;
function filter_select(e) {
    id_filter = $('select[name="project"]').val() ? $('select[name="project"]').val() : 0;
    pic = $('select[name="pic"]').val() ? $('select[name="pic"]').val() : 0;
    project_type = $('select[name="project_type"]').val() ? $('select[name="project_type"]').val() : 0;
    var datetimeInt1 = $('input[name="created_at_start"]').val() ? new Date($('input[name="created_at_start"]').val()).getTime() / 1000 - 25200 : 0;
    created_at_start = datetimeInt1;
    var datetimeInt2 = $('input[name="created_at_end"]').val() ? new Date($('input[name="created_at_end"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    created_at_end = datetimeInt2;
    cus = $('select[name="customer"]').val() ? encodeURIComponent($('select[name="customer"]').val()) : 0;
    web = $('select[name="website"]').val() ? encodeURIComponent($('select[name="website"]').val()) : 0;
    status_pro = $('select[name="status"]').val() ? $('select[name="status"]').val() : 0;
    hs = $('select[name="handover_status"]').val() ? $('select[name="handover_status"]').val() : 0;
    pd = $('select[name="project_division"]').val() ? $('select[name="project_division"]').val() : 0;
    sctv = $('select[name="status_ctv"]').val() ? $('select[name="status_ctv"]').val() : 0;
    debt = $('select[name="debt"]').val() ? $('select[name="debt"]').val() : 0;
    ctv = $('select[name="ctv"]').val() ? encodeURIComponent($('select[name="ctv"]').val()) : 0;
    qa = $('select[name="qa"]').val() ? $('select[name="qa"]').val() : 0;
    ind = $('select[name="index"]').val() ? $('select[name="index"]').val() : 0;
    br = $('select[name="brand"]').val() ? $('select[name="brand"]').val() : 0;
    sqa = $('select[name="status_qa"]').val() ? $('select[name="status_qa"]').val() : 0;
    sin = $('select[name="status_index"]').val() ? $('select[name="status_index"]').val() : 0;
    tss = $('input[name="time_start_s"]').val() ? new Date($('input[name="time_start_s"]').val()).getTime() / 1000 - 25200 : 0;
    tse = $('input[name="time_start_e"]').val() ? new Date($('input[name="time_start_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tes = $('input[name="time_end_s"]').val() ? new Date($('input[name="time_end_s"]').val()).getTime() / 1000 - 25200 : 0;
    tee = $('input[name="time_end_e"]').val() ? new Date($('input[name="time_end_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tcs = $('input[name="time_cancel_s"]').val() ? new Date($('input[name="time_cancel_s"]').val()).getTime() / 1000 - 25200 : 0;
    tce = $('input[name="time_cancel_e"]').val() ? new Date($('input[name="time_cancel_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    cts = $('input[name="ctv_job_completion_time_s"]').val() ? new Date($('input[name="ctv_job_completion_time_s"]').val()).getTime() / 1000 - 25200 : 0;
    cte = $('input[name="ctv_job_completion_time_e"]').val() ? new Date($('input[name="ctv_job_completion_time_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    qas = $('input[name="qa_time_s"]').val() ? new Date($('input[name="qa_time_s"]').val()).getTime() / 1000 - 25200 : 0;
    qae = $('input[name="qa_time_e"]').val() ? new Date($('input[name="qa_time_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tps = $('input[name="time_pause_s"]').val() ? new Date($('input[name="time_pause_s"]').val()).getTime() / 1000 - 25200 : 0;
    tpe = $('input[name="time_pause_e"]').val() ? new Date($('input[name="time_pause_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tis = $('input[name="time_index_s"]').val() ? new Date($('input[name="time_index_s"]').val()).getTime() / 1000 - 25200 : 0;
    tie = $('input[name="time_index_e"]').val() ? new Date($('input[name="time_index_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tus = $('input[name="time_cus_s"]').val() ? new Date($('input[name="time_cus_s"]').val()).getTime() / 1000 - 25200 : 0;
    tue = $('input[name="time_cus_e"]').val() ? new Date($('input[name="time_cus_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    filter()
}
var url_filter = '';
function filter() {
    var get_author = '', get_type = '', get_created = '', get_created_end = '', get_cus = '', get_web = '', get_st = '', get_hs = '', get_pd = '', get_sctv = '', get_debt = '', get_ctv = '', get_qa = '', get_in = '', get_sqa = '', get_sin = '', get_tss = '', get_tse = '', get_tes = '', get_tee = '', get_tcs = '', get_tce = '', get_cts = '', get_cte = '', get_qas = '', get_qae = '', get_tps = '', get_tpe = '', get_tis = '', get_tie = '', get_tus = '', get_tue = '', get_br = '';
    if (pic > 0) {
        get_author = '&pic=' + pic;
    }
    if (project_type > 0) {
        get_type = '&type=' + project_type;
    }
    if (created_at_start > 0) {
        get_created = '&cs=' + created_at_start;
    }
    if (created_at_end > 0) {
        get_created_end = '&ce=' + created_at_end;
    }
    if (cus != 0) {
        get_cus = '&cus=' + cus;
    }
    if (web != 0) {
        get_web = '&web=' + web;
    }
    if (status_pro != 0) {
        get_st = '&st=' + status_pro;
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
    if (tps > 0) {
        get_tps = '&tps=' + tps;
    }
    if (tpe > 0) {
        get_tpe = '&tpe=' + tpe;
    }
    if (hs > 0) {
        get_hs = '&hs=' + hs;
    }
    if (pd > 0) {
        get_pd = '&pd=' + pd;
    }
    if (sctv > 0) {
        get_sctv = '&sctv=' + sctv;
    }
    if (debt > 0) {
        get_debt = '&debt=' + debt;
    }
    if (cts > 0) {
        get_cts = '&cts=' + cts;
    }
    if (cte > 0) {
        get_cte = '&cte=' + cte;
    }
    if (ctv > 0) {
        get_ctv = '&ctv=' + ctv;
    }
    if (qa > 0) {
        get_qa = '&qa=' + qa;
    }
    if (ind > 0) {
        get_in = '&in=' + ind;
    }
    if (sqa > 0) {
        get_sqa = '&sqa=' + sqa;
    }
    if (sin > 0) {
        get_sin = '&sin=' + sin;
    }
    if (qas > 0) {
        get_qas = '&qas=' + qas;
    }
    if (qae > 0) {
        get_qae = '&qae=' + qae;
    }
    if (tis > 0) {
        get_tis = '&tis=' + tis;
    }
    if (tie > 0) {
        get_tie = '&tie=' + tie;
    }
    if (tus > 0) {
        get_tus = '&tus=' + tus;
    }
    if (tue > 0) {
        get_tue = '&tue=' + tue;
    }
    if (br > 0) {
        get_br = '&br=' + br;
    }
    url_filter = "/quan-ly-du-an/?id=" + id_filter + get_created + get_created_end + get_author + get_type + get_cus + get_web + get_st + get_hs + get_pd + get_sctv + get_debt + get_ctv + get_qa + get_in + get_sqa + get_sin + get_tss + get_tse + get_tes + get_tee + get_tcs + get_tce + get_cts + get_cte + get_qas + get_qae + get_tps + get_tpe + get_tis + get_tie + get_tus + get_tue + get_br;
    window.location.href = url_filter;
}
function export_excel() {
    var currentUrl = window.location.search;
    // console.log(currentUrl);
    window.location.href = '/excel_projects/' + currentUrl;
}