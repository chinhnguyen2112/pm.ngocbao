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
    <div class="main_filter bg_main">
        <div class="title_filter">
            <div class="title_filter_left">
                <img src="/images/filter.svg" alt="Bộ lọc">
                <p>Bộ lọc</p>
            </div>
            <div class="show_filter" data-id="7">
                <p>Mở rộng</p> <img class="show_filter_img" src="/images/2_arrow.svg" alt="Thu gọn">
            </div>
        </div>
        <div class="list_filter">
            <div class="this_filter">
                <p class="p_title_filter">Mã dự án</p>
                <select name="project" onchange="filter_select(this)" class="select2">
                    <option value="0">Mã dự án</option>
                    <?php foreach ($filter_project as $val) { ?>
                        <option <?= ($this->input->get('id') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= project_id($val['id']) ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Loại dự án</p>
                <select name="project_type" onchange="filter_select(this)" class="select2">
                    <option value="0">Loại dự án</option>
                    <?php foreach ($project_type as $val) { ?>
                        <option <?= ($this->input->get('type') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Tiến độ dự án</p>
                <select name="status" onchange="filter_select(this)">
                    <option value="0">Tiến độ dự án</option>
                    <?php foreach (array_status_project() as $val) { ?>
                        <option <?= ($this->input->get('st') == $val['status'] + 1) ? 'selected' : '' ?> value="<?= $val['status'] + 1 ?>"><?= $val['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Thời gian bắt đầu triển khai</p>
                <div class="list_inp_filter">
                    <input type="date" name="time_start_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tss') > 0) ?  date('Y-m-d', $this->input->get('tss')) : '' ?>">
                    <span>đến</span>
                    <input type="date" name="time_start_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tse') > 0) ? date('Y-m-d', $this->input->get('tse')) : '' ?>">
                </div>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Thời gian hoàn thành</p>
                <div class="list_inp_filter">
                    <input type="date" name="time_end_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tes') > 0) ?  date('Y-m-d', $this->input->get('tes')) : '' ?>">
                    <span>đến</span>
                    <input type="date" name="time_end_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tee') > 0) ? date('Y-m-d', $this->input->get('tee')) : '' ?>">
                </div>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Thời gian tạm dừng</p>
                <div class="list_inp_filter">
                    <input type="date" name="time_pause_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tps') > 0) ?  date('Y-m-d', $this->input->get('tps')) : '' ?>">
                    <span>đến</span>
                    <input type="date" name="time_pause_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tpe') > 0) ? date('Y-m-d', $this->input->get('tpe')) : '' ?>">
                </div>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Thời gian hủy dự án</p>
                <div class="list_inp_filter">
                    <input type="date" name="time_cancel_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tcs') > 0) ?  date('Y-m-d', $this->input->get('tcs')) : '' ?>">
                    <span>đến</span>
                    <input type="date" name="time_cancel_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tce') > 0) ? date('Y-m-d', $this->input->get('tce')) : '' ?>">
                </div>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Trạng thái công nợ</p>
                <select name="debt" onchange="filter_select(this)">
                    <option value="0">Trạng thái công nợ</option>
                    <option <?= ($this->input->get('debt') == 1) ? 'selected' : '' ?> value="1">Chưa tất toán</option>
                    <?php foreach (array_debt_status() as $val) { ?>
                        <option <?= ($this->input->get('debt') == $val['status'] + 1) ? 'selected' : '' ?> value="<?= $val['status'] + 1 ?>"><?= $val['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="this_filter">
                <p class="p_title_filter">Trạng thái bàn giao</p>
                <select name="handover_status" onchange="filter_select(this)">
                    <option value="0">Trạng thái bàn giao</option>
                    <option <?= ($this->input->get('hs') == 1) ? 'selected' : '' ?> value="1">Chưa bàn giao</option>
                    <?php foreach (array_handover_status() as $val) { ?>
                        <option <?= ($this->input->get('hs') == $val['status'] + 1) ? 'selected' : '' ?> value="<?= $val['status'] + 1 ?>"><?= $val['name'] ?></option>
                    <?php } ?>
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
                    <p class="box_all_money">Tổng tiền : <span class="all_money">10000</span> đ</p>
                </div>
            </div>
            <div class="box_project">
                <div class="project">
                    <table border="1" cellpadding="2" cellspacing="2">
                        <thead>
                            <tr>
                                <th rowspan="3">
                                    <div><input type="checkbox" class="check_full" name="check_full" id=""></div>
                                </th>
                                <th rowspan="3">
                                    <div>Mã dự án</div>
                                </th>
                                <th rowspan="3">
                                    <div>Loại dự án</div>
                                </th>
                                <th colspan="5" class="th_col">Trạng thái triển khai</th>
                                <th rowspan="3">
                                    <div>Giá gốc</div>
                                </th>
                                <th rowspan="3">
                                    <div>Số tiền cần thanh toán( đã bao gồm chiết khấu)</div>
                                </th>
                                <th rowspan="3">
                                    <div>Đã thanh toán</div>
                                </th>
                                <th rowspan="3">
                                    <div>Công nợ</div>
                                </th>
                                <th rowspan="3">
                                    <div>Trạng thái công nợ</div>
                                </th>
                                <th rowspan="3">
                                    <div>Trạng thái bàn giao</div>
                                </th>
                            </tr>
                            <tr>
                                <th rowspan="2" class="col_color">Tiến độ dự án</th>
                                <th rowspan="2" class="col_color">Thời gian bắt đầu triển khai</th>
                                <th rowspan="2" class="col_color">Thời gian hoàn thành</th>
                                <th rowspan="2" class="col_color">Thời gian tạm dừng</th>
                                <th rowspan="2" class="col_color">Thời gian hủy dự án</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($project as $val) {?>
                                <tr data-id="<?= $val['id'] ?>">
                                    <td><input type="checkbox" class="check_i" name="check_i" value="<?= $val['id'] ?>">
                                    </td>
                                    <td><?= project_id($val['id']) ?></td>
                                    <td><?= $val['name_project_type'] ?></td>
                                    <td><?= status_project($val['status']) ?></td>
                                    <td><?php if ($val['time_start'] > 0) {
                                            echo date('H:i:s d/m/Y', $val['time_start']);
                                        } else { ?><p style="color:#ccc;">--+--</p><?php } ?></td>
                                    <td><?php if ($val['time_end'] > 0) {
                                            echo date('H:i:s d/m/Y', $val['time_end']);
                                        } else { ?><p style="color:#ccc;">--+--</p><?php } ?></td>
                                    <td><?php if ($val['time_pause'] > 0) {
                                            echo date('H:i:s d/m/Y', $val['time_pause']);
                                        } else { ?><p style="color:#ccc;">--+--</p><?php } ?></td>
                                    <td><?php if ($val['time_cancel'] > 0) {
                                            echo date('H:i:s d/m/Y', $val['time_cancel']);
                                        } else { ?><p style="color:#ccc;">--+--</p><?php } ?></td>
                                    <td><?= number_format($val['price_project_type']) ?> đ</td>
                                    <td><?= number_format($val['revenue']) ?> đ</td>
                                    <td><?php $money = fn_get_row('SUM(money) as money_sum', ['project_id' => $val['id'], 'bank_status' => 1, 'delete_status' => 0], 'collect_money');
                                        echo number_format($money['money_sum']); ?></td>
                                    <td class="this_money" data-money="<?= ($val['revenue'] - $money['money_sum'] > 0) ? $val['revenue'] - $money['money_sum'] : 0 ?>"><?= (number_format($val['revenue'] - $money['money_sum']) > 0) ? number_format($val['revenue'] - $money['money_sum']) : 0 ?>
                                    </td>
                                    <td><?= debt_status($val['debt_status']) ?></td>
                                    <td><?= handover_status($val['handover_status']) ?></td>
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