<div class="main_sidebar">
        <div class="main_top">
            <div class="add_project">
            </div>
            <div class="right_top">
                <div class="profile">
                    <img src="/images/avatar.png" alt="avatar" class="avatar">
                    <div class="box_profile">
                        <p class="name_role"><?= role(check_role()); ?></p>
                        <p class="name"><?= get_name(get_id()); ?> <img src="/images/arrow.svg" alt="Thêm dự án"></p>
                        <div class="nav_profile">
                            <ul>
                                <li><a href="#"><img src="/images/avatar.svg" alt="Thông tin cá nhân"> Thông tin cá nhân</a></li>
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

        <div class="body_add_project">
            <form id="form_add">
                <p class="title_page">Chỉnh sửa thu tiền</p>
                <a class="back_site" href="/quan-ly-thu-tien/">
                    <img src="/images/back.svg" alt="Thêm dự án">
                    <p>Quay lại</p>
                </a>
                <input type="text"  name="id" value="<?= $collect_money['id'] ?>" hidden>
                <div class="main_add_project">
                    <div class="this_add_project w_50">
                        <p class="title_input">Mã dự án <span>*</span></p>
                        <select name="project_id" id="project_id">
                            <option value="">Chọn mã dự án</option>
                            <?php foreach ($projects as $val) { ?>
                                <option <?= ($collect_money['project_id'] == $val['id']) ? 'selected' :  ( $val['delete_status'] == 1 ? 'hidden' : '') ?> value="<?= $val['id'] ?>"><?= project_id($val['id']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">ID giao dịch</p>
                        <input type="text" placeholder="ID giao dịch" name="bank_code" value="<?= $collect_money['bank_code'] ?>">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Khách hàng <span>*</span></p>
                        <input type="text" placeholder="Khách hàng" name="customer" id="customer" value="<?= $collect_money['customer'] ?>">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Thời gian giao dịch <span>*</span></p>
                        <input type="datetime-local" name="bank_time" id="bank_time" value="<?= ($collect_money['bank_time'] > 0) ? date('Y-m-d\TH:i', $collect_money['bank_time']) : '' ?>">
                        <p class="error"></p>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Hình thức thu tiền <span>*</span></p>
                        <select name="bank_type" id="bank_type">
                            <option value="">Chọn hình thức thu tiền</option>
                            <option <?= ($collect_money['bank_type'] == 1) ? 'selected' : '' ?> value="1">Thanh toán ngân hàng</option>
                            <option <?= ($collect_money['bank_type'] == 2) ? 'selected' : '' ?> value="2">Thanh toán USDT</option>
                        </select>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Số tiền nhận <span>*</span></p>
                        <input type="number" placeholder="Số tiền nhận" name="money" id="money" value="<?= $collect_money['money'] ?>">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Trạng thái giao dịch <span>*</span></p>
                        <select name="bank_status" id="bank_status">
                            <option <?= ($collect_money['bank_status'] == 0) ? 'selected' : '' ?> value="0">Không thành công</option>
                            <option <?= ($collect_money['bank_status'] == 1) ? 'selected' : '' ?> value="1">Thành công</option>
                            <option <?= ($collect_money['bank_status'] == 2) ? 'selected' : '' ?> value="2">Cần xác thực</option>
                        </select>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Thông tin nhận <span>*</span></p>
                        <select name="input_source" id="input_source">
                            <option value="">Chọn thông tin nhận</option>
                            <?php foreach ($input_source as $val) { ?>
                                <option <?= ($collect_money['input_source'] == $val['id']) ? 'selected' : (($val['status'] != 1 || $val['delete_status'] == 1) ? 'hidden' : '') ?> value="<?= $val['id'] ?>"><?= $val['acronym'] . ' - ' . $val['name'] . ' - ' . $val['stk'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Nội dung chuyển khoản </p>
                        <input type="text" placeholder="Nội dung chuyển khoản" name="bank_content" value="<?= $collect_money['bank_content'] ?>">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Ghi chú</p>
                        <input type="text" placeholder="Ghi chú" name="note" id="note" value="<?= $collect_money['note'] ?>">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Minh chứng </p>
                        <div class="box">
                            <input type="file" name="bank_image" id="bank_image" class="inputfile inputfile-1" onchange="$('.name_inp').text(this.files[0].name)">
                            <?php if ($collect_money['bank_image'] != '') { ?>
                                <a class="a_image" href="/<?= $collect_money['bank_image'] ?>" target="_blank" rel="noopener noreferrer">xem ảnh</a>
                            <?php } ?>
                            <label for="bank_image">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                </svg> <span class="name_inp">Tải lên</span></label>
                        </div>
                    </div>
                    <div class="btn_add_project">
                        <button class="add_from">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .inputfile+label svg {
        width: 1em;
        height: 1em;
        vertical-align: middle;
        fill: currentColor;
        margin-top: -0.25em;
        margin-right: 0.25em;
    }
</style>