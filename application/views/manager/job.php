<div class="main_sidebar">
    <div class="main_top">
        <div class="add_project">
            <a href="/them-cong-viec/">
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
                            <a href="/cau-hinh-bo-loc/?id=2">
                                <p>Bộ lọc</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="show_filter" data-id="6">
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
                    <p class="p_title_filter">Hạng mục</p>
                    <select name="job_type" onchange="filter_select(this)" class="select2">
                        <option value="0">Hạng mục</option>
                        <?php foreach ($job_type as $val) {  ?>
                            <option <?= ($this->input->get('type') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(3, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Loại công việc</p>
                    <select name="num_job_type" onchange="filter_select(this)" class="select2">
                        <option value="0">Loại công việc</option>
                        <?php foreach ($num_job_type as $val) {  ?>
                            <option <?= ($this->input->get('type_num') == $val['id'].'_'.$val['num_job_type']) ? 'selected' : '' ?> value="<?= $val['id'].'_'.$val['num_job_type'] ?>"><?= $val['name'].'('.$val['num_job_type'].')' ?></option>
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
                    <p class="p_title_filter">Thời gian tạo</p>
                    <div class="list_inp_filter">
                        <input type="date" name="created_at_start" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('cs') > 0) ?  date('Y-m-d', $this->input->get('cs')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="created_at_end" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('ce') > 0) ? date('Y-m-d', $this->input->get('ce')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(6, $list_filter)) { ?>
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
            if (!in_array(7, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">CTV thực hiện</p>
                    <select name="ctv" onchange="filter_select(this)" class="select2">
                        <option value="0">CTV thực hiện</option>
                        <option value="-1" <?= ($this->input->get('ctv') == -1) ? 'selected' : '' ?>>Chưa giao việc</option>
                        <?php foreach ($list_ctv as $val) {
                            if ($val['role'] == 5) { ?>
                                <option <?= ($this->input->get('ctv') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(8, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Deadline CTV</p>
                    <div class="list_inp_filter">
                        <input type="date" name="deadline_start" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('dls') > 0) ?  date('Y-m-d', $this->input->get('dls')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="deadline_end" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('dle') > 0) ? date('Y-m-d', $this->input->get('dle')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(9, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Tiến độ CTV</p>
                    <select name="status_ctv" onchange="filter_select(this)">
                        <option value="0">Chọn</option>
                        <option <?= ($this->input->get('sctv') == -1) ? 'selected' : '' ?> value="-1">Chưa cập nhật</option>
                        <option <?= ($this->input->get('sctv') == 1) ? 'selected' : '' ?> value="1">Hoàn thành</option>
                        <option <?= ($this->input->get('sctv') == 3) ? 'selected' : '' ?> value="3">Đã hủy</option>
                        <option <?= ($this->input->get('sctv') == 4) ? 'selected' : '' ?> value="4">Đang triển khai</option>
                    </select>
                </div>
            <?php }
            if (!in_array(10, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian triển khai</p>
                    <div class="list_inp_filter">
                        <input type="date" name="time_start_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tss') > 0) ?  date('Y-m-d', $this->input->get('tss')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="time_start_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tse') > 0) ? date('Y-m-d', $this->input->get('tse')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(11, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian hoàn thành</p>
                    <div class="list_inp_filter">
                        <input type="date" name="ctv_end_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tes') > 0) ?  date('Y-m-d', $this->input->get('tes')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="ctv_end_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tee') > 0) ? date('Y-m-d', $this->input->get('tee')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(12, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Xác nhận duyệt</p>
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
            if (!in_array(13, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">QA thực hiện</p>
                    <select name="qa" onchange="filter_select(this)" class="select2">
                        <option value="0">QA thực hiện</option>
                        <?php foreach ($qa_check as $val) { ?>
                            <option <?= ($this->input->get('qa') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(14, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Tiến độ QA</p>
                    <select name="qa_check" onchange="filter_select(this)">
                        <option value="0">Chọn</option>
                        <option <?= ($this->input->get('sqa') == 1) ? 'selected' : '' ?> value="1">CTV chưa gửi bài</option>
                        <?php foreach (array_status_qa_check() as $val) { ?>
                            <option <?= ($this->input->get('sqa') == $val['status'] + 1) ? 'selected' : '' ?> value="<?= $val['status'] + 1 ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                        <option <?= ($this->input->get('sqa') == 3) ? 'selected' : '' ?> value="3">Đang triển khai</option>
                        <option <?= ($this->input->get('sqa') == 4) ? 'selected' : '' ?> value="4">Kiểm duyệt lại</option>
                        <option <?= ($this->input->get('sqa') == 5) ? 'selected' : '' ?> value="5">Không cần QA check</option>
                    </select>
                </div>
            <?php }
            if (!in_array(15, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian duyệt</p>
                    <div class="list_inp_filter">
                        <input type="date" name="time_check_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tcs') > 0) ?  date('Y-m-d', $this->input->get('tcs')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="time_check_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tce') > 0) ? date('Y-m-d', $this->input->get('tce')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(16, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Tiến độ công việc chung</p>
                    <select name="status_job" onchange="filter_select(this)">
                        <option value="0">Chọn</option>
                        <option <?= ($this->input->get('sj') == 1) ? 'selected' : '' ?> value="1">Hoàn thành</option>
                        <option <?= ($this->input->get('sj') == 2) ? 'selected' : '' ?> value="2">Đang triển khai</option>
                        <option <?= ($this->input->get('sj') == 3) ? 'selected' : '' ?> value="3">Đã hủy</option>
                    </select>
                </div>
            <?php }
            if (!in_array(17, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian hoàn thành</p>
                    <div class="list_inp_filter">
                        <input type="date" name="job_end_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('js') > 0) ?  date('Y-m-d', $this->input->get('js')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="job_end_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('je') > 0) ? date('Y-m-d', $this->input->get('je')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(18, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Mức độ ưu tiên</p>
                    <div class="list_inp_filter">
                        <input type="text" class="inp_num" name="z_index_s" onchange="filter_select(this)" placeholder="Mức ưu tiên" value="<?= ($this->input->get('zs') > 0) ?  $this->input->get('zs') : '' ?>">
                        <span>đến</span>
                        <input type="text" class="inp_num" name="z_index_e" onchange="filter_select(this)" placeholder="Mức ưu tiên" value="<?= ($this->input->get('ze') > 0) ? $this->input->get('ze') : '' ?>">
                    </div>
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
                                    <div>Mã công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thông tin công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Loại công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Người tạo</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thời gian tạo</div>
                                </th>
                                <th rowspan="2">
                                    <div>Website</div>
                                </th>
                                <th rowspan="2">
                                    <div>File công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Chi phí công việc</div>
                                </th>
                                <th rowspan="2">
                                    <div>Phạt</div>
                                </th>
                                <th rowspan="2">
                                    <div>Chi phí cuối</div>
                                </th>
                                <th colspan="6" class="th_col">CTV</th>
                                <th colspan="5" class="th_col">QA</th>
                                <th rowspan="2">
                                    <div>Tiến độ công việc chung</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thời gian hoàn thành</div>
                                </th>
                                <th rowspan="2">
                                    <div>Mức độ ưu tiên</div>
                                </th>
                                <th rowspan="2">
                                    <div>Ghi chú QA</div>
                                </th>
                                <th rowspan="2">
                                    <div>Ghi chú cho CTV</div>
                                </th>
                                <th rowspan="2">
                                    <div>Ghi chú</div>
                                </th>
                            </tr>
                            <tr>
                                <th>CTV thực hiện</th>
                                <th>Deadline CTV</th>
                                <th>Tiến độ CTV</th>
                                <th>Thời gian triển khai</th>
                                <th>Thời gian hoàn thành</th>
                                <th>Xác nhận duyệt</th>
                                <th>QA thực hiện</th>
                                <th>Tiến độ QA</th>
                                <th>Thời gian duyệt</th>
                                <th>Đánh giá deadline</th>
                                <th>Đánh giá chất lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jobs as $val) {
                                if ($val['ctv'] !== null) {
                                    $val['qa_name'] = ($val['qa_id'] > 0) ? get_name($val['qa_id']) : '--QA thực hiện--';
                                    $val['content_qa_check'] = (!empty($val['content_qa_check'])) ? $val['content_qa_check'] : '--+--';
                                } else {
                                    $val['ctv'] = 0;
                                    $val['qa_id'] = 0;
                                    $val['qa_name'] = '--QA thực hiện--';
                                    $val['status_qa_check'] = 0;
                                    $val['time_qa_check'] = 0;
                                    $val['content_qa_check'] = '--Đánh giá--';
                                    $val['deadline_ctv'] = 0;
                                    $val['ctv_check_replly'] = 0;
                                    $val['status_ctv'] = -1;
                                    $val['time_ctv_job'] = 0;
                                    $val['completion_ctv_job'] = 0;
                                }
                            ?>
                                <tr>
                                    <td><input type="checkbox" class="check_i" name="check_i" value="<?= $val['id'] ?>"></td>
                                    <td><?php if ($val['status'] != 3) { ?><a href="/sua-cong-viec/<?= $val['id'] ?>"><img src="/images/edit.svg" alt="sửa"></a><?php } ?></td>
                                    <td><?= $val['code'] ?></td>
                                    <td class="td_break">
                                        <p class="text_break"><?= nl2br($val['info']) ?></p>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td><?= $val['name_job_type'] ?> (<span style="color:#47a0ff"><?= $val['num_job_type'] ?></span>)</td>
                                    <td>
                                        <p class="color<?= $val['delete_user'] - 1 ?>"></p><?= $val['name_author'] ?> - <?= role($val['role_author']) ?>
                                    </td>
                                    <td><?= date('H:i:s d/m/Y', $val['created_at']) ?></td>
                                    <td><a target="_blank" href="<?= $val['website'] ?>"><?= $val['website'] ?></a></td>
                                    <td><a target="_blank" href="<?= $val['file_job'] ?>"><?= $val['file_job'] ?></a></td>
                                    <td><?= number_format($val['price']) ?></td>
                                    <td><?= number_format($val['punish']) ?></td>
                                    <td><?= number_format($val['price'] - $val['punish']) ?></td>
                                    <td><?= ($val['ctv'] > 0) ? get_name($val['ctv']) : 'Chưa giao việc' ?></td>
                                    <td><?= ($val['deadline_ctv'] > 0) ? date('H:i:s d/m/Y', $val['deadline_ctv']) : '--+--' ?></p>
                                    </td>
                                    <td><?= status_ctv_job($val['status_ctv']) ?></td>
                                    <td><?php if ($val['time_ctv_job'] > 0) {
                                            echo date('H:i:s d/m/Y', $val['time_ctv_job']);
                                        } else { ?>Chưa cập nhật<?php } ?></td>
                                    <td><?php if ($val['completion_ctv_job'] > 0) {
                                            echo date('H:i:s d/m/Y', $val['completion_ctv_job']);
                                        } else { ?>Chưa cập nhật<?php } ?></td>
                                    <td>
                                        <p class="color<?= $val['ctv_check_replly'] ?>"><?= ctv_check_status_qa($val['ctv_check_replly']); ?></p>
                                    </td>
                                    <td><?= $val['qa_name'] ?></td>
                                    <td><?= ($val['status_qa'] == 1) ? status_qa_check($val['status_qa_check']) : "Không cần QA check"; ?></td>
                                    <td><?= ($val['status_qa'] == 1 && $val['time_qa_check'] > 0) ? date('H:i:s d/m/Y', $val['time_qa_check']) : "--+--"; ?></td>
                                    <td>
                                        <?php
                                        $ctv_jobs = fn_get_row('deadline,completion_time', ['job_id' => $val['id']], 'ctv_jobs');
                                        echo ($ctv_jobs != null) ? excess_time($ctv_jobs['deadline'], $ctv_jobs['completion_time']) : 'Chậm 0 ngày'; ?></td>
                                    <td class="td_break">
                                        <p class="text_break"><?= ($val['status_qa'] == 1) ? nl2br($val['content_qa_check']) : "--+--"; ?></p>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td><?= status_job($val['status']); ?></td>
                                    <td><?= ($val['completion_time'] > 0) ? date('H:i:s d/m/Y', $val['completion_time']) : '--+--' ?></td>
                                    <td><?= $val['z_index'] ?></td>
                                    <td class="td_break">
                                        <p class="text_break"><?= nl2br($val['note_qa']) ?></p>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td class="td_break">
                                        <p class="text_break"><?= nl2br($val['note_ctv']) ?></p>
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