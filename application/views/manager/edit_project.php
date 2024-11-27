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
<?php $file_ex = ''; ?>
<div class="main">
    <div class="main_content">

        <div class="body_add_project">
            <form id="form_add">
                <p class="title_page">Chỉnh sửa dự án</p>
                <a class="back_site" href="/quan-ly-du-an/">
                    <img src="/images/back.svg" alt="Thêm dự án">
                    <p>Quay lại</p>
                </a>
                <input type="text" name="id" value="<?= $project['id'] ?>" hidden>
                <div class="main_add_project">
                    <div class="this_add_project w_50">
                        <p class="title_input">Khách hàng <span>*</span></p>
                        <div>
                            <select name="customer_id" id="customer_id" class="select2">
                                <option value="">Chọn khách hàng</option>
                                <?php foreach ($customer as $val) { ?>
                                    <option <?= ($project['customer_id'] == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="customer_id" class="error"></label>
                    </div>
                    <div class="this_add_project sl_2_multiple w_50" <?= check_role() == 6 ? 'hidden' : '' ?>>
                        <p class="title_input">Thương hiệu <span>*</span></p>
                        <div>
                            <select name="list_brand[]" id="list_brand[]" class="select2" multiple>
                                <option value="" data-file="">Chọn Thương hiệu</option>
                                <?php
                                $list = explode(',', $project['list_brand']);
                                foreach ($list_brand as $val) { ?>
                                    <option <?= (isset($project_type) &&  in_array($val['id'], $list)) ? 'selected' : (($project['status'] == 1) ? 'hidden' : '') ?> value="<?= $val['id'] ?>"><?= $val['brand'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="list_brand[]" class="error"></label>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Doanh thu <span>*</span></p>
                        <input type="text" class="input_num" placeholder="Nhập doanh thu" name="revenue" id="revenue" value="<?= $project['revenue'] ?>">
                    </div>
                    <div class="this_add_project w_50" <?= check_role() == 6 ? 'hidden' : '' ?>>
                        <p class="title_input">Trạng thái công nợ </p>
                        <select name="debt_status" id="debt_status" <?= ($project['debt_status'] == 1) ? 'readonly' : '' ?>>
                            <option <?= ($project['debt_status'] == 0) ? 'selected' : (($project['debt_status'] == 1) ? 'hidden' : '') ?> value="0">Chưa tất toán</option>
                            <option <?= ($project['debt_status'] == 2) ? 'selected' : (($project['debt_status'] == 1) ? 'hidden' : '') ?> value="2">Khả năng tất toán thấp</option>
                            <option <?= ($project['debt_status'] == 1) ? 'selected' : 'hidden' ?> value="1">Đã tất toán</option>
                        </select>
                    </div>
                    <div class="this_add_project w_50" <?= check_role() == 6 ? 'hidden' : '' ?>>
                        <p class="title_input">Trạng thái triển khai </p>
                        <select name="status" id="status" <?= ($project['status'] == 1) ? 'readonly' : '' ?>>
                            <option <?= ($project['status'] == 0) ? 'selected' : (($project['status'] == 1) ? 'hidden' : '') ?> value="0">Đang chốt thông tin</option>
                            <option <?= ($project['status'] == 2) ? 'selected' : (($project['status'] == 1) ? 'hidden' : '') ?> value="2">Bắt đầu triển khai</option>
                            <option <?= ($project['status'] == 1) ? 'selected' : ' hidden' ?> value="1">Hoàn thành</option>
                        </select>
                    </div>
                    <div class="this_add_project w_50" <?= check_role() == 6 ? 'hidden' : '' ?>>
                        <p class="title_input">Trạng thái bàn giao </p>
                        <select name="handover_status" id="handover_status">
                            <option <?= ($project['handover_status'] == 0) ? 'selected' : '' ?> value="0">Chưa bàn giao</option>
                            <?php foreach (array_handover_status() as $val) { ?>
                                <option <?= ($project['handover_status'] == $val['status']) ? 'selected' : '' ?> value="<?= $val['status'] ?>"><?= $val['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Website dự án <span>*</span></p>
                        <input type="url" placeholder="Nhập website dự án" name="website" value="<?= $project['website'] ?>" <?= ($project['status'] == 1) ? 'readonly' : '' ?>>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Loại dự án <span>*</span></p>
                        <select name="project_type" id="project_type" style="<?= (($project['status'] == 1) ? 'background-color: #ebebeb;' : '') ?>">
                            <option value="" <?= (($project['status'] == 1) ? 'hidden' : '') ?> data-price="0" data-file="">Chọn</option>
                            <?php foreach ($project_type as $val) {
                                $list = explode(',', $val['list_brand']);
                                if ($project['project_type'] == $val['id']) {
                                    $file_ex =  $val['file_ex'];
                                } ?>
                                <option <?= ($project['project_type'] == $val['id']) ? 'selected' : (($project['status'] == 0) ? (check_role() == 6 && !array_intersect($arr_brand, $list) ? 'hidden' : '') : 'hidden') ?> value="<?= $val['id'] ?>" data-price="<?= $val['price'] ?>" data-file="<?= $val['file_ex'] ?>"><?= $val['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project w_50" <?= check_role() == 6 ? 'hidden' : '' ?>>
                        <p class="title_input">Thời gian dục khách hàng </p>
                        <input type="datetime-local" name="time_urges">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Deadline dự án </p>
                        <input type="datetime-local" name="deadline" value="<?= date('Y-m-d\TH:i', $project['deadline']) ?>" <?= ($project['status'] == 1) ? 'readonly' : '' ?>>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">File dự án </p>
                        <input type="url" placeholder="Nhập file dự án" name="file" value="<?= $project['file'] ?>" <?= ($project['status'] == 1) ? 'readonly' : '' ?>>
                    </div>
                    <div class="this_add_project w_100">
                        <p class="title_input">File mẫu</p>
                        <?php $get_project_type = ''; ?>
                        <input type="url" placeholder="File mẫu" name="file_ex" id="file_ex" value="<?= $file_ex ?>" disabled>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Thông tin dự án <span>*</span></p>
                        <textarea style="height: 120px;" name="info" <?= ($project['status'] == 1) ? 'readonly' : '' ?>><?= $project['info'] ?></textarea>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Ghi chú index</p>
                        <textarea style="height: 120px;" name="note_index"><?= $project['note_index'] ?></textarea>
                    </div>
                    <div class="this_add_project w_50" <?= check_role() == 6 ? 'hidden' : '' ?>>
                        <p class="title_input">Ghi chú </p>
                        <textarea style="height: 120px;" name="note"><?= $project['note'] ?></textarea>
                    </div>
                    <div class="this_add_project  box_index <?= ($project['status'] == 1) ? 'bg_success' : '' ?>">
                        <?php if ($project['status'] == 1) { ?>
                            <div class="nav_success"></div>
                        <?php } ?>
                        <div class="status_index <?= ($project['status_index'] == 1) ? 'active' : '' ?> ">
                            <p class="title_input">Index(<span>i</span>)</p>
                            <div class="list_data_index">
                                <div class="data_index">
                                    <input type="checkbox" data-val="1" <?= ($project['status_index'] == 1) ? 'checked' : '' ?> class="inp_status_index">
                                    <p>Có</p>
                                </div>
                                <div class="data_index">
                                    <input type="checkbox" data-val="0" <?= ($project['status_index'] == 0) ? 'checked' : '' ?> class="inp_status_index">
                                    <p>Không</p>
                                </div>
                            </div>
                        </div>
                        <div class="list_index w_100" style="<?= ($project['status_index'] == 0) ? 'display:none' : '' ?>">
                            <div class="btn_add_index">
                                <div class="add_index">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <rect x="1.75098" y="7.96454" width="14.4975" height="2.07107" rx="1.03553" fill="white" />
                                        <rect x="7.96484" y="16.2488" width="14.4975" height="2.07106" rx="1.03553" transform="rotate(-90 7.96484 16.2488)" fill="white" />
                                    </svg>
                                    <p>Tạo mới</p>
                                </div>
                            </div>
                            <div class="this_add_project w_50">
                                <p class="title_input">Đầu việc cần index</p>
                            </div>
                            <div class="this_add_project w_50">
                                <p class="title_input">Tỉ lệ index mong muốn</p>
                            </div>
                            <div class="name_index_2" style="display:none;">
                                <select class="name_index">
                                    <?php foreach ($job_index as $val) { ?>
                                        <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php if ($project['status_index'] == 1 && $project['data_index'] != '') {
                                $data_index = json_decode($project['data_index']);
                                if ($data_index != null) {
                                    foreach ($data_index as $key => $val_index) { ?>
                                        <div class="list_index_2">
                                            <div class="this_add_project w_50 inp_index">
                                                <select class="name_index">
                                                    <?php foreach ($job_index as $val) { ?>
                                                        <option <?= ($val_index->name == $val['id']) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <p class="error error_name"></p>
                                            </div>
                                            <div class="this_add_project w_50 inp_index">
                                                <input type="text" placeholder="Nhập tỉ lệ" class="num_index" value="<?= $val_index->number ?>">
                                                <p class="ab_%">| %</p>
                                                <p class="error error_num"></p>
                                            </div>
                                            <?php if ($key > 0) { ?>
                                                <div class="del_index" onclick="del_index(this)">
                                                    <img src="/images/del2.svg" alt="xóa">
                                                </div>
                                            <?php } ?>
                                        </div>
                                <?php }
                                }
                            } else { ?>
                                <div class="list_index_2">
                                    <div class="this_add_project w_50 inp_index">
                                        <select class="name_index">
                                            <?php foreach ($job_index as $val) { ?>
                                                <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <p class="error error_name"></p>
                                    </div>
                                    <div class="this_add_project w_50 inp_index">
                                        <input type="text" placeholder="Nhập tỉ lệ" class="num_index" value="75">
                                        <p class="ab_%">| %</p>
                                        <p class="error error_num"></p>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="btn_add_project">
                        <button class="add_from">Xác nhận</button>
                    </div>
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
        padding: 8px 10px !important;
    }

    .select2-container .select2-search--inline .select2-search__field {
        padding: 1px 10px !important;
    }

    .sl_2_multiple .error {
        position: absolute;
        top: 77px;
    }

    .sl_2_multiple {
        position: relative;
        margin-bottom: 10px;
    }

    .sl_2_multiple .select2-search__field {
        padding: 1px !important;
    }
</style>