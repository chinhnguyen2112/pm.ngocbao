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
            <div class="left_filter">
                <div class="advanced_filter">
                    <p>Cài đặt cấu hình</p> <img src="/images/arrow_2.svg" alt="Thu gọn">
                    <div class="hv_advanced">
                        <div class="box_advanced">
                            <p>Bảng</p>
                            <a href="/cau-hinh-bo-loc/?id=1">
                                <p>Bộ lọc</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="show_filter" data-id="7">
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
                    <p class="p_title_filter">Thời gian tạo dự án</p>
                    <div class="list_inp_filter">
                        <input type="date" name="created_at_start" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('cs') > 0) ?  date('Y-m-d', $this->input->get('cs')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="created_at_end" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('ce') > 0) ? date('Y-m-d', $this->input->get('ce')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(3, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">P.I.C dự án</p>
                    <select name="pic" onchange="filter_select(this)" class="select2">
                        <option value="0">P.I.C dự án</option>
                        <?php foreach ($author as $val) { ?>
                            <option <?= ($this->input->get('pic') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(4, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Khách hàng</p>
                    <select name="customer" onchange="filter_select(this)" class="select2">
                        <option value="0">Khách hàng</option>
                        <?php foreach ($customer as $val) { ?>
                            <option <?= ($this->input->get('cus') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(5, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Website dự án</p>
                    <select name="website" onchange="filter_select(this)" class="select2">
                        <option value="0">Website dự án</option>
                        <?php foreach ($website as $val) { ?>
                            <option <?= ($this->input->get('web') == $val['website']) ? 'selected' : '' ?> value="<?= $val['website'] ?>"><?= $val['website'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(6, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Trạng thái triển khai</p>
                    <select name="status" onchange="filter_select(this)">
                        <option value="0">Trạng thái triển khai</option>
                        <?php foreach (array_status_project() as $val) { ?>
                            <option <?= ($this->input->get('st') == $val['status'] + 1) ? 'selected' : '' ?> value="<?= $val['status'] + 1 ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(7, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian bắt đầu triển khai</p>
                    <div class="list_inp_filter">
                        <input type="date" name="time_start_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tss') > 0) ?  date('Y-m-d', $this->input->get('tss')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="time_start_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tse') > 0) ? date('Y-m-d', $this->input->get('tse')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(8, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian hoàn thành</p>
                    <div class="list_inp_filter">
                        <input type="date" name="time_end_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tes') > 0) ?  date('Y-m-d', $this->input->get('tes')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="time_end_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tee') > 0) ? date('Y-m-d', $this->input->get('tee')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(9, $list_filter)) { ?>
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
            <?php }
            if (!in_array(10, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Loại dự án</p>
                    <select name="project_type" onchange="filter_select(this)" class="select2">
                        <option value="0">Loại dự án</option>
                        <?php foreach ($project_type as $val) { ?>
                            <option <?= ($this->input->get('type') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(25, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thương hiệu</p>
                    <select name="brand" onchange="filter_select(this)" class="select2">
                        <option value="0">Thương hiệu</option>
                        <?php foreach ($list_brand as $val) { ?>
                            <option <?= ($this->input->get('br') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['brand'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(11, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian hủy dự án</p>
                    <div class="list_inp_filter">
                        <input type="date" name="time_cancel_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tcs') > 0) ?  date('Y-m-d', $this->input->get('tcs')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="time_cancel_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tce') > 0) ? date('Y-m-d', $this->input->get('tce')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(12, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Tiến độ phân dự án</p>
                    <select name="project_division" onchange="filter_select(this)">
                        <option value="0">Tiến độ phân dự án</option>
                        <option <?= ($this->input->get('pd') == 1) ? 'selected' : '' ?> value="1">Chưa phân</option>
                        <option <?= ($this->input->get('pd') == 2) ? 'selected' : '' ?> value="2">Đã phân</option>
                    </select>
                </div>
            <?php }
            if (!in_array(13, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Trạng thái cộng tác viên</p>
                    <select name="status_ctv" onchange="filter_select(this)">
                        <option value="0">Trạng thái công tác viên</option>
                        <option <?= ($this->input->get('sctv') == 1) ? 'selected' : '' ?> value="1">Chưa phân</option>
                        <option <?= ($this->input->get('sctv') == 2) ? 'selected' : '' ?> value="2">Hoàn thành</option>
                        <option <?= ($this->input->get('sctv') == 3) ? 'selected' : '' ?> value="3">Đang triển khai</option>
                    </select>
                </div>
            <?php }
            if (!in_array(14, $list_filter)) { ?>
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
            <?php }
            if (!in_array(15, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian cập nhật ctv</p>
                    <div class="list_inp_filter">
                        <input type="date" name="ctv_job_completion_time_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('cts') > 0) ?  date('Y-m-d', $this->input->get('cts')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="ctv_job_completion_time_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('cte') > 0) ? date('Y-m-d', $this->input->get('cte')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(16, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">CTV thực hiện</p>
                    <select name="ctv" onchange="filter_select(this)" class="select2">
                        <option value="0">Cộng tác viên</option>
                        <?php foreach ($ctv_filter as $val) {
                            if ($val['role'] == 5) { ?>
                                <option <?= ($this->input->get('ctv') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(17, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Người duyệt QA</p>
                    <select name="qa" onchange="filter_select(this)" class="select2">
                        <option value="0">Chọn</option>
                        <?php foreach ($qa_check as $val) {
                            if ($val['role'] == 4) { ?>
                                <option <?= ($this->input->get('qa') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(18, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian cập nhật QA</p>
                    <div class="list_inp_filter">
                        <input type="date" name="qa_time_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('qas') > 0) ?  date('Y-m-d', $this->input->get('qas')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="qa_time_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('qae') > 0) ? date('Y-m-d', $this->input->get('qae')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(19, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Trạng thái QA</p>
                    <select name="status_qa" onchange="filter_select(this)">
                        <option value="0">Trạng thái QA</option>
                        <?php foreach (array_job_qa_success() as $val) { ?>
                            <option <?= ($this->input->get('sqa') == $val['status']) ? 'selected' : '' ?> value="<?= $val['status'] ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(20, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian tạm dừng</p>
                    <div class="list_inp_filter">
                        <input type="date" name="time_pause_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tps') > 0) ?  date('Y-m-d', $this->input->get('tps')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="time_pause_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tpe') > 0) ? date('Y-m-d', $this->input->get('tpe')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(21, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Người duyệt index</p>
                    <select name="index" onchange="filter_select(this)" class="select2">
                        <option value="0">Người duyệt index</option>
                        <?php foreach ($index_filter as $val) {
                            if ($val['role'] == 3) { ?>
                                <option <?= ($this->input->get('in') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(22, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian cập nhật index</p>
                    <div class="list_inp_filter">
                        <input type="date" name="time_index_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tis') > 0) ?  date('Y-m-d', $this->input->get('tis')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="time_index_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tie') > 0) ? date('Y-m-d', $this->input->get('tie')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(23, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Trạng thái index</p>
                    <select name="status_index" onchange="filter_select(this)">
                        <option value="0">Chọn</option>
                        <option <?= ($this->input->get('sin') == 1) ? 'selected' : '' ?> value="1">Hoàn thành</option>
                        <!-- <option <?= ($this->input->get('sin') == 2) ? 'selected' : '' ?> value="2">Chưa hoàn thành</option> -->
                        <option <?= ($this->input->get('sin') == 3) ? 'selected' : '' ?> value="3">Có thể check</option>
                        <option <?= ($this->input->get('sin') == 4) ? 'selected' : '' ?> value="4">Chưa cần check</option>
                        <option <?= ($this->input->get('sin') == 5) ? 'selected' : '' ?> value="5">Không cần check</option>
                    </select>
                </div>
            <?php }
            if (!in_array(24, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian dục khách hàng</p>
                    <div class="list_inp_filter">
                        <input type="date" name="time_cus_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tus') > 0) ?  date('Y-m-d', $this->input->get('tus')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="time_cus_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tue') > 0) ? date('Y-m-d', $this->input->get('tue')) : '' ?>">
                    </div>
                </div><?php } ?>
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
                                <th rowspan="3">
                                    <div><input type="checkbox" class="check_full" name="check_full" id=""></div>
                                </th>
                                <th rowspan="3">Hành động</th>
                                <th rowspan="3">Thêm công việc</th>
                                <th rowspan="3">
                                    <div>Mã dự án</div>
                                </th>
                                <th rowspan="3">
                                    <div>Thời gian tạo dự án</div>
                                </th>
                                <th rowspan="3">
                                    <div>P.I.C dự án</div>
                                </th>
                                <th rowspan="3">
                                    <div>Khách hàng</div>
                                </th>
                                <th rowspan="3">
                                    <div>Doanh thu</div>
                                </th>
                                <th rowspan="3">
                                    <div>Đã thu</div>
                                </th>
                                <th rowspan="3">
                                    <div>Công nợ</div>
                                </th>
                                <th rowspan="3">
                                    <div>Trạng thái công nợ</div>
                                </th>
                                <th rowspan="3">
                                    <div>Thời gian dục khách hàng</div>
                                </th>
                                <th colspan="5" class="th_col">Trạng thái triển khai</th>
                                <th rowspan="3">
                                    <div>Trạng thái bàn giao</div>
                                </th>
                                <th rowspan="3">
                                    <div>Website dự án</div>
                                </th>
                                <th rowspan="3">
                                    <div>Loại dự án</div>
                                </th>
                                <th rowspan="3">
                                    <div>Thương hiệu</div>
                                </th>
                                <th rowspan="3">
                                    <div>Thông tin dự án</div>
                                </th>
                                <th rowspan="3">
                                    <div>Deadline dự án</div>
                                </th>
                                <th rowspan="3">
                                    <div>Loại công việc</div>
                                </th>
                                <th rowspan="3">
                                    <div>Tiến độ phân dự án</div>
                                </th>
                                <th colspan="10" class="th_col">Tiến độ dự án</th>
                                <th rowspan="3">
                                    <div>File dự án</div>
                                </th>
                                <th rowspan="3">
                                    <div>Chi phí thuê CTV</div>
                                </th>
                                <th rowspan="3">
                                    <div>CTV thực hiện dự án</div>
                                </th>
                                <th rowspan="3">
                                    <div>Ghi chú index</div>
                                </th>
                                <th rowspan="3">
                                    <div>Ghi chú</div>
                                </th>
                            </tr>
                            <tr>
                                <th rowspan="2" class="col_color">Trạng thái</th>
                                <th rowspan="2" class="col_color">Thời gian đang triển khai</th>
                                <th rowspan="2" class="col_color">Thời gian hoàn thành</th>
                                <th rowspan="2" class="col_color">Thời gian hủy dự án</th>
                                <th rowspan="2" class="col_color">Thời gian tạm dừng</th>
                                <th colspan="2">CTV</th>
                                <th colspan="3">QA</th>
                                <th colspan="5">Indexed</th>
                            </tr>
                            <tr>
                                <th>Trạng thái CTV</th>
                                <th>Thời gian cập nhật CTV</th>
                                <th>Người duyệt QA</th>
                                <th>Trạng thái QA</th>
                                <th>Thời gian cập nhật QA</th>
                                <th>Người duyệt Indexed</th>
                                <th>Trạng thái</th>
                                <th>Thời gian cập nhật</th>
                                <th>Tỉ lệ index thực tế</th>
                                <th>Tỉ lệ mong muốn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($project as $val) {
                                $check_ct = '';
                                $list_brand_project = explode(',', $val['list_brand']);
                                $ctv_work = explode(',', $val['ctv_work']);
                                $qa_check = explode(',', $val['qa_check']);
                                $time_qa_check_new = time_qa_check_new(['project_id' => $val['id'], 'status' => 1]);
                                $arr_time_urges = explode(',', $val['time_urges']);
                                if ($arr_time_urges != null && $this->input->get('tus') > 0 && $check_ct == "") {
                                    $check_ct = " cts_false ";
                                    foreach ($arr_time_urges as $val_1) {
                                        if ($val_1 > 0 && $val_1 > $this->input->get('tus')) {
                                            $check_ct = "";
                                            break;
                                        }
                                    }
                                }
                                if ($arr_time_urges != null && $this->input->get('tue') > 0 && $check_ct == "") {
                                    $check_ct = " cts_false ";
                                    foreach ($arr_time_urges as $val_1) {
                                        if ($val_1 > 0 && $val_1 < $this->input->get('tue')) {
                                            $check_ct = "";
                                            break;
                                        }
                                    }
                                }

                                $jobs = fn_get_list('job_type,num_job_type', ['project_id' => $val['id'], 'delete_status' => 0], 'jobs');
                            ?>
                                <tr class="<?= $check_ct ?>" data-id="<?= $val['id'] ?>">
                                    <td><input type="checkbox" class="check_i" name="check_i" value="<?= $val['id'] ?>">
                                    </td>
                                    <td><a href="/sua-du-an/<?= $val['id'] ?>"><img src="/images/edit.svg" alt="sửa"></a></td>
                                    <td> <?php if ($val['role_author'] == 6 && $jobs == null) { ?>
                                            <a href="/them-thong-tin-du-an/<?= $val['id'] ?>">
                                                <svg class="svg_edit" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 2C14.411 2 18 5.589 18 10C18 14.411 14.411 18 10 18C5.589 18 2 14.411 2 10C2 5.589 5.589 2 10 2ZM10 0C4.477 0 0 4.477 0 10C0 15.523 4.477 20 10 20C15.523 20 20 15.523 20 10C20 4.477 15.523 0 10 0ZM15 9H11V5H9V9H5V11H9V15H11V11H15V9Z" fill="#979797" />
                                                </svg>
                                            </a>
                                        <?php } else { ?>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 2C14.411 2 18 5.589 18 10C18 14.411 14.411 18 10 18C5.589 18 2 14.411 2 10C2 5.589 5.589 2 10 2ZM10 0C4.477 0 0 4.477 0 10C0 15.523 4.477 20 10 20C15.523 20 20 15.523 20 10C20 4.477 15.523 0 10 0ZM15 9H11V5H9V9H5V11H9V15H11V11H15V9Z" fill="#979797" />
                                            </svg>
                                        <?php } ?>
                                    </td>
                                    <td><?= project_id($val['id']) ?></td>
                                    <td><?= date('H:i:s d/m/Y', $val['created_at']) ?></td>
                                    <td><?= $val['name_author'] ?></td>
                                    <td><?php $this_cusommer =  fn_get_row('name,username', ['id' => $val['customer_id']], 'users');
                                        echo $this_cusommer['name'] ?></td>
                                    <td><?= number_format($val['revenue']) ?> đ</td>
                                    <td><?php $money = fn_get_row('SUM(money) as money_sum', ['project_id' => $val['id'], 'bank_status' => 1, 'delete_status' => 0], 'collect_money');
                                        echo number_format($money['money_sum']); ?></td>
                                    <td><?= (number_format($val['revenue'] - $money['money_sum']) > 0) ? number_format($val['revenue'] - $money['money_sum']) : 0 ?>
                                    </td>
                                    <td><?= debt_status($val['debt_status']) ?></td>
                                    <td class="date_hv">
                                        <?php if ($val['time_urges'] != '') {
                                            $arr_time_urges = explode(',', $val['time_urges']);
                                            echo '<p class="pdate" >' . date('H:i:s d/m/Y', $arr_time_urges[0]) . '</p>';
                                        } else {
                                            echo '<p class="pdate" style="color:#ccc;">--+--</p>';
                                        } ?>
                                        <div class="nav_pdate">
                                            <p class="title_pdate">Đã báo
                                                <?= ($val['time_urges'] != '') ? count($arr_time_urges) : 0 ?> lần</p>
                                            <?php if ($val['time_urges'] != '') {
                                                foreach ($arr_time_urges as $val2) { ?>
                                                    <p><?= date('H:i:s d/m/Y', $val2) ?></p>
                                            <?php }
                                            } ?>
                                        </div>
                                    </td>
                                    <td><?= status_project($val['status']) ?></td>
                                    <td><?php if ($val['time_start'] > 0) {
                                            echo date('H:i:s d/m/Y', $val['time_start']);
                                        } else { ?><p style="color:#ccc;">--+--</p><?php } ?></td>
                                    <td><?php if ($val['time_end'] > 0) {
                                            echo date('H:i:s d/m/Y', $val['time_end']);
                                        } else { ?><p style="color:#ccc;">--+--</p><?php } ?></td>
                                    <td><?php if ($val['time_cancel'] > 0) {
                                            echo date('H:i:s d/m/Y', $val['time_cancel']);
                                        } else { ?><p style="color:#ccc;">--+--</p><?php } ?></td>
                                    <td><?php if ($val['time_pause'] > 0) {
                                            echo date('H:i:s d/m/Y', $val['time_pause']);
                                        } else { ?><p style="color:#ccc;">--+--</p><?php } ?></td>
                                    <td><?= handover_status($val['handover_status']) ?></td>
                                    <td><a target="_blank" href="<?= $val['website'] ?>"><?= $val['website'] ?></a></td>
                                    <td><?= $val['name_project_type'] ?></td>
                                    <td class="td_break">
                                        <p class="text_break"><?php foreach ($list_brand_project as $key_brand => $val_brand) {
                                                                    $brand = fn_get_row('brand', ['id' => $val_brand], 'brands');
                                                                    echo (($key_brand > 0) ? ', ' : '') . $brand['brand'];
                                                                } ?></p>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td class="td_break">
                                        <p class="text_break"><?= nl2br($val['info']) ?></p>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td>
                                        <p class="pdate"><?= date('H:i:s d/m/Y', $val['deadline']) ?></p>
                                    </td>
                                    <td class="td_break">
                                        <div class="text_break">
                                            <?php foreach ($jobs as $val_job) {
                                                $job_type = fn_get_row('name', ['id' => $val_job['job_type']], 'job_type');
                                                echo '<p class="text-center">' . $job_type['name'] . ' (<span style="color:#47a0ff">' . $val_job['num_job_type'] . '</span>)</p>';
                                            } ?>
                                        </div>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td class="<?= ($val['ctv_job_count'] == 0 || $val['job_count'] == 0) ? 'chua_phan' : 'da_phan' ?>"><?= project_division($val['ctv_job_count'], $val['job_count']) ?></td>
                                    <td class="<?= ($val['job_count'] == 0) ? 'chua_phan_ctv' : (($val['num_ctv_job_success'] == $val['job_count']) ? 'hoan_thanh_ctv' : 'dang_trien_khai_ctv') ?>">
                                        <?= ctv_success($val['num_ctv_job_success'], $val['job_count']); ?>
                                    </td>
                                    <td><?= ($val['ctv_job_completion_time'] > 0) ? date('H:i:s d/m/Y', $val['ctv_job_completion_time']) : '<p style="color:#ccc;">--+--</p>' ?>
                                    </td>
                                    <td>
                                        <?php if ($qa_check != null) {
                                            foreach ($qa_check as $val2) {
                                                echo ($val2 > 0) ? '<p>' . get_name($val2) . '</p>' : '<p style="color:#ccc;">--+--</p>';
                                            }
                                        } else {
                                            echo '<p style="color:#ccc;">--+--</p>';
                                        }
                                        ?> </td>
                                    <td class="<?= ($val['job_ctv_num'] == 0) ? 'dang_qa' : (($val['job_qa'] == 0) ? 'khong_qa' : (($val['job_qa_success'] > $val['job_qa'] || $val['job_qa_success'] == $val['job_qa']) ? 'hoan_thanh_qa' : 'dang_qa')) ?>">
                                        <?php echo job_qa_success($val['job_ctv_num'], $val['job_qa_success'], $val['job_qa']); ?></td>
                                    <td><?php if ($val['ctv_job_id'] > 0 && $val['ctv_job_time_qa_check'] > 0) {
                                            echo date('H:i:s d/m/Y', $val['ctv_job_time_qa_check']);
                                        } else {
                                            echo '--+--';
                                        }  ?></td>
                                    <td><?php if ($val['status_index'] == 1 && $val['user_check_index'] > 0) {
                                            echo get_name($val['user_check_index']);
                                        } else {
                                            echo '<p style="color:#ccc;">--+--</p>';
                                        } ?></td>
                                    <td><?= project_status_index($val['check_index']) ?></td>
                                    <td><?php if ($val['check_index'] == 1) {
                                            echo date('H:i:s d/m/Y', $val['time_index']);
                                        } ?></td>
                                    <td>
                                        <div class="text_index">
                                            <?php if ($val['status_index'] == 1 && $val['data_index_real'] != '') {
                                                $data_index_real = json_decode($val['data_index_real']);
                                                foreach ($data_index_real as  $val_index) {
                                                    $this_index = fn_get_row('name', ['id' => $val_index->name], 'job_index');
                                            ?>
                                                    <p><?= $this_index['name'] ?>: <?= $val_index->number ?>%</p>
                                            <?php }
                                            } else {
                                                echo "--+--";
                                            } ?>
                                        </div>
                                    </td>
                                    <td class="edit_project data_index" data-name="data_index" data-id="<?= $val['id'] ?>">
                                        <div class="text_index">
                                            <?php if ($val['status_index'] == 1 && $val['data_index'] != '') {
                                                $data_index = json_decode($val['data_index']);
                                                if ($data_index != null) {
                                                    foreach ($data_index as  $val_index) {
                                                        $this_index = fn_get_row('name', ['id' => $val_index->name], 'job_index');
                                            ?>
                                                        <p><?= $this_index['name'] ?>: <?= $val_index->number ?>%</p>
                                            <?php }
                                                }
                                            } else {
                                                echo "--+--";
                                            } ?>
                                        </div>
                                    </td>
                                    <td><a target="_blank" href="<?= $val['file'] ?>"><?= $val['file'] ?></a></td>
                                    <td><?= number_format($val['job_price']) ?></td>
                                    <td class="td_break">
                                        <div class="text_break">
                                            <?php foreach ($ctv_work as $val_work) {
                                                echo '<p style="text-align:center">' . get_name($val_work) . '</p>';
                                            } ?></div>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td class="td_break">
                                        <p class="text_break"><?= nl2br($val['note_index']) ?></p>
                                        <button class="read-more">Xem thêm</button>
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