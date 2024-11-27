<div class="main_sidebar">
    <div class="main_top">
        <div class="add_project">
            <div class="img_add_project"><img src="/images/add_red.svg" alt="Thêm dự án"></div>
            <p>Đề xuất thêm dự án</p>
        </div>
        <div class="right_top">
            <div class="money">
                <p><?= number_format($_SESSION['user']['money']) ?> đ</p>
            </div>
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
                            <a href="/cau-hinh-bo-loc/?id=4">
                                <p>Bộ lọc</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="show_filter" data-id="2">
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
                        <?php foreach ($job_type as $val) {  ?>
                            <option <?= ($this->input->get('type') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }
            if (!in_array(4, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian nhận việc</p>
                    <div class="list_inp_filter">
                        <input type="date" name="created_at_start" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('cs') > 0) ?  date('Y-m-d', $this->input->get('cs')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="created_at_end" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('ce') > 0) ? date('Y-m-d', $this->input->get('ce')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(5, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Deadline CTV</p>
                    <div class="list_inp_filter">
                        <input type="date" name="deadline_start" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('dls') > 0) ?  date('Y-m-d', $this->input->get('dls')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="deadline_end" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('dle') > 0) ? date('Y-m-d', $this->input->get('dle')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(6, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian hoàn thành</p>
                    <div class="list_inp_filter">
                        <input type="date" name="ctv_end_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tes') > 0) ?  date('Y-m-d', $this->input->get('tes')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="ctv_end_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tee') > 0) ? date('Y-m-d', $this->input->get('tee')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(7, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Trạng thái công việc</p>
                    <select name="status_ctv" onchange="filter_select(this)">
                        <option value="0">Chọn</option>
                        <option <?= ($this->input->get('sctv') == 1) ? 'selected' : '' ?> value="1">Hoàn thành</option>
                        <option <?= ($this->input->get('sctv') == 3) ? 'selected' : '' ?> value="3">Đã hủy</option>
                        <option <?= ($this->input->get('sctv') == 4) ? 'selected' : '' ?> value="4">Đang triển khai</option>
                    </select>
                </div>
            <?php }
            if (!in_array(8, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Trạng thái duyệt QA</p>
                    <select name="qa_check" onchange="filter_select(this)">
                        <option value="0">Chọn</option>
                        <option <?= ($this->input->get('sqa') == 1) ? 'selected' : '' ?> value="1">CTV chưa gửi bài</option>
                        <?php foreach (array_status_qa_check() as $val) { ?>
                            <option <?= ($this->input->get('sqa') == $val['status'] + 1) ? 'selected' : '' ?> value="<?= $val['status'] + 1 ?>"><?= $val['name'] ?></option>
                        <?php } ?>
                        <option <?= ($this->input->get('sqa') == 3) ? 'selected' : '' ?> value="3">Đang triển khai</option>
                        <option <?= ($this->input->get('sqa') == 4) ? 'selected' : '' ?> value="4">Kiểm duyệt lại</option>
                    </select>
                </div>
            <?php }
            if (!in_array(9, $list_filter)) { ?>
                <div class="this_filter">
                    <p class="p_title_filter">Thời gian duyệt</p>
                    <div class="list_inp_filter">
                        <input type="date" name="time_check_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tcs') > 0) ?  date('Y-m-d', $this->input->get('tcs')) : '' ?>">
                        <span>đến</span>
                        <input type="date" name="time_check_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tce') > 0) ? date('Y-m-d', $this->input->get('tce')) : '' ?>">
                    </div>
                </div>
            <?php }
            if (!in_array(10, $list_filter)) { ?>
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
                                <th rowspan="3">
                                    <div><input type="checkbox" class="check_full" name="check_full" id=""></div>
                                </th>
                                <th rowspan="3">
                                    <div>Mã công việc</div>
                                </th>
                                <th rowspan="3">
                                    <div>Website</div>
                                </th>
                                <th rowspan="3">
                                    <div>Loại công việc</div>
                                </th>
                                <th rowspan="3">
                                    <div>Thông tin công việc</div>
                                </th>
                                <th rowspan="3">
                                    <div>File công việc</div>
                                </th>
                                <th rowspan="3">
                                    <div>Thời gian nhận việc</div>
                                </th>
                                <th rowspan="3">
                                    <div>Deadline CTV</div>
                                </th>
                                <th rowspan="3">
                                    <div>Thời gian hoàn thành</div>
                                </th>
                                <th rowspan="3">
                                    <div>Lương nhận</div>
                                </th>
                                <th rowspan="3">
                                    <div>Phạt(i)</div>
                                </th>
                                <th rowspan="3">
                                    <div>Lương thực nhận</div>
                                </th>
                                <th rowspan="3" class="th_col">
                                    <div>Trạng thái công việc</div>
                                </th>
                                <th colspan="5" class="th_col">QA duyệt</th>
                                <th rowspan="3">
                                    <div>Xác nhận duyệt</div>
                                </th>
                                <th rowspan="3">
                                    <div>Ghi chú công việc</div>
                                </th>
                            </tr>
                            <tr>
                                <th rowspan="2">
                                    <div>Trạng thái duyệt QA</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thời gian duyệt</div>
                                </th>
                                <th colspan="3" class="th_col">Đánh giá công việc</th>
                            </tr>
                            <tr>
                                <th>Deadline</th>
                                <th>Chất lượng</th>
                                <th>File QA duyệt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ctv_jobs as $val) {  ?>
                                <tr>
                                    <td><input type="checkbox" class="check_i" name="check_i" id=""></td>
                                    <td><?= $val['code'] ?></td>
                                    <td><a target="_blank" href="<?= $val['website'] ?>"><?= $val['website'] ?></a></td>
                                    <td><?php $job_type = fn_get_row('name', ['id' => $val['job_type']], 'job_type');
                                        echo $job_type['name']; ?>  (<span style="color:#47a0ff"><?= $val['num_job_type'] ?></span>)</td>
                                    <td class="td_break">
                                        <p class="text_break"><?= nl2br($val['job_info']) ?></p>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td><a target="_blank" href="<?= $val['file_job'] ?>"><?= $val['file_job'] ?></a></td>
                                    <td><?= date('H:i:s d/m/Y', $val['created_at']) ?></td>
                                    <td><?= date('H:i:s d/m/Y', $val['deadline']) ?></td>
                                    <td><?= date('H:i:s d/m/Y', $val['completion_time']) ?></td>
                                    <td><?= number_format($val['price']) ?></td>
                                    <td><?= number_format($val['punish']) ?></td>
                                    <td><?= number_format($val['price'] - $val['punish']) ?></td>
                                    <td>
                                        <div class="status_project" data-id="<?= $val['status'] ?>" data-job_id="<?= $val['id'] ?>">
                                            <p class="name_status"><?= status_ctv_job($val['status'])  ?></p>

                                            <?php if ($val['status'] == 0) { ?>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="path-1-inside-1_1_1465" fill="white">
                                                        <path d="M0.186279 6L5.84314 0.343141L11.5 6L5.84314 11.6569L0.186279 6Z" />
                                                    </mask>
                                                    <path d="M11.5 6L12.9142 7.41421L14.3284 6L12.9142 4.58579L11.5 6ZM4.42892 1.75735L10.0858 7.41421L12.9142 4.58579L7.25735 -1.07107L4.42892 1.75735ZM10.0858 4.58579L4.42892 10.2426L7.25735 13.0711L12.9142 7.41421L10.0858 4.58579Z" fill="black" fill-opacity="0.54" mask="url(#path-1-inside-1_1_1465)" />
                                                </svg>
                                            <?php } ?>
                                        </div>
                                        <?php if ($val['status'] == 0) { ?>
                                            <div class="arr_status">
                                                <div class="main_status">
                                                    <p class="check_status" data-name="status" data-id="1">Hoàn thành</p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td><?= status_qa_check($val['status_qa_check']); ?></td>
                                    <td><?= ($val['status_qa_check'] > 0 && $val['time_qa_check'] > 0) ? date('H:i:s d/m/Y', $val['time_qa_check']) : '--Thời gian--'  ?></td>
                                    <td><?= excess_time($val['deadline'], $val['completion_time']); ?></td>
                                    <td class="td_break">
                                        <p class="text_break"><?= ($val['content_qa_check'] != '') ? $val['content_qa_check'] : '' ?></p>
                                        <button class="read-more">Xem thêm</button>
                                    </td>
                                    <td><a target="_blank" href="<?= $val['file_qa_check'] ?>"><?= $val['file_qa_check'] ?></a></td>
                                    <td>
                                        <?php if ($val['check_replly'] == 1) { ?>
                                            <div class="status_project" data-id="<?= $val['check_replly'] ?>" data-job_id="<?= $val['id'] ?>">
                                                <p class="name_status"> <?= ctv_check_status_qa($val['check_replly']); ?></p>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="path-1-inside-1_1_1465" fill="white">
                                                        <path d="M0.186279 6L5.84314 0.343141L11.5 6L5.84314 11.6569L0.186279 6Z" />
                                                    </mask>
                                                    <path d="M11.5 6L12.9142 7.41421L14.3284 6L12.9142 4.58579L11.5 6ZM4.42892 1.75735L10.0858 7.41421L12.9142 4.58579L7.25735 -1.07107L4.42892 1.75735ZM10.0858 4.58579L4.42892 10.2426L7.25735 13.0711L12.9142 7.41421L10.0858 4.58579Z" fill="black" fill-opacity="0.54" mask="url(#path-1-inside-1_1_1465)" />
                                                </svg>
                                            </div>
                                            <div class="arr_status">
                                                <div class="main_status">
                                                    <?php foreach (array_ctv_check_status_qa() as  $val_ar) { ?>
                                                        <p class="check_replly" data-name="status" data-id="<?= $val_ar['status'] ?>"><?= $val_ar['name'] ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } elseif ($val['check_replly'] == 0 && $val['status_qa_check'] == 2) {
                                            echo 'Đang review';
                                        } else {
                                            echo ctv_check_status_qa($val['check_replly']);
                                        } ?>
                                    </td>
                                    <td class="td_break">
                                        <p class="text_break"><?= nl2br($val['note_ctv']) ?></p>
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
<div class="popup">
    <div class="body_popup">
        <div class="main_popup">
            <p class="title_popup">Lý do từ chối <span style="color: red;">*</span></p>
            <textarea name="" id="" style="height: 150px;"></textarea>
            <div class="btn_popup">
                <p onclick="$('.popup').hide();"><img src="/images/x.svg" alt="Đóng"> Đóng</p>
                <p class="save_popup"><img src="/images/v.svg" alt="Lưu"> Lưu</p>
            </div>
        </div>
    </div>
</div>