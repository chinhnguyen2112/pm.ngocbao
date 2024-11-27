<div class="main_sidebar">
    <div class="main_top">
        <div class="add_project">
            <a href="/them-moi-thu-tien/">
                <div class="img_add_project"><img src="/images/add_red.svg" alt="Thêm dự án"></div>
                <p>Thêm mới thu tiền</p>
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
            <div class="left_filter">
                <div class="advanced_filter">
                    <p>Cài đặt cấu hình</p> <img src="/images/arrow_2.svg" alt="Thu gọn">
                    <div class="hv_advanced">
                        <div class="box_advanced">
                            <p>Bảng</p>
                            <a href="/cau-hinh-bo-loc/?id=3">
                                <p>Bộ lọc</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="show_filter" data-id="5">
                    <p>Mở rộng</p> <img class="show_filter_img" src="/images/2_arrow.svg" alt="Thu gọn">
                </div>
            </div>
        </div>
        <div class="list_filter">
            <?php $list_filter = ($advanced_filter != null && $advanced_filter['list'] != null) ? explode(',', $advanced_filter['list']) : null; ?>
            <?php if (!in_array(1, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Mã dự án</p>
                    <select name="project" onchange="filter_select(this)" class="select2">
                        <option value="0">Mã dự án</option>
                        <?php foreach ($filter_project as $val) { ?>
                            <option <?= ($this->input->get('id') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= project_id($val['id']) ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(2, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">ID giao dịch</p>
                    <select name="bank_code" onchange="filter_select(this)" class="select2">
                        <option value="0">ID giao dịch</option>
                        <option <?= ($this->input->get('bc') == 'khongcoma') ? 'selected' : '' ?> value="khongcoma">Không có mã giao dịch</option>
                        <?php foreach ($bank_code as $val) { ?>
                            <option <?= ($this->input->get('bc') == $val['bank_code']) ? 'selected' : '' ?> value="<?= $val['bank_code'] ?>"><?= $val['bank_code'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(3, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Khách hàng</p>
                    <select name="customer" onchange="filter_select(this)" class="select2">
                        <option value="0">Khách hàng</option>
                        <?php foreach ($customer as $val) { ?>
                            <option <?= ($this->input->get('cus') == $val['customer']) ? 'selected' : '' ?> value="<?= $val['customer'] ?>"><?= $val['customer'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(4, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian tạo</p>
                    <div class="list_inp_filter">
                        <input type="date" name="created_at_start" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('cs') > 0) ?  date('Y-m-d', $this->input->get('cs')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="created_at_end" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('ce') > 0) ? date('Y-m-d', $this->input->get('ce')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(5, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian giao dịch</p>
                    <div class="list_inp_filter">
                        <input type="date" name="time_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('ts') > 0) ?  date('Y-m-d', $this->input->get('ts')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="time_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('te') > 0) ? date('Y-m-d', $this->input->get('te')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(6, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Hình thức thu tiền</p>
                    <select name="type" onchange="filter_select(this)">
                        <option value="0">Hình thức thu tiền</option>
                        <option <?= ($this->input->get('type') == 1) ? 'selected' : '' ?> value="1">Thanh toán ngân hàng</option>
                        <option <?= ($this->input->get('type') == 2) ? 'selected' : '' ?> value="2">Thanh toán USDT</option>
                    </select>
                </div>
            <?php }
            if (!in_array(7, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Trạng thái giao dịch</p>
                    <select name="bank_status" onchange="filter_select(this)">
                        <option value="0">Trạng thái giao dịch</option>
                        <option <?= ($this->input->get('bs') == 1) ? 'selected' : '' ?> value="1">Thành công</option>
                        <option <?= ($this->input->get('bs') == 3) ? 'selected' : '' ?> value="3">Không thành công</option>
                        <option <?= ($this->input->get('bs') == 2) ? 'selected' : '' ?> value="2">Cần xác thực</option>
                    </select>
                </div>
            <?php }
            if (!in_array(8, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thông tin nguồn nhận</p>
                    <select name="input_source" onchange="filter_select(this)" class="select2">
                        <option value="0">Thông tin nhận</option>
                        <?php foreach ($input_source as $val) { ?>
                            <option <?= ($this->input->get('in') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['acronym'] . ' - ' . $val['name'] . ' - ' . $val['stk'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php } ?>
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
                <div class="project">
                    <table border="1" cellpadding="2" cellspacing="2">
                        <thead>
                            <tr>
                                <th rowspan="2">
                                    <div><input type="checkbox" class="check_full" name="check_full" id=""></div>
                                </th>
                                <th rowspan="2">Hành động</th>
                                <th rowspan="2">
                                    <div>Mã dự án</div>
                                </th>
                                <th rowspan="2">
                                    <div>ID giao dịch</div>
                                </th>
                                <th rowspan="2">
                                    <div>Khách hàng</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thời gian tạo</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thời giao dịch</div>
                                </th>
                                <th rowspan="2">
                                    <div>Hình thức thu tiền</div>
                                </th>
                                <th rowspan="2">
                                    <div>Số tiền đã thu</div>
                                </th>
                                <th rowspan="2">
                                    <div>Trạng thái giao dịch</div>
                                </th>
                                <th colspan="3" class="th_col">Thông tin nguồn nhận</th>
                                <th colspan="3" class="th_col">Thông tin bổ sung</th>
                            </tr>
                            <tr>
                                <th>Chủ tài khoản</th>
                                <th>STK/ID USDT</th>
                                <th>Tên ngân hàng/ USDT</th>
                                <th>Nội dung chuyển khoản</th>
                                <th>Minh chứng</th>
                                <th>Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($collect_moneys as $val) {  ?>
                                <tr>
                                    <td><input type="checkbox" class="check_i" name="check_i" value="<?= $val['id'] ?>"></td>
                                    <td><a href="/sua-thu-tien/<?= $val['id'] ?>"><img src="/images/edit.svg" alt="sửa"></a></td>
                                    <td><?= project_id($val['project_id']) ?></td>
                                    <td><?= ($val['bank_code'] != '') ? $val['bank_code'] : 'Không có mã giao dịch' ?></td>
                                    <td><?= $val['customer'] ?></td>
                                    <td><?= date('H:i:s d/m/Y', $val['created_at']) ?></td>
                                    <td><?= date('H:i:s d/m/Y', $val['bank_time']) ?></td>
                                    <td><?= bank_type($val['bank_type']) ?></td>
                                    <td><?= number_format($val['money']) ?></td>
                                    <td><?= bank_status($val['bank_status']) ?></td>
                                    <td><?= $val['name_input_source'] ?></td>
                                    <td><?= $val['stk'] ?></td>
                                    <td><?php $bank = fn_get_row('acronym', ['id' => $val['id_bank']], 'bank');
                                        echo $bank['acronym']; ?></td>
                                    <td class="td_break">
                                        <p class="text_break"><?= nl2br($val['bank_content']) ?></p>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td><a href="/<?= $val['bank_image'] ?>" target="_blank" rel="noopener noreferrer" style="display: flex;gap:5px;justify-content: center;color: #2ec24f;" class="name_file"><?= str_replace('upload/bank_image/', '', $val['bank_image']) ?></a>
                                    </td>
                                    <td class="td_break">
                                        <p class="text_break"><?= nl2br($val['note']) ?></p>
                                        <button class="read-more">Xem thêm</button>
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