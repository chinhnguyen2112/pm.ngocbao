$('.check_full').click(function () {
    if ($(this).prop('checked')) {
        $(this).parents('table').find('.check_i').prop('checked', true);
        $('.box_btn_project').show();
    } else {
        $(this).parents('table').find('.check_i').prop('checked', false);
        $('.box_btn_project').hide();
    }
    var all_money = 0;
    $('.check_i').each(function () {
        if ($(this).prop('checked')) {
            all_money += $(this).parents('tr').find('.this_money').data('money');
        }
    })
    $('.all_money').text(all_money.toLocaleString('vi-VN'))
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
    var all_money = 0;
    $('.check_i').each(function () {
        if ($(this).prop('checked')) {
            all_money += $(this).parents('tr').find('.this_money').data('money');
        }
    })
    $('.all_money').text(all_money.toLocaleString('vi-VN'))
})
var id_filter = 0,project_type = 0, created_at_start = 0, created_at_end = 0,status_pro = 0,debt = 0, tss = 0, tse = 0, tes = 0, tee = 0, tcs = 0, tce = 0, tps = 0, tpe = 0,hs=0;
function filter_select(e) {
    id_filter = $('select[name="project"]').val();
    project_type = $('select[name="project_type"]').val();
    status_pro = $('select[name="status"]').val();
    debt = $('select[name="debt"]').val();
    tss = new Date($('input[name="time_start_s"]').val()).getTime() / 1000 - 25200;
    tse = new Date($('input[name="time_start_e"]').val()).getTime() / 1000 - 25200 + 84600;
    tes = new Date($('input[name="time_end_s"]').val()).getTime() / 1000 - 25200;
    tee = new Date($('input[name="time_end_e"]').val()).getTime() / 1000 - 25200 + 84600;
    tcs = new Date($('input[name="time_cancel_s"]').val()).getTime() / 1000 - 25200;
    tce = new Date($('input[name="time_cancel_e"]').val()).getTime() / 1000 - 25200 + 84600;
    tps = new Date($('input[name="time_pause_s"]').val()).getTime() / 1000 - 25200;
    tpe = new Date($('input[name="time_pause_e"]').val()).getTime() / 1000 - 25200 + 84600;
    hs = $('select[name="handover_status"]').val();
    filter()
}
function filter() {
    var get_type = '', get_st = '', get_debt = '', get_tss = '', get_tse = '', get_tes = '', get_tee = '', get_tcs = '', get_tce = '', get_tps = '', get_tpe = '',get_hs = '';
    if (project_type > 0) {
        get_type = '&type=' + project_type;
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
    if (debt > 0) {
        get_debt = '&debt=' + debt;
    }
    if (hs > 0) {
        get_hs = '&hs=' + hs;
    }
    var url_filter = "/du-an-khach-hang/?id=" + id_filter+get_st + get_type + get_hs+ get_debt + get_tss + get_tse + get_tes + get_tee + get_tcs + get_tce+get_tps+get_tpe;
    window.location.href = url_filter;
}
function export_excel() {
    var currentUrl = window.location.search;
    // console.log(currentUrl);
    window.location.href = '/excel_customer/' + currentUrl;
}