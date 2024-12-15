<div class="main_sidebar">
    <div class="main_top">
        <div class="add_project">
            <a href="/them-du-an/">
                <div class="img_add_project"><img src="/images/add_red.svg" alt="Thêm dự án"></div>
                <p>Thêm dự án</p>
            </a>
        </div>
        <div class="right_top">
            <div class="profile">
                <img src="/images/avatar.png" alt="avatar" class="avatar">
                <div class="box_profile">
                    <p class="name_role"><?= role(check_role()); ?></p>
                    <p class="name"><?= get_name(get_id()); ?> <img src="/images/arrow.svg" alt="Thêm dự án"></p>
                    <div class="nav_profile">
                        <ul>
                            <li><a href="#"><img src="/images/avatar.svg" alt="Thông tin cá nhân"> Thông tin cá
                                    nhân</a></li>
                            <li><a href="#"><img src="/images/pass.svg" alt="Đổi mật khẩu"> Đổi mật khẩu</a></li>
                            <li><a href="/logout"><img src="/images/logout.svg" alt="Đăng xuất"> Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main">
    <div class="main_content">
        <div class="main_filter bg_main">
            <div class="title_project">
                <div class="box_btn_project" style="display: none;">
                    <p class="btn_project btn_project_cancel">Xóa</p>
                </div>
            </div>
            <div class="box_project">
                <div class="box_list_advanced">
                    <div class="show_advanced">
                        <p class="title_advanced">Hiện</p>
                        <div class="all_advanced">
                            <input type="checkbox" class="check_full" name="check_full" id="">
                            <p>Chọn tất cả</p>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path d="M42 19H6" stroke="#FF0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M30 7L42 19" stroke="#FF0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.80078 29H42.8008" stroke="#A5A5A5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.80078 29L18.8008 41" stroke="#A5A5A5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="hide_advanced">
                        <p class="title_advanced">Ẩn</p>
                        <div class="all_advanced">
                            <input type="checkbox" class="check_full" name="check_full" id="">
                            <p>Chọn tất cả</p>
                        </div>
                    </div>
                </div>
                <div class="list_btn_project">
                    <p class="reset_project">Hủy</p>
                    <p class="save_project">Chuyển</p>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="text" class="list_advanced_filter" hidden value="<?= $list_advanced ?>" data-page="<?= $page_advanced ?>">
<div class="list_data_advanced_1" style="display: none;">
    <div class="this_advanced" data-value="1">
        <input type="checkbox" class="check_i" name="check_i" value="1">
        <p>Mã dự án</p>
    </div>
    <div class="this_advanced" data-value="2">
        <input type="checkbox" class="check_i" name="check_i" value="2">
        <p>Thời gian tạo dự án</p>
    </div>
    <div class="this_advanced" data-value="3">
        <input type="checkbox" class="check_i" name="check_i" value="3">
        <p>P.I.C dự án</p>
    </div>
    <div class="this_advanced" data-value="4">
        <input type="checkbox" class="check_i" name="check_i" value="4">
        <p>Khách hàng</p>
    </div>
    <div class="this_advanced" data-value="5">
        <input type="checkbox" class="check_i" name="check_i" value="5">
        <p>Website dự án</p>
    </div>
    <div class="this_advanced" data-value="6">
        <input type="checkbox" class="check_i" name="check_i" value="6">
        <p>Trạng thái triển khai</p>
    </div>
    <div class="this_advanced" data-value="7">
        <input type="checkbox" class="check_i" name="check_i" value="7">
        <p>Thời gian bắt đầu triển khai</p>
    </div>
    <div class="this_advanced" data-value="8">
        <input type="checkbox" class="check_i" name="check_i" value="8">
        <p>Thời gian hoàn thành</p>
    </div>
    <div class="this_advanced" data-value="9">
        <input type="checkbox" class="check_i" name="check_i" value="9">
        <p>Trạng thái bàn giao</p>
    </div>
    <div class="this_advanced" data-value="10">
        <input type="checkbox" class="check_i" name="check_i" value="10">
        <p>Loại dự án</p>
    </div>
    <div class="this_advanced" data-value="25">
        <input type="checkbox" class="check_i" name="check_i" value="25">
        <p>Thương hiệu</p>
    </div>
    <div class="this_advanced" data-value="11">
        <input type="checkbox" class="check_i" name="check_i" value="11">
        <p>Thời gian hủy dự án</p>
    </div>
    <div class="this_advanced" data-value="12">
        <input type="checkbox" class="check_i" name="check_i" value="12">
        <p>Tiến độ phân dự án</p>
    </div>
    <div class="this_advanced" data-value="13">
        <input type="checkbox" class="check_i" name="check_i" value="13">
        <p>Trạng thái cộng tác viên</p>
    </div>
    <div class="this_advanced" data-value="14">
        <input type="checkbox" class="check_i" name="check_i" value="14">
        <p>Trạng thái công nợ</p>
    </div>
    <div class="this_advanced" data-value="15">
        <input type="checkbox" class="check_i" name="check_i" value="15">
        <p>Thời gian cập nhật ctv</p>
    </div>
    <div class="this_advanced" data-value="16">
        <input type="checkbox" class="check_i" name="check_i" value="16">
        <p>CTV thực hiện</p>
    </div>
    <div class="this_advanced" data-value="17">
        <input type="checkbox" class="check_i" name="check_i" value="17">
        <p>Người duyệt QA</p>
    </div>
    <div class="this_advanced" data-value="18">
        <input type="checkbox" class="check_i" name="check_i" value="18">
        <p>Thời gian cập nhật QA</p>
    </div>
    <div class="this_advanced" data-value="19">
        <input type="checkbox" class="check_i" name="check_i" value="19">
        <p>Trạng thái QA</p>
    </div>
    <div class="this_advanced" data-value="20">
        <input type="checkbox" class="check_i" name="check_i" value="20">
        <p>Thời gian tạm dừng</p>
    </div>
    <div class="this_advanced" data-value="21">
        <input type="checkbox" class="check_i" name="check_i" value="21">
        <p>Người duyệt index</p>
    </div>
    <div class="this_advanced" data-value="22">
        <input type="checkbox" class="check_i" name="check_i" value="22">
        <p>Thời gian cập nhật index</p>
    </div>
    <div class="this_advanced" data-value="23">
        <input type="checkbox" class="check_i" name="check_i" value="23">
        <p>Trạng thái index</p>
    </div>
    <div class="this_advanced" data-value="24">
        <input type="checkbox" class="check_i" name="check_i" value="24">
        <p>Thời gian dục khách hàng</p>
    </div>
</div>
<div class="list_data_advanced_2" style="display: none;">
    <div class="this_advanced" data-value="1">
        <input type="checkbox" class="check_i" name="check_i" value="1">
        <p>Mã công việc</p>
    </div>
    <div class="this_advanced" data-value="2">
        <input type="checkbox" class="check_i" name="check_i" value="2">
        <p>Hạng mục</p>
    </div>
    <div class="this_advanced" data-value="3">
        <input type="checkbox" class="check_i" name="check_i" value="3">
        <p>Loại công việc</p>
    </div>
    <div class="this_advanced" data-value="4">
        <input type="checkbox" class="check_i" name="check_i" value="4">
        <p>Người tạo</p>
    </div>
    <div class="this_advanced" data-value="5">
        <input type="checkbox" class="check_i" name="check_i" value="5">
        <p>Thời gian tạo</p>
    </div>
    <div class="this_advanced" data-value="6">
        <input type="checkbox" class="check_i" name="check_i" value="6">
        <p>Website</p>
    </div>
    <div class="this_advanced" data-value="7">
        <input type="checkbox" class="check_i" name="check_i" value="7">
        <p>CTV thực hiện</p>
    </div>
    <div class="this_advanced" data-value="8">
        <input type="checkbox" class="check_i" name="check_i" value="8">
        <p>Deadline CTV</p>
    </div>
    <div class="this_advanced" data-value="9">
        <input type="checkbox" class="check_i" name="check_i" value="9">
        <p>Tiến độ CTV</p>
    </div>
    <div class="this_advanced" data-value="10">
        <input type="checkbox" class="check_i" name="check_i" value="10">
        <p>Thời gian triển khai</p>
    </div>
    <div class="this_advanced" data-value="11">
        <input type="checkbox" class="check_i" name="check_i" value="11">
        <p>Thời gian hoàn thành</p>
    </div>
    <div class="this_advanced" data-value="12">
        <input type="checkbox" class="check_i" name="check_i" value="12">
        <p>Xác nhận duyệt</p>
    </div>
    <div class="this_advanced" data-value="13">
        <input type="checkbox" class="check_i" name="check_i" value="13">
        <p>QA thực hiện</p>
    </div>
    <div class="this_advanced" data-value="14">
        <input type="checkbox" class="check_i" name="check_i" value="14">
        <p>Tiến độ QA</p>
    </div>
    <div class="this_advanced" data-value="15">
        <input type="checkbox" class="check_i" name="check_i" value="15">
        <p>Thời gian duyệt</p>
    </div>
    <div class="this_advanced" data-value="16">
        <input type="checkbox" class="check_i" name="check_i" value="16">
        <p>Tiến độ công việc chung</p>
    </div>
    <div class="this_advanced" data-value="17">
        <input type="checkbox" class="check_i" name="check_i" value="17">
        <p>Thời gian hoàn thành</p>
    </div>
    <div class="this_advanced" data-value="18">
        <input type="checkbox" class="check_i" name="check_i" value="18">
        <p>Mức độ ưu tiên</p>
    </div>
</div>
<div class="list_data_advanced_3" style="display: none;">
    <div class="this_advanced" data-value="1">
        <input type="checkbox" class="check_i" name="check_i" value="1">
        <p>Mã dự án</p>
    </div>
    <div class="this_advanced" data-value="2">
        <input type="checkbox" class="check_i" name="check_i" value="2">
        <p>ID giao dịch</p>
    </div>
    <div class="this_advanced" data-value="3">
        <input type="checkbox" class="check_i" name="check_i" value="3">
        <p>Khách hàng</p>
    </div>
    <div class="this_advanced" data-value="4">
        <input type="checkbox" class="check_i" name="check_i" value="4">
        <p>Thời gian tạo</p>
    </div>
    <div class="this_advanced" data-value="5">
        <input type="checkbox" class="check_i" name="check_i" value="5">
        <p>Thời gian giao dịch</p>
    </div>
    <div class="this_advanced" data-value="6">
        <input type="checkbox" class="check_i" name="check_i" value="6">
        <p>Hình thức thu tiền</p>
    </div>
    <div class="this_advanced" data-value="7">
        <input type="checkbox" class="check_i" name="check_i" value="7">
        <p>Trạng thái giao dịch</p>
    </div>
    <div class="this_advanced" data-value="8">
        <input type="checkbox" class="check_i" name="check_i" value="8">
        <p>Thông tin nguồn nhận</p>
    </div>
</div>
<div class="list_data_advanced_4" style="display: none;">
    <div class="this_advanced" data-value="1">
        <input type="checkbox" class="check_i" name="check_i" value="1">
        <p>Mã công việc</p>
    </div>
    <div class="this_advanced" data-value="2">
        <input type="checkbox" class="check_i" name="check_i" value="2">
        <p>Website</p>
    </div>
    <div class="this_advanced" data-value="3">
        <input type="checkbox" class="check_i" name="check_i" value="3">
        <p>Hạng mục</p>
    </div>
    <div class="this_advanced" data-value="4">
        <input type="checkbox" class="check_i" name="check_i" value="4">
        <p>Loại công việc</p>
    </div>
    <div class="this_advanced" data-value="5">
        <input type="checkbox" class="check_i" name="check_i" value="5">
        <p>Thời gian nhận việc</p>
    </div>
    <div class="this_advanced" data-value="6">
        <input type="checkbox" class="check_i" name="check_i" value="6">
        <p>Deadline CTV</p>
    </div>
    <div class="this_advanced" data-value="7">
        <input type="checkbox" class="check_i" name="check_i" value="7">
        <p>Thời gian hoàn thành</p>
    </div>
    <div class="this_advanced" data-value="8">
        <input type="checkbox" class="check_i" name="check_i" value="8">
        <p>Trạng thái công việc</p>
    </div>
    <div class="this_advanced" data-value="9">
        <input type="checkbox" class="check_i" name="check_i" value="9">
        <p>Trạng thái duyệt QA</p>
    </div>
    <div class="this_advanced" data-value="10">
        <input type="checkbox" class="check_i" name="check_i" value="10">
        <p>Thời gian duyệt</p>
    </div>
    <div class="this_advanced" data-value="11">
        <input type="checkbox" class="check_i" name="check_i" value="11">
        <p>Xác nhận duyệt</p>
    </div>
</div>
<div class="list_data_advanced_5" style="display: none;">
    <div class="this_advanced" data-value="1">
        <input type="checkbox" class="check_i" name="check_i" value="1">
        <p>Mã công việc</p>
    </div>
    <div class="this_advanced" data-value="2">
        <input type="checkbox" class="check_i" name="check_i" value="2">
        <p>Website</p>
    </div>
    <div class="this_advanced" data-value="3">
        <input type="checkbox" class="check_i" name="check_i" value="3">
        <p>Hạng mục</p>
    </div>
    <div class="this_advanced" data-value="4">
        <input type="checkbox" class="check_i" name="check_i" value="4">
        <p>Loại công việc</p>
    </div>
    <div class="this_advanced" data-value="5">
        <input type="checkbox" class="check_i" name="check_i" value="5">
        <p>Người tạo</p>
    </div>
    <div class="this_advanced" data-value="6">
        <input type="checkbox" class="check_i" name="check_i" value="6">
        <p>CTV thực hiện</p>
    </div>
    <div class="this_advanced" data-value="7">
        <input type="checkbox" class="check_i" name="check_i" value="7">
        <p>Deadline CTV</p>
    </div>
    <div class="this_advanced" data-value="8">
        <input type="checkbox" class="check_i" name="check_i" value="7">
        <p>Thời gian CTV gửi</p>
    </div>
    <div class="this_advanced" data-value="9">
        <input type="checkbox" class="check_i" name="check_i" value="9">
        <p>Trạng thái công việc</p>
    </div>
    <div class="this_advanced" data-value="10">
        <input type="checkbox" class="check_i" name="check_i" value="10">
        <p>Thời gian cập nhật</p>
    </div>
    <div class="this_advanced" data-value="11">
        <input type="checkbox" class="check_i" name="check_i" value="11">
        <p>Trạng thái xác nhận</p>
    </div>
    <div class="this_advanced" data-value="12">
        <input type="checkbox" class="check_i" name="check_i" value="12">
        <p>Trạng thái index</p>
    </div>
</div>
<div class="list_data_advanced_6" style="display: none;">
    <div class="this_advanced" data-value="1">
        <input type="checkbox" class="check_i" name="check_i" value="1">
        <p>Mã dự án</p>
    </div>
    <div class="this_advanced" data-value="2">
        <input type="checkbox" class="check_i" name="check_i" value="2">
        <p>Deadline dự án</p>
    </div>
    <div class="this_advanced" data-value="3">
        <input type="checkbox" class="check_i" name="check_i" value="3">
        <p>Website</p>
    </div>
    <div class="this_advanced" data-value="4">
        <input type="checkbox" class="check_i" name="check_i" value="4">
        <p>Trạng thái công việc</p>
    </div>
    <div class="this_advanced" data-value="5">
        <input type="checkbox" class="check_i" name="check_i" value="5">
        <p>Thời gian cập nhật index</p>
    </div>
    <div class="this_advanced" data-value="6">
        <input type="checkbox" class="check_i" name="check_i" value="6">
        <p>Thời gian cập nhật tiếp theo</p>
    </div>
    <div class="this_advanced" data-value="7">
        <input type="checkbox" class="check_i" name="check_i" value="7">
        <p>Người duyệt index</p>
    </div>
</div>