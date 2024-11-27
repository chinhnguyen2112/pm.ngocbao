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
                <p class="title_page">Chỉnh sửa công việc</p>
                <a class="back_site" href="/quan-ly-cong-viec/">
                    <img src="/images/back.svg" alt="Thêm dự án">
                    <p>Quay lại</p>
                </a>
                <input type="text" name="id" value="<?= $job['id'] ?>" hidden>
                <div class="main_add_project">
                    <div class="this_add_project w_50">
                        <p class="title_input">Mức ưu tiên <span>*</span></p>
                        <input type="text" class="input_num" placeholder="Phạt" name="z_index" value="<?= $job['z_index'] ?>" <?= ($job['status'] == 1) ? 'readonly' : '' ?>>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">File công việc </p>
                        <input type="url" placeholder="Nhập file công việc" name="file" value="<?= $job['file_job'] ?>" <?=(($ctv_job != null && $ctv_job['status']== 1) ? 'readonly' : '')?>>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Chi phí công việc <span>*</span></p>
                        <input type="text" class="input_num" placeholder="Nhập chi phí" id="price" name="price" value="<?= $job['price'] ?>" <?= ($job['status'] == 1) ? 'readonly' : '' ?>>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Phạt </p>
                        <input type="text" class="input_num" placeholder="Phạt" name="punish" value="<?= $job['punish'] ?>" <?= ($job['status'] == 1) ? 'readonly' : '' ?>>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Cộng tác viên thực hiện</p>
                        <?php if ($job['status'] == 1 || ($ctv_job != null && $ctv_job['ctv'] > 0 && $ctv_job['status'] == 1)) { ?>
                            <input type="text" placeholder="ctv" name="ctv" value="<?= get_name($ctv_job['ctv'])  ?>" readonly>
                        <?php } else { ?>
                            <select name="ctv" id="ctv" class="select2">
                                <option value="0">Chọn</option>
                                <?php foreach ($ctv as $val) { ?>
                                    <option <?= ($ctv_job != null && $ctv_job['ctv'] == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                <?php } ?>
                            </select>
                            <p class="error"></p>
                        <?php } ?>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Deadline CTV </p>
                        <input type="datetime-local" name="deadline" id="deadline" value="<?= ($ctv_job != null && $ctv_job['deadline'] > 0) ? date('Y-m-d\TH:i', $ctv_job['deadline']) : '' ?>" <?= ($ctv_job != null && $ctv_job['ctv'] > 0 && $ctv_job['status'] == 1) ? 'readonly' : '' ?>>
                        <p class="error"></p>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Loại công việc <span>*</span></p>
                        <select name="job_type" id="job_type" style="<?=(($ctv_job != null && $ctv_job['status']== 1) ? 'background-color: #ebebeb;' : '')?>">
                            <option value="" <?=(($ctv_job != null && $ctv_job['status']== 1) ? 'hidden' : '')?>>Chọn</option>
                            <?php foreach ($job_type as $val) { ?>
                                <option <?= ($job['job_type'] == $val['id']) ? 'selected' : ((($ctv_job != null && $ctv_job['status']== 1 ) || $val['delete_status'] == 1) ? 'hidden' : '') ?> data-index="<?= $val['status_index'] ?>" value="<?= $val['id'] ?>" data-price="<?= $val['price'] ?>"><?= $val['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Số lượng <span>*</span></p>
                        <input type="text" class="input_num" placeholder="Nhập..." name="num_job_type" value="<?= $job['num_job_type'] ?>" <?= ($ctv_job != null && $ctv_job['ctv'] > 0 && $ctv_job['status'] == 1) ? 'readonly' : '' ?>>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Thông tin công việc <span>*</span></p>
                        <textarea style="height: 120px;" name="info" id="info" <?=($job['status'] == 1 || ($ctv_job != null && $ctv_job['ctv'] > 0 && $ctv_job['status'] == 1))?'readonly':''?>><?= $job['info'] ?></textarea>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Đánh giá chất lượng</p>
                        <textarea style="height: 120px;" name="content_qa_check" <?=($job['status'] == 1)?'readonly':''?>><?= ($ctv_job != null && $ctv_job['content_qa_check'] != '') ? $ctv_job['content_qa_check'] : '' ?></textarea>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Ghi chú QA</p>
                        <textarea style="height: 120px;" name="note_qa"<?=($job['status'] == 1)?'readonly':''?>><?= $job['note_qa'] ?></textarea>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Ghi chú CTV</p>
                        <textarea style="height: 120px;" name="note_ctv" <?=($job['status'] == 1 || ($ctv_job != null && $ctv_job['ctv'] > 0 && $ctv_job['status'] == 1))?'readonly':''?>><?= $job['note_ctv'] ?></textarea>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Ghi chú </p>
                        <textarea style="height: 120px;" name="note"><?= $job['note'] ?></textarea>
                    </div>
                    <div class="this_add_project  w_100">
                        <div class="status_index">
                            <p class="title_input">QA</p>
                            <div class="list_data_qa" data-val="<?= $job['status_qa'] ?>">
                                <div class="data_index">
                                    <input type="checkbox" data-val="1" <?= ($job['status_qa'] == 1) ? 'checked' : '' ?> class="inp_status_qa" id="checkbox3">
                                    <label for="checkbox3" class="checkmark"></label>
                                    <p>Có</p>
                                </div>
                                <div class="data_index">
                                    <input type="checkbox" data-val="0" <?= ($job['status_qa'] == 0) ? 'checked' : '' ?> class="inp_status_qa" id="checkbox4">
                                    <label for="checkbox4" class="checkmark"></label>
                                    <p>Không</p>
                                </div>
                            </div>
                        </div>
                        <?php if ($job['status'] ==1 ||($ctv_job != null && $ctv_job['time_qa_check'] > 0)) { ?>
                            <div class="nav_edit"></div>
                        <?php } ?>
                    </div>
                    <div class="this_add_project  w_50 check_status_index" <?= ($project['status_index'] == 0)?'hidden':'' ?>>
                        <div class="status_index">
                            <p class="title_input">Index</p>
                            <div class="list_data_index" data-val="<?= $job['status_index'] ?>">
                                <div class="data_index">
                                    <input type="checkbox" data-val="1" <?= ($job['status_index'] == 1) ? 'checked' : '' ?> class="inp_status_index" id="checkbox1">
                                    <label for="checkbox1" class="checkmark"></label>
                                    <p>Có</p>
                                </div>
                                <div class="data_index">
                                    <input type="checkbox" data-val="0" <?= ($job['status_index'] == 0) ? 'checked' : '' ?> class="inp_status_index" id="checkbox2">
                                    <label for="checkbox2" class="checkmark"></label>
                                    <p>Không</p>
                                </div>
                            </div>
                        </div>
                        <?php if ($job['status'] ==1 ||($ctv_job != null && $ctv_job['time_qa_check'] > 0)) { ?>
                            <div class="nav_edit"></div>
                        <?php } ?>
                    </div>
                    <div class="btn_add_project">
                        <button class="add_from">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="list_job_type" hidden>
    <?php foreach ($job_type as $val) { ?>
        <p class="info<?= $val['id'] ?>" data-val="<?= $val['id'] ?>"><?= $val['info'] ?></p>
    <?php } ?>
</div>