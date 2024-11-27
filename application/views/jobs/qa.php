<div class="main_sidebar">
    <div class="main_top">
        <div class="add_project">
            <a href="/qa-them-cong-viec/">
                <div class="img_add_project"><img src="/images/add_red.svg" alt="Thêm dự án"></div>
                <p>Thêm công việc</p>
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
                            <a href="/cau-hinh-bo-loc/?id=5">
                                <p>Bộ lọc</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="show_filter" data-id="4">
                    <p>Mở rộng</p> <img class="show_filter_img" src="/images/2_arrow.svg" alt="Thu gọn">
                </div>
            </div>
        </div>
        <div class="list_filter">
            <?php $list_filter = ($advanced_filter != null && $advanced_filter['list'] != null) ? explode(',', $advanced_filter['list']) : null; ?>
            <?php if (!in_array(1, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Mã công việc</p>
                    <select name="job" onchange="filter_select(this)" class="select2">
                        <option value="0">Chọn</option>
                        <?php foreach ($filter_job as $val) {  ?>
                            <option <?= ($this->input->get('id') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['code'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(2, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Website</p>
                    <select name="website" onchange="filter_select(this)" class="select2">
                        <option value="0">Website dự án</option>
                        <?php foreach ($website as $val) { ?>
                            <option <?= ($this->input->get('web') == $val['website']) ? 'selected' : '' ?> value="<?= $val['website'] ?>"><?= $val['website'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(3, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Loại công việc</p>
                    <select name="job_type" onchange="filter_select(this)" class="select2">
                        <option value="0">Loại công việc</option>
                        <?php foreach ($job_types as $val) {  ?>
                            <option <?= ($this->input->get('type') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(4, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Người tạo</p>
                    <select name="author" onchange="filter_select(this)" class="select2">
                        <option value="0">Người tạo</option>
                        <?php foreach ($author as $val) {
                            if ($val['role'] == 1 || $val['role'] == 2) { ?>
                                <option <?= ($this->input->get('au') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(5, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">CTV thực hiện</p>
                    <select name="ctv" onchange="filter_select(this)" class="select2">
                        <option value="0">CTV thực hiện</option>
                        <?php foreach ($ctv as $val) { ?>
                            <option <?= ($this->input->get('ctv') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(6, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Deadline CTV</p>
                    <div class="list_inp_filter">
                        <input type="date" name="deadline_start" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('dls') > 0) ?  date('Y-m-d', $this->input->get('dls')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="deadline_end" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('dle') > 0) ? date('Y-m-d', $this->input->get('dle')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(7, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian CTV gửi</p>
                    <div class="list_inp_filter">
                        <input type="date" name="ctv_end_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tes') > 0) ?  date('Y-m-d', $this->input->get('tes')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="ctv_end_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tee') > 0) ? date('Y-m-d', $this->input->get('tee')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(8, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Trạng thái công việc</p>
                    <select name="status_job" onchange="filter_select(this)">
                        <option value="0">Chọn</option>
                        <option <?= ($this->input->get('sj') == 1) ? 'selected' : '' ?> value="1">Hoàn thành</option>
                        <option <?= ($this->input->get('sj') == 2) ? 'selected' : '' ?> value="2">Đang triển khai</option>
                        <option <?= ($this->input->get('sj') == 3) ? 'selected' : '' ?> value="3">Kiểm duyệt lại</option>
                        <option <?= ($this->input->get('sj') == 4) ? 'selected' : '' ?> value="4">CTV chưa gửi bài</option>
                        <option <?= ($this->input->get('sj') == 5) ? 'selected' : '' ?> value="5">Đã hủy</option>
                    </select>
                </div>
            <?php }
            if (!in_array(9, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian cập nhật</p>
                    <div class="list_inp_filter">
                        <input type="date" name="time_check_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tcs') > 0) ?  date('Y-m-d', $this->input->get('tcs')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="time_check_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tce') > 0) ? date('Y-m-d', $this->input->get('tce')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(10, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Trạng thái xác nhận</p>
                    <select name="check_replly" onchange="filter_select(this)">
                        <option value="0">Chọn</option>
                        <option <?= ($this->input->get('cr') == 4) ? 'selected' : '' ?> value="4">Xác nhận duyệt</option>
                        <option <?= ($this->input->get('cr') == 1) ? 'selected' : '' ?> value="1">Đang review</option>
                        <?php foreach (array_ctv_check_status_qa() as $val) { ?>
                            <option <?= ($this->input->get('cr') == $val['status']) ? 'selected' : '' ?> value="<?= $val['status'] ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(11, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Trạng thái index</p>
                    <select name="status_index" onchange="filter_select(this)">
                        <option value="0">Chọn</option>
                        <option <?= ($this->input->get('sin') == 1) ? 'selected' : '' ?> value="1">Đã chuyển index</option>
                        <option <?= ($this->input->get('sin') == 2) ? 'selected' : '' ?> value="2">Có duyệt index</option>
                        <option <?= ($this->input->get('sin') == 3) ? 'selected' : '' ?> value="3">Không duyệt index</option>
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
                <!-- <div class="title_filter_left">
                    <img src="/images/folder.png" alt="Dự án">
                    <p>MADUAN</p>
                </div> -->
                <div class="box_btn_project" style="display: none;">
                    <p class="btn_project" onclick="$('.popup').show()">Đề xuất hủy</p>
                    <p class="btn_project btn_project_cancel">Hủy</p>
                </div>
                <!-- <img class="show_project" src="/images/add.png" alt="show" onclick="show_project(this,0)"> -->
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
                                    <div>Loại công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thông tin công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Website</div>
                                </th>
                                <th rowspan="2">
                                    <div>Người tạo</div>
                                </th>
                                <th rowspan="2">
                                    <div>CTV thực hiện</div>
                                </th>
                                <th rowspan="2">
                                    <div>Deadline CTV</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thời gian CTV gửi</div>
                                </th>
                                <th rowspan="2">
                                    <div>File công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>File QA check</div>
                                </th>
                                <th colspan="2" class="th_col">Đánh giá công việc</th>
                                <th rowspan="2">
                                    <div>Phạt</div>
                                </th>
                                <th rowspan="2">
                                    <div>Trạng thái công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thời gian cập nhật</div>
                                </th>
                                <th rowspan="2">
                                    <div>Trạng thái xác nhận</div>
                                </th>
                                <th rowspan="2">
                                    <div>Index</div>
                                </th>
                            </tr>
                            <tr>
                                <th>Deadline</th>
                                <th>Chất lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jobs as $val) {
                                $job_type = fn_get_row('name', ['id' => $val['job_type']], 'job_type');
                            ?>
                                <tr>
                                    <td><input type="checkbox" class="check_i" name="check_i" id=""></td>
                                    <td>
                                        <div class="fl">
                                            <?php if ($val['status'] != 3 && $val['ctv_job_status_qa_check'] != 0 && $val['ctv_job_check_replly'] != 2) { ?> <img title="Chỉnh sửa" style="cursor:pointer" class="img_edit" data-id="<?= $val['id'] ?>" src="/images/edit.svg" alt="sửa">
                                            <?php }
                                            if ($val['del_project'] == 0 && $val['status_project'] != 1 && $val['status_index'] == 1 && $val['check_index'] != 1 && $val['check_index'] != 3) { ?>
                                                <svg data-id="<?= $val['project_id'] ?>" class="next_index" title="Chuyển sang index" height="35px" width="35px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-6.78 -6.78 39.64 39.64" xml:space="preserve" fill="#ff0000" stroke="#ff0000" stroke-width="0.00026077">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.31292400000000004"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <g>
                                                            <g id="c103_arrow">
                                                                <path style="fill:#ff0000;" d="M25.709,13.552l-9.721,9.994c0,0-1.151,1.219-1.151-0.105c0-1.325,0-4.532,0-4.532 s-0.781,0-1.976,0c-3.42,0-9.642,0-12.173,0c0,0-0.688,0.184-0.688-0.861c0.001-1.047,0.001-9.533,0.001-10.279 S0.576,7.04,0.576,7.04c2.463,0,8.895,0,12.199,0c1.072,0,1.771,0,1.771,0s0-2.569,0-4.186c0-1.61,1.208-0.395,1.208-0.395 s9.081,8.791,10.033,9.744C26.482,12.894,25.709,13.552,25.709,13.552z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td><?= $val['code'] ?></td>
                                    <td><?= $job_type['name'] ?> (<span style="color:#47a0ff"><?= $val['num_job_type'] ?></span>)</td>
                                    <td class="td_break">
                                        <p class="text_break"><?= nl2br($val['info']) ?></p>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td><a target="_blank" href="<?= $val['website'] ?>"><?= $val['website'] ?></a></td>
                                    <td><?= $val['name_author'] ?> - <?= role($val['author_role']) ?></td>
                                    <td><?= ($val['ctv_job_id'] > 0) ? get_name($val['ctv_job_ctv']) : '--+--' ?></td>
                                    <td><?= ($val['ctv_job_id'] > 0 && $val['ctv_job_deadline'] > 0) ? date('H:i:s d/m/Y', $val['ctv_job_deadline']) : '--+--' ?></td>
                                    <td><?php echo ($val['ctv_job_id'] > 0) ? date('H:i:s d/m/Y', $val['ctv_job_completion_time']) : '<p style="color:#ccc;">--+--</p>'; ?></td>
                                    <td><a target="_blank" href="<?= $val['file_job'] ?>"><?= $val['file_job'] ?></a></td>
                                    <td><a target="_blank" href="<?= ($val['ctv_job_id'] > 0) ? $val['ctv_job_file_qa_check'] : '' ?>"><?= ($val['ctv_job_id'] > 0) ? $val['ctv_job_file_qa_check'] : '' ?></a></td>
                                    <td><?php echo ($val['ctv_job_id'] > 0) ? excess_time($val['ctv_job_deadline'], $val['ctv_job_completion_time']) : 'Chậm 0 ngày'; ?></td>

                                    <td class="td_break">
                                        <p class="text_break"><?php echo ($val['ctv_job_id'] > 0) ? nl2br($val['ctv_job_content_qa_check']) : '<p style="color:#ccc;">--+--</p>'; ?></p>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td><?= number_format($val['punish']); ?> đ</td>
                                    <td>
                                        <?php if ($val['status'] == 3) {
                                            echo "Đã hủy";
                                        } else {
                                            echo ($val['ctv_job_id'] > 0) ? status_qa_check($val['ctv_job_status_qa_check']) : '<p style="color:#ccc;">--Trạng thái công việc--</p>';
                                        } ?>
                                    </td>
                                    <td><?php echo ($val['ctv_job_id'] > 0) ? date('H:i:s d/m/Y', $val['ctv_job_time_qa_check']) : '<p style="color:#ccc;">--+--</p>'; ?></td>
                                    <td><?php echo ($val['ctv_job_id'] > 0) ? ctv_check_status_qa($val['ctv_job_check_replly']) : '<p style="color:#ccc;">--+--</p>'; ?></td>
                                    <td>
                                        <?php if ($val['status_index'] == 1 && $val['check_index'] > 0 && $val['check_index'] < 4) {
                                            echo "Đã chuyển index";
                                        } elseif ($val['status_index'] == 0) {
                                            echo "Không duyệt index";
                                        } elseif ($val['status_index'] == 1) {
                                            echo 'Có duyệt index';
                                        } ?>
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
            <p>Chỉnh sửa</p>
            <svg onclick="$('.popup_add_project').hide();" xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                <rect y="16.25" width="22.2738" height="3.18197" rx="1.59099" transform="rotate(-45 0 16.25)" fill="white" />
                <rect x="15.75" y="18.5" width="22.2738" height="3.18197" rx="1.59098" transform="rotate(-135 15.75 18.5)" fill="white" />
            </svg>
        </div>
        <form id="form_add">
            <input type="text" name="id" value="0" hidden>
            <div class="main_add_project">
                <div class="main_add_project main_add_project_2">
                    <div class="this_add_project">
                        <p class="title_input">File QA check <span>*</span></p>
                        <input type="url" name="file_qa_check" placeholder="File QA check" require>
                        <p class="error" style="display: none;">Không được để trống</p>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Phạt </p>
                        <input type="text" class="input_num" placeholder="Phạt" name="punish">
                    </div>
                    <div class="this_add_project">
                        <p class="title_input">Trạng thái công việc <span>*</span></p>
                        <select name="status" id="status">
                            <option value="0">Đang triển khai</option>
                            <option value="1">Hoàn thành</option>
                        </select>
                    </div>
                    <!-- <div class="this_add_project">
                        <p class="title_input">Index</p>
                        <select name="index" id="index">
                            <option selected value="0">Chọn</option>
                            <option value="1">Chuyển qua index</option>
                        </select>
                    </div> -->
                    <div class="this_add_project w_100">
                        <p class="title_input">Đánh giá chất lượng</p>
                        <textarea style="height: 120px;" name="content_qa_check"></textarea>
                    </div>
                </div>
                <button class="btn_add_project">
                    <p>Sửa</p>
                </button>
            </div>
        </form>
    </div>
</div>