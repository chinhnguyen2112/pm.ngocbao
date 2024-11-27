var check_click = 0;
var page_filter = $('.show_filter').data('id');
$('.show_filter').click(function () {
    if (check_click % 2 == 0) {
        $(this).find('p').text('Thu gọn');
        $(this).find('img').css('rotate', '0deg');
        $('.list_filter').css('height', 'unset');
        Cookies.set('page_' + page_filter, 1)
    } else {
        $(this).find('p').text('Mở rộng');
        $(this).find('img').css('rotate', '180deg');
        $('.list_filter').css('height', '78px');
        Cookies.set('page_' + page_filter, 0)
    }
    check_click++;
    var height = $('.main_sidebar').height();
    $('.main').css('padding-top', height);
    $('thead').css('top', height-1);
})
$('.select2').select2({
    placeholder: 'Chọn',
    'height': '100%'
});
if (Cookies.get('page_' + page_filter) == 1) {
    check_click = 1;
    $('.list_filter').css('height', 'unset');
    $('.show_filter').find('p').text('Thu gọn');
    $('.show_filter').find('img').css('rotate', '0deg');
}
var height = $('.main_sidebar').height();
$('.main').css('padding-top', height);
$('thead').css('top', height-1);
$('input[type="number"]').on('keypress', function (event) {
    let inputValue = $(this).val();
    let numberValue = Number(inputValue + event.key);
    if (event.key < '0' || event.key > '9') {
        event.preventDefault();
        return;
    }
    if (numberValue < 0) {
        event.preventDefault();
        $(this).val(0);
    }
});
$('input[type="number"]').on('blur', function () {
    let inputValue = $(this).val();
    if (inputValue < 0) {
        $(this).val(0);
    }
});
$('.inp_num').on('keypress', function (event) {
    let inputValue = $(this).val();
    let numberValue = Number(inputValue + event.key);
    if (event.key < '0' || event.key > '9') {
        event.preventDefault();
        return;
    }
    if (numberValue < 0) {
        event.preventDefault();
        $(this).val(0);
    }
    if (numberValue > 100) {
        event.preventDefault();
        $(this).val(100);
    }
});

$('.inp_num').on('blur', function () {
    let inputValue = $(this).val();
    if (inputValue < 0) {
        $(this).val(0);
    }
    if (inputValue > 100) {
        $(this).val(100);
    }
});
$('.input_num').on('keypress', function (event) {
    let inputValue = $(this).val();
    let numberValue = Number(inputValue + event.key);
    if (event.key < '0' || event.key > '9') {
        event.preventDefault();
        return;
    }
    if (numberValue < 0) {
        event.preventDefault();
        $(this).val(0);
    }
});

$('.input_num').on('blur', function () {
    let inputValue = $(this).val();
    if (inputValue < 0) {
        $(this).val(0);
    }
});
$('.td_break').each(function () {
    var text_break = $(this).find('.text_break');
    var read_more = $(this).find('.read-more');
    if (text_break[0].scrollHeight > (text_break.height() + 10)) {
        read_more.show();
    } 
    if (text_break[0].scrollWidth >= $(this).width()) {
        text_break.css('text-align', 'left');
    } else {
        text_break.css('margin', 'auto');
    }


})
$('.read-more').on('click', function () {
    $(this).parent().toggleClass('expanded');
    $('.read-more').text('Xem thêm');
    $('.expanded .read-more').text('Ẩn bớt');
});