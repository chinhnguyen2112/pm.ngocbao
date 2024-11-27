function show_project(e, type) {
    if (type == 0) {
        $(e).parents('.main_filter').find('.box_project').show();
        $(e).attr({
            'src': '/images/del.png',
            'onclick': 'show_project(this,1)'
        });
    } else {
        $(e).parents('.main_filter').find('.box_project').hide();
        $(e).attr({
            'src': '/images/add.png',
            'onclick': 'show_project(this,0)'
        });
    }
}
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
        console.log(check_box)
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
var id_now = 0;
var id_click = 0;
var id_job = 0;
$('.status_project').click(function () {
    id_now = $(this).data('id');
    id_job = $(this).data('job_id');
    $(this).parent().find('.arr_status').show();
})
$('.check_status').click(function () {
    id_click = $(this).data('id');
    if (id_click != id_now) {
        swal({
            title: "Xác nhận",
            text: "Bạn muốn chuyển trạng thái công việc thành " + $(this).text() + "?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Có",
            cancelButtonText: "Không",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function (isConfirm) {
            if (isConfirm) {
                var data = new FormData();
                data.append('name', $(this).data('name'));
                data.append('value', id_click);
                data.append('id', id_job);
                $.ajax({
                    url: '/change_ctv_job',
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
            } else {
                check_edit = 0;
            }
        })
    }
})
$('.check_replly').click(function () {
    id_click = $(this).data('id');
    if (id_click != id_now) {
        swal({
            title: "Xác nhận",
            text: "Bạn muốn chuyển trạng thái thành " + $(this).text() + "?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Có",
            cancelButtonText: "Không",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function (isConfirm) {
            if (isConfirm) {
                var data = new FormData();
                data.append('name', $(this).data('name'));
                data.append('value', id_click);
                data.append('id', id_job);
                $.ajax({
                    url: '/change_check_replly',
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
            } else {
                check_edit = 0;
            }
        })
    }
})

$(document).click(function (event) {
    $target = $(event.target);
    if (!$target.closest('.arr_status').length && $('.arr_status').is(":visible") && !$target.closest('.status_project').length) {
        $('.arr_status').hide(100);
        check_edit = 0;
    }
});
var id_filter = 0, job_type = 0, created_at_start = 0, created_at_end = 0, web = 0, sctv = 0, sqa = 0, tss = 0, tse = 0, tes = 0, tee = 0, tcs = 0, tce = 0, dls = 0, dle = 0, cr = 0;
function filter_select(e) {
    id_filter = $('select[name="job"]').val() ? $('select[name="job"]').val() : 0;
    web = $('select[name="website"]').val() ? encodeURIComponent($('select[name="website"]').val()) : 0;
    job_type = $('select[name="job_type"]').val() ? $('select[name="job_type"]').val() : 0;
    created_at_start = $('input[name="created_at_start"]').val() ? new Date($('input[name="created_at_start"]').val()).getTime() / 1000 - 25200 : 0;
    created_at_end = $('input[name="created_at_end"]').val() ? new Date($('input[name="created_at_end"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    dls = $('input[name="deadline_start"]').val() ? new Date($('input[name="deadline_start"]').val()).getTime() / 1000 - 25200 : 0;
    dle = $('input[name="deadline_end"]').val() ? new Date($('input[name="deadline_end"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tes = $('input[name="ctv_end_s"]').val() ? new Date($('input[name="ctv_end_s"]').val()).getTime() / 1000 - 25200 : 0;
    tee = $('input[name="ctv_end_e"]').val() ? new Date($('input[name="ctv_end_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    tcs = $('input[name="time_check_s"]').val() ? new Date($('input[name="time_check_s"]').val()).getTime() / 1000 - 25200 : 0;
    tce = $('input[name="time_check_e"]').val() ? new Date($('input[name="time_check_e"]').val()).getTime() / 1000 - 25200 + 84600 : 0;
    sctv = $('select[name="status_ctv"]').val() ? $('select[name="status_ctv"]').val() : 0;
    sqa = $('select[name="qa_check"]').val() ? $('select[name="qa_check"]').val() : 0;
    cr = $('select[name="check_replly"]').val() ? $('select[name="check_replly"]').val() : 0;
    filter();
}
function filter() {
    var get_type = '', get_created = '', get_created_end = '', get_web = '', get_sctv = '', get_sqa = '', get_tss = '', get_tse = '', get_tes = '', get_tee = '', get_tcs = '', get_tce = '', get_dls = '', get_dle = '', get_cr = '';
    if (web != 0) {
        get_web = '&web=' + web;
    } if (job_type > 0) {
        get_type = '&type=' + job_type;
    }
    if (created_at_start > 0) {
        get_created = '&cs=' + created_at_start;
    }
    if (created_at_end > 0) {
        get_created_end = '&ce=' + created_at_end;
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
    if (sctv != 0) {
        get_sctv = '&sctv=' + sctv;
    }
    if (cr != 0) {
        get_cr = '&cr=' + cr;
    }
    if (sqa > 0) {
        get_sqa = '&sqa=' + sqa;
    }
    var url_filter = "/cong-viec-cong-tac-vien/?id=" + id_filter + get_created + get_created_end + get_dls + get_dle + get_type + get_web + get_sctv + get_sqa + get_tss + get_tse + get_tes + get_tee + get_tcs + get_tce + get_cr;
    window.location.href = url_filter;
}
function export_excel() {
    var currentUrl = window.location.search;
    // console.log(currentUrl);
    window.location.href = '/excel_ctv_jobs/' + currentUrl;
}