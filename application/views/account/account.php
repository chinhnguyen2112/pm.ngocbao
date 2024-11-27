<div class="main_sidebar">
    <div class="main_top">
        <div class="add_project">
            <div class="img_add_project"><img src="/images/add_red.svg" alt="Thêm dự án"></div>
            <p>Thêm tài khoản</p>
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
    <div class="main_filter bg_main">
        <div class="title_filter">
            <div class="title_filter_left">
                <img src="/images/filter.svg" alt="Bộ lọc">
                <p>Bộ lọc</p>
            </div>
            <div class="show_filter" data-id="1">
                <p>Mở rộng</p> <img class="show_filter_img" src="/images/2_arrow.svg" alt="Thu gọn">
            </div>
        </div>
        <div class="list_filter">
            <div class="this_filter">
                <p class="p_title_filter">Tên đăng nhập</p>
                <select name="acc" onchange="filter_select(this)" class="select2">
                    <option value="0">Tên đăng nhập</option>
                    <?php foreach ($au as $val) {
                        if ($val['role'] >= check_role()) { ?>
                            <option <?= ($this->input->get('acc') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['username'] ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Số điện thoại</p>
                <select name="p" onchange="filter_select(this)" class="select2">
                    <option value="0">Số điện thoại</option>
                    <?php foreach ($phone as $val) { ?>
                        <option <?= ($this->input->get('p') === $val['phone']) ? 'selected' : '' ?> value="<?= $val['phone'] ?>"><?= $val['phone'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Vai trò</p>
                <select name="r" onchange="filter_select(this)">
                    <option value="0">vai trò</option>
                    <option <?= ($this->input->get('r') == 5) ? 'selected' : '' ?> value="5">Cộng tác viên</option>
                    <option <?= ($this->input->get('r') == 4) ? 'selected' : '' ?> value="4">QA</option>
                    <option <?= ($this->input->get('r') == 3) ? 'selected' : '' ?> value="3">Index</option>
                    <option <?= ($this->input->get('r') == 6) ? 'selected' : '' ?> value="6">Marketing</option>
                    <option <?= ($this->input->get('r') == 7) ? 'selected' : '' ?> value="7">Khách hàng</option>
                    <option <?= ($this->input->get('r') == 2) ? 'selected' : '' ?> value="2">PM</option>
                    <option <?= ($this->input->get('r') == 1) ? 'selected' : '' ?> value="1">Admin</option>
                </select>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Thời gian tạo</p>
                <div class="list_inp_filter">
                    <input type="date" name="created_at_start" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('cs') > 0) ?  date('Y-m-d', $this->input->get('cs')) : '' ?>">
                    <span>đến</span>
                    <input type="date" name="created_at_end" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('ce') > 0) ? date('Y-m-d', $this->input->get('ce')) : '' ?>">
                </div>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Trạng thái</p>
                <select name="stt_in" onchange="filter_select(this)">
                    <option value="0">Trạng thái</option>
                    <option <?= ($this->input->get('type') == 1) ? 'selected' : '' ?> value="1">Đang hoạt động</option>
                    <option <?= ($this->input->get('type') == 2) ? 'selected' : '' ?> value="2">Tạm dừng hoạt động</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="main">
    <div class="main_content">
        <div class="main_filter bg_main">
            <div class="title_project">
                <div class="box_btn_project" style="display: none;">
                    <p class="btn_project btn_del">Xóa</p>
                    <p class="btn_project btn_project_cancel">Hủy</p>
                </div>
            </div>
            <div class="box_project">
                <div class="project">
                    <table border="1" cellpadding="2" cellspacing="2">
                        <thead>
                            <tr>
                                <th>
                                    <div><input type="checkbox" class="check_full" name="check_full" id=""></div>
                                </th>
                                <th>
                                    <div>STT</div>
                                </th>
                                <th>
                                    <div>Tài khoản đăng nhập</div>
                                </th>
                                <th>
                                    <div>Họ và tên</div>
                                </th>
                                <th>
                                    <div>Email</div>
                                </th>
                                <th>
                                    <div>Sô điện thoại</div>
                                </th>
                                <th <?= (check_role() == 6) ? 'hidden' : '' ?>>
                                    <div>Vai trò</div>
                                </th>
                                <th>
                                    <div>Thời gian tạo</div>
                                </th>
                                <th>
                                    <div>Trạng thái</div>
                                </th>
                                <th>
                                    <div>Hành động</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $key => $val) {  ?>
                                <tr>
                                    <td><input type="checkbox" class="check_i" name="check_i" value="<?= $val['id'] ?>">
                                    </td>
                                    <td><?= ++$key ?></td>
                                    <td><?= $val['username'] ?></td>
                                    <td><?= $val['name'] ?></td>
                                    <td><?= $val['email'] ?></td>
                                    <td><?= $val['phone'] ?></td>
                                    <td <?= (check_role() == 6) ? 'hidden' : '' ?>><?= role($val['role']) ?></td>
                                    <td><?= date('H:i:s d/m/Y', $val['created_at']) ?>
                                    </td>
                                    <td class="edit_option">
                                        <?php if ($val['status'] == 1) { ?>
                                            <p style="color: #00B528;">Đang hoạt động</p>
                                        <?php } else { ?>
                                            <p style="color:#FF7A00;">Tạm dừng hoạt động</p>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <p class="edit_account" data-id="<?= $val['id'] ?>">Sửa</p>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="list_btn_project">
                    <p class="save_project">Lưu</p>
                    <p class="reset_project">Hủy</p>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination">
        <?= $this->pagination->create_links() ?>
    </div>
</div>
<div class="popup_add_project">
    <div class="body_add_project">
        <div class="add_account">
            <div class="title_add_project">
                <p>Thêm tài khoản <?= (check_role() == 6) ? 'khách hàng' : '' ?></p>
                <svg onclick="$('.popup_add_project').hide();" xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                    <rect y="16.25" width="22.2738" height="3.18197" rx="1.59099" transform="rotate(-45 0 16.25)" fill="white" />
                    <rect x="15.75" y="18.5" width="22.2738" height="3.18197" rx="1.59098" transform="rotate(-135 15.75 18.5)" fill="white" />
                </svg>
            </div>
            <form id="form_add">
                <div class="main_add_project">
                    <div class="this_add_project w_50">
                        <p class="title_input">Tên tài khoản <span>*</span></p>
                        <input type="text" class="username" name="username" id="username" placeholder="Nhập">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Mật khẩu <span>*</span></p>
                        <input type="text" name="password" id="password" placeholder="Nhập">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Họ và tên <span>*</span></p>
                        <input type="text" name="name" id="name" placeholder="Nhập">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Số điện thoại <span>*</span></p>
                        <input type="tel" name="phone" id="phone" placeholder="Nhập">
                    </div>
                    <div class="this_add_project">
                        <p class="title_input">Email <span>*</span></p>
                        <input type="email" name="email" id="email" placeholder="Nhập">
                    </div>
                    <div class="this_add_project" <?= (check_role() == 6) ? 'hidden' : '' ?>>
                        <p class="title_input">Vai trò <span>*</span></p>
                        <select class="select_add add_role" name="role" id="role">
                            <option value="5">Cộng tác viên</option>
                            <option value="4">QA</option>
                            <option value="3">Index</option>
                            <option value="6">Marketing</option>
                            <option <?= (check_role() == 6) ? 'selected' : '' ?> value="7">Khách hàng</option>
                            <?php if (check_admin() == 1) { ?>
                                <option value="2">PM</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project sl_job_type" style="display: none;">
                        <p class="title_input">Thương hiệu <span>*</span></p>
                        <div>
                            <select name="list_brand[]" class="select2" multiple>
                                <option value="">Chọn thương hiệu</option>
                                <?php
                                foreach ($list_brand as $val) { ?>
                                    <option value="<?= $val['id'] ?>"><?= $val['brand'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="list_brand[]" class="error"></label>
                    </div>
                    <div class="this_add_project">
                        <p class="title_input">Trạng thái <span>*</span></p>
                        <select name="status" id="status">
                            <option value="1">Đang hoạt động</option>
                            <option value="2">Tạm dừng hoạt động</option>
                        </select>
                    </div>
                    <button class="btn_add_project">
                        <p>Xác Nhận</p>
                    </button>
                </div>
            </form>
        </div>
        <div class="update_account" style="display: none;">
            <div class="title_add_project">
                <p>Sửa tài khoản</p>
                <svg onclick="$('.popup_add_project').hide();" xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                    <rect y="16.25" width="22.2738" height="3.18197" rx="1.59099" transform="rotate(-45 0 16.25)" fill="white" />
                    <rect x="15.75" y="18.5" width="22.2738" height="3.18197" rx="1.59098" transform="rotate(-135 15.75 18.5)" fill="white" />
                </svg>
            </div>
            <form id="form_edit">
                <div class="main_add_project">
                    <input type="text" name="id" placeholder="Nhập" hidden>
                    <div class="this_add_project w_50">
                        <p class="title_input">Tên tài khoản <span>*</span></p>
                        <input type="text" class="username" name="username" placeholder="Nhập">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Mật khẩu <span>*</span></p>
                        <input type="text" name="password" placeholder="Nhập">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Họ và tên <span>*</span></p>
                        <input type="text" name="name" placeholder="Nhập">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Số điện thoại <span>*</span></p>
                        <input type="tel" name="phone" placeholder="Nhập">
                    </div>
                    <div class="this_add_project">
                        <p class="title_input">Email <span>*</span></p>
                        <input type="email" name="email" placeholder="Nhập">
                    </div>
                    <div class="this_add_project" <?= (check_role() == 6) ? 'hidden' : '' ?>>
                        <p class="title_input">Vai trò <span>*</span></p>
                        <select class="select_add add_role" name="role">
                            <option value="5">Cộng tác viên</option>
                            <option value="4">QA</option>
                            <option value="3">Index</option>
                            <option value="6">Marketing</option>
                            <option <?= (check_role() == 6) ? 'selected' : '' ?> value="7">Khách hàng</option>
                            <option value="2">PM</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="this_add_project sl_job_type" style="display: none;">
                        <p class="title_input">Thương hiệu <span>*</span></p>
                        <div>
                            <select name="list_brand[]" class="list_brand select2" multiple>
                                <option value="">Chọn thương hiệu</option>
                                <?php
                                foreach ($list_brand as $val) { ?>
                                    <option value="<?= $val['id'] ?>"><?= $val['brand'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="list_brand[]" class="error"></label>
                    </div>
                    <div class="this_add_project">
                        <p class="title_input">Trạng thái <span>*</span></p>
                        <select name="status" class="status">
                            <option value="1">Đang hoạt động</option>
                            <option value="2">Tạm dừng hoạt động</option>
                        </select>
                    </div>
                    <button class="btn_add_project">
                        <p>Xác Nhận</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .this_add_project .select2-selection.select2-selection--multiple {
        border-radius: 30px;
        border: 1px solid #aaa;
    }

    .this_add_project .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        padding: 8px 10px;
    }

    .select2-container .select2-search--inline .select2-search__field {
        padding: 1px 10px;
    }

    .sl_job_type .error {
        position: absolute;
        top: 77px;
    }

    .sl_job_type {
        position: relative;
        margin-bottom: 10px;
    }

    .sl_job_type .select2-search__field {
        padding: 1px !important;
    }
</style>