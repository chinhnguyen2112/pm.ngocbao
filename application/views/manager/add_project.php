<div class="main_sidebar">
    <div class="main_top">
        <div class="add_project">
            <a href="/quan-ly-du-an/">
                <div class="img_add_project"><img src="/images/add_red.svg" alt="Thêm dự án"></div>
                <p>Danh sách dự án</p>
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
</div>
<div class="main">
    <div class="main_content">

        <div class="body_add_project">
            <form id="form_add">
                <div class="main_add_project">
                    <div class="this_add_project w_50">
                        <p class="title_input">Khách hàng <span>*</span></p>
                        <div>
                            <select name="customer_id" id="customer_id" class="select2">
                                <option value="" data-file="">Chọn khách hàng</option>
                                <?php foreach ($customer as $val) { ?>
                                    <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
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
                                <?php foreach ($list_brand as $val) { ?>
                                    <option value="<?= $val['id'] ?>"><?= $val['brand'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="list_brand[]" class="error"></label>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Loại dự án <span>*</span></p>
                        <div>
                            <select name="project_type" id="project_type" class="select2">
                                <option value="" data-file="">Chọn loại dự án</option>
                                <?php foreach ($project_type as $val) { ?>
                                    <option value="<?= $val['id'] ?>" data-index="<?= $val['status_index'] ?>" data-price="<?= $val['price'] ?>" data-file="<?= $val['file_ex'] ?>"><?= $val['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="project_type" class="error"></label>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Deadline dự án</p>
                        <input type="datetime-local" name="deadline">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Doanh thu <span>*</span></p>
                        <input type="number" placeholder="Nhập doanh thu" name="revenue" id="revenue">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Website dự án <span>*</span></p>
                        <input type="url" placeholder="Nhập website dự án" name="website">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">File dự án </p>
                        <input type="url" placeholder="Nhập file dự án" name="file">
                    </div>
                    <div class="this_add_project  <?= check_role() == 6 ? 'w_100' : 'w_50' ?>">
                        <p class="title_input">File mẫu</p>
                        <input type="url" placeholder="File mẫu" name="file_ex" id="file_ex" disabled>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Thông tin dự án <span>*</span></p>
                        <textarea style="height: 120px;" name="info"></textarea>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Ghi chú index</p>
                        <textarea style="height: 120px;" name="note_index"></textarea>
                    </div>
                    <div class="this_add_project w_50" <?= check_role() == 6 ? 'hidden' : '' ?>>
                        <p class="title_input">Ghi chú </p>
                        <textarea style="height: 120px;" name="note"></textarea>
                    </div>
                    <div class="job_type_2" style="display:none;">
                        <select class="job_type select2" onchange="updateSelectOptions(this)">
                            <option value="" data-file="">Chọn</option>
                            <?php foreach ($job_type as $val) { ?>
                                <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project" <?= check_role() == 6 ? 'hidden' : '' ?>>
                        <p class="title_input">Loại công việc <span>*</span></p>
                        <div class="list_job_type w_100">
                            <div class="btn_add_index">
                                <div class="add_job_type">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <rect x="1.75098" y="7.96454" width="14.4975" height="2.07107" rx="1.03553" fill="white" />
                                        <rect x="7.96484" y="16.2488" width="14.4975" height="2.07106" rx="1.03553" transform="rotate(-90 7.96484 16.2488)" fill="white" />
                                    </svg>
                                    <p>Tạo mới</p>
                                </div>
                            </div>
                            <div class="list_job_type_3 w_100">
                                <?php if (isset($project_type)) {
                                    $data_job_type = json_decode($project_type['job_type']);
                                    foreach ($data_job_type as $key => $val) { ?>
                                        <div class="list_job_type_2">
                                            <div class="this_add_project w_50 inp_index">
                                                <p class="title_input">Loại công việc</p>
                                                <select class="job_type select2" onchange="updateSelectOptions(this)">
                                                    <option value="" data-file="">Chọn</option>
                                                    <?php foreach ($job_type as $val2) { ?>
                                                        <option <?= $val->job_type == $val2['id'] ? 'selected' : '' ?> value="<?= $val2['id'] ?>"><?= $val2['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <p class="error error_name"></p>
                                            </div>
                                            <div class="this_add_project w_50 inp_index data_discount">
                                                <p class="title_input">Số lượng</p>
                                                <input type="text" class="input_num number" placeholder="Nhập" value="<?= $val->number ?>">
                                                <p class="error error_val"></p>
                                            </div>
                                            <div class="del_index" onclick="del_index(this)">
                                                <img src="/images/del2.svg" alt="xóa">
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="this_add_project  box_index">
                        <div class="status_index active">
                            <p class="title_input">Index(<span>i</span>)</p>
                            <div class="list_data_index">
                                <div class="data_index">
                                    <input type="checkbox" data-val="1" checked class="inp_status_index">
                                    <p>Có</p>
                                </div>
                                <div class="data_index">
                                    <input type="checkbox" data-val="0" class="inp_status_index">
                                    <p>Không</p>
                                </div>
                            </div>
                        </div>
                        <div class="list_index w_100">
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
                        </div>
                    </div>
                    <div class="btn_add_project">
                        <button class="add_from">Thêm mới</button>
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
    .w_100{
        width: 100%;
    }
</style>