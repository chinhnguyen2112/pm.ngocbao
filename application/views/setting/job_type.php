<div class="main_sidebar">
    <div class="main_top">
        <div class="add_project">
            <div class="img_add_project"><img src="/images/add_red.svg" alt="Thêm dự án"></div>
            <p>Thêm loại công việc</p>
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
            <div class="show_filter" data-id="10">
                <p>Mở rộng</p> <img class="show_filter_img" src="/images/2_arrow.svg" alt="Thu gọn">
            </div>
        </div>
        <div class="list_filter">
            <div class="this_filter">
                <p class="p_title_filter">Tên loại công việc</p>
                <select name="name" onchange="filter_select(this)" class="select2">
                    <option value="0">Tên loại công việc</option>
                    <?php foreach ($name as $val) { ?>
                        <option <?= ($this->input->get('n') == $val['name']) ? 'selected' : '' ?> value="<?= $val['name'] ?>"><?= $val['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Thời gian thêm</p>
                <div class="list_inp_filter">
                    <input type="date" name="created_at_start" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('cs') > 0) ?  date('Y-m-d', $this->input->get('cs')) : '' ?>">
                    <span>đến</span>
                    <input type="date" name="created_at_end" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('ce') > 0) ? date('Y-m-d', $this->input->get('ce')) : '' ?>">
                </div>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Người thêm</p>
                <select name="author" onchange="filter_select(this)" class="select2">
                    <option value="0">Người thêm</option>
                    <?php foreach ($author as $val) { ?>
                        <option <?= ($this->input->get('au') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                    <?php } ?>
                </select>
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
                                <th rowspan="2">
                                    <div><input type="checkbox" class="check_full" name="check_full" id=""></div>
                                </th>
                                <th rowspan="2">Hành động</th>
                                <th rowspan="2">
                                    <div>Tên loại công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thời gian thêm</div>
                                </th>
                                <th rowspan="2">
                                    <div>Người thêm</div>
                                </th>
                                <!-- <th rowspan="2">
                                    <div>Chi phí công việc</div>
                                </th> -->
                                <th rowspan="2">
                                    <div>Thông tin công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Index</div>
                                </th>
                                <th rowspan="2">
                                    <div>Trạng thái</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $val) {  ?>
                                <tr>
                                    <td><input type="checkbox" class="check_i" name="check_i" value="<?= $val['id'] ?>"></td>
                                    <td><img style="cursor:pointer" class="img_edit" data-id="<?= $val['id'] ?>" src="/images/edit.svg" alt="sửa"></td>
                                    <td><?= $val['name'] ?></td>
                                    <td><?= date('H:i:s d/m/Y', $val['created_at']) ?></td>
                                    <td><?= $val['name_author'] ?></td>
                                    <!-- <td><?= number_format($val['price']) ?></td> -->
                                    <td class="td_break">
                                        <p class="text_break"><?= nl2br($val['info']) ?></p>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td>
                                        <p class="index_job cl<?= $val['status_index'] ?>"><?= ($val['status_index'] == 1) ? $val['ratio'].'%' : "Không" ?></p>
                                    </td>
                                    <td class="edit_option">
                                        <div class="status_project" data-id="<?= $val['id'] ?>">
                                            <p class="<?= ($val['status'] == 1) ? 'active' : '' ?>">Đang hoạt động</p>
                                            <p class="<?= ($val['status'] == 2) ? 'active' : '' ?>" style="color:#FF7A00;">Tạm dừng hoạt động</p>
                                        </div>
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
        <div class="title_add_project">
            <p>Thêm loại công việc</p>
            <svg onclick="$('.popup_add_project').hide();" xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                <rect y="16.25" width="22.2738" height="3.18197" rx="1.59099" transform="rotate(-45 0 16.25)" fill="white" />
                <rect x="15.75" y="18.5" width="22.2738" height="3.18197" rx="1.59098" transform="rotate(-135 15.75 18.5)" fill="white" />
            </svg>
        </div>
        <form id="form_add">
            <input type="text" name="id" value="0" hidden>
            <div class="main_add_project">
                <div class="this_add_project">
                    <p class="title_input">Tên loại công việc <span>*</span></p>
                    <input type="text" name="name" id="name" placeholder="Nhập">
                </div>
                <!-- <div class="this_add_project">
                    <p class="title_input">Chi phí công việc <span>*</span></p>
                    <input type="text" class="input_num" name="price" id="price" placeholder="Nhập">
                </div> -->
                <div class="this_add_project">
                    <p class="title_input">Thông tin công việc <span>*</span></p>
                    <textarea style="height: 120px;" name="info"></textarea>
                </div>
                <div class="this_add_project  check_status_index">
                    <div class="status_index">
                        <p class="title_input">Index</p>
                        <div class="list_data_index" data-val="1">
                            <div class="data_index">
                                <input type="checkbox" data-val="1" checked class="inp_status_index" id="checkbox1">
                                <label for="checkbox1" class="checkmark"></label>
                                <p>Có</p>
                            </div>
                            <div class="data_index">
                                <input type="checkbox" data-val="0" class="inp_status_index" id="checkbox2">
                                <label for="checkbox2" class="checkmark"></label>
                                <p>Không</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="this_add_project box_ratio">
                    <p class="title_input">Tỉ lệ index mong muốn <span>*</span></p>
                    <div style="position: relative">
                    <input type="text" placeholder="Nhập tỉ lệ" name="ratio" class="input_num" value="">
                    <p class="ab_%"> %</p></div>
                </div>
                <div class="this_add_project">
                    <p class="title_input">Trạng thái <span>*</span></p>
                    <select name="status" id="status">
                        <option value="">Chọn trạng thái</option>
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