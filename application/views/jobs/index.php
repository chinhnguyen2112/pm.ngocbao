<div class="main_sidebar">
    <div class="main_top">
        <div class="add_project">
            <div class="img_add_project"><img src="/images/add_red.svg" alt="Thêm dự án"></div>
            <p>Đề xuất thêm dự án</p>
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
                            <a href="/cau-hinh-bo-loc/?id=6">
                                <p>Bộ lọc</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="show_filter" data-id="3">
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
                <p class="p_title_filter">Deadline dự án</p>
                <div class="list_inp_filter">
                    <input type="date" name="deadline_start" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('dls') > 0) ?  date('Y-m-d', $this->input->get('dls')) : '' ?>">
                    <span>đến</span>
                    <input type="date" name="deadline_end" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('dle') > 0) ? date('Y-m-d', $this->input->get('dle')) : '' ?>">
                </div>
            </div>
            <?php }
            if (!in_array(3, $list_filter)) { ?>
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
            if (!in_array(4, $list_filter)) { ?>
            <div class="this_filter">
                <p class="p_title_filter">Trạng thái công việc</p>
                <select name="status_index" onchange="filter_select(this)">
                    <option value="0">Chọn</option>
                    <?php foreach (array_project_status_index() as $val) { ?>
                        <option <?= ($this->input->get('st') == $val['status']) ? 'selected' : '' ?> value="<?= $val['status'] ?>"><?= $val['name'] ?></option>
                    <?php } ?>
                    <option <?= ($this->input->get('st') == 3) ? 'selected' : '' ?> value="3">Có thể check</option>
                    <option <?= ($this->input->get('st') == 4) ? 'selected' : '' ?> value="4">Chưa cần check</option>
                    <option <?= ($this->input->get('st') == 5) ? 'selected' : '' ?> value="5">Đã hủy</option>
                </select>
            </div>
            <?php }
            if (!in_array(5, $list_filter)) { ?>
            <div class="this_filter">
                <p class="p_title_filter">Thời gian cập nhật index</p>
                <div class="list_inp_filter">
                    <input type="date" name="time_index_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tis') > 0) ?  date('Y-m-d', $this->input->get('tis')) : '' ?>">
                    -
                    <input type="date" name="time_index_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tie') > 0) ? date('Y-m-d', $this->input->get('tie')) : '' ?>">
                </div>
            </div>
            <?php }
            if (!in_array(6, $list_filter)) { ?>
            <div class="this_filter">
                <p class="p_title_filter">Thời gian cập nhật tiếp theo</p>
                <div class="list_inp_filter">
                    <input type="date" name="time_next_s" onchange="filter_select(this)" placeholder="Thời gian bắt đầu" value="<?= ($this->input->get('tns') > 0) ?  date('Y-m-d', $this->input->get('tns')) : '' ?>">
                    -
                    <input type="date" name="time_next_e" onchange="filter_select(this)" placeholder="Thời gian kết thúc" value="<?= ($this->input->get('tne') > 0) ? date('Y-m-d', $this->input->get('tne')) : '' ?>">
                </div>
            </div>
            <?php }
            if (!in_array(7, $list_filter)) { ?>
            <div class="this_filter">
                <p class="p_title_filter">Người duyệt index</p>
                <select name="author" onchange="filter_select(this)" class="select2">
                    <option value="0">Người duyệt</option>
                    <?php foreach ($author as $val) {
                        if ($val['role'] == 3) { ?>
                            <option <?= ($this->input->get('au') == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                    <?php }
                    } ?>
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
                                    <div>Deadline dự án</div>
                                </th>
                                <th rowspan="2">
                                    <div>Website dự án</div>
                                </th>
                                <th rowspan="2">
                                    <div>File dự án</div>
                                </th>
                                <th rowspan="2">
                                    <div>Thông tin dự án</div>
                                <th colspan="3" class="th_col">Index</th>
                                </th>
                                <th rowspan="2">
                                    <div>Tỉ lệ index thực tế</div>
                                </th>
                                <th rowspan="2">
                                    <div>Tỉ lệ index mong muốn</div>
                                </th>
                                <th rowspan="2">
                                    <div>Người duyệt index</div>
                                </th>
                                <th rowspan="2">
                                    <div>Ghi chú</div>
                                </th>
                            </tr>
                            <tr>
                                <th>Trạng thái công việc</th>
                                <th>Thời gian cập nhật</th>
                                <th>Thời gian cập nhật tiếp theo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($project as $val) {  ?>
                                <tr>
                                    <td><input type="checkbox" class="check_i" name="check_i" id=""></td>
                                    <td><?php if ($val['check_index'] == 3 && $val['status'] != 3) { ?> <img style="cursor:pointer" class="img_edit" data-id="<?= $val['id'] ?>" src="/images/edit.svg" alt="sửa"><?php } ?></td>
                                    <td><?= project_id($val['id']) ?></td>
                                    <td><?= date('H:i:s d/m/Y', $val['deadline']) ?></td>
                                    <td><a target="_blank" href="<?= $val['website'] ?>"><?= $val['website'] ?></a></td>
                                    <td><a target="_blank" href="<?= $val['file'] ?>"><?= $val['file'] ?></a></td>
                                    <td><?= nl2br($val['info']) ?></td>
                                    <td><?php if ($val['status'] == 3) {
                                            echo 'Đã hủy';
                                        } else { ?>
                                            <p class="name_status" style="color:<?= ($val['check_index'] == 4) ? '#98614f' : (($val['check_index'] == 3) ? '#d95b2e' : '') ?>;"><?= project_status_index($val['check_index']) ?></p>
                                        <?php } ?>
                                    </td>
                                    <td><?= ($val['time_index'] != '') ? date('H:i:s d/m/Y', $val['time_index']) : '--+--' ?></td>
                                    <td><?= ($val['time_index_next'] > 0) ? date('H:i:s d/m/Y', $val['time_index_next']) : '--+--' ?></td>
                                    <td class="edit_project">
                                        <div class="list_date">
                                            <?php $data_index = json_decode($val['data_index']);
                                            $data_index_real = json_decode($val['data_index_real']);
                                            if ($data_index_real != '') {
                                                foreach ($data_index_real as  $val_index) { ?>
                                                    <div class="this_date" data-name="<?= $val_index->name ?>">
                                                        <p><?php echo get_job_index($val_index->name) ?>:</p>
                                                        <div class="this_add_project w_50" style="width: 50px !important">
                                                            <p class="num_text" onkeypress="return onlyNumberKey(event)"><?= $val_index->number ?>%</p>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else { ?>
                                                --+--
                                            <?php
                                            } ?>
                                        </div>
                                    </td>
                                    <td><?php
                                        if ($data_index != null) {
                                            foreach ($data_index as  $val_index) { ?>
                                                <p><?= get_job_index($val_index->name) ?>: <?= $val_index->number ?>%</p>
                                        <?php }
                                        } ?>
                                    </td>
                                    <td><?php if ($val['user_check_index'] != '') {
                                            $user_check_index = explode(',', $val['user_check_index']);
                                            foreach ($user_check_index as  $val_user) { ?>
                                                <p><?= get_name($val_user) ?></p>
                                        <?php }
                                        } else {
                                            echo "--+--";
                                        } ?>
                                    </td>
                                    <td class="td_break"> 
                                        <p class="text_break"><?= nl2br($val['note_index']) ?></p>
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
                <div class="this_add_project">
                    <p class="title_input">Trạng thái công việc <span>*</span></p>
                    <select name="status" id="status" >
                        <option selected value="0">Có thể check</option>
                        <option value="1">Hoàn thành</option>
                    </select>
                </div>
                <div class="this_add_project">
                    <p class="title_input">Thời gian cập nhật tiếp theo</p>
                    <input type="datetime-local" name="time_next" id="time_next">
                </div>
                <div class="this_add_project w_100">
                    <div class="list_index">
                        <div class="this_add_project w_50">
                            <p class="title_input">Tỉ lệ index thực tế <span>*</span></p>
                        </div>
                    </div>
                </div>
                <button class="btn_add_project">
                    <p>Sửa</p>
                </button>
            </div>
        </form>
    </div>
</div>