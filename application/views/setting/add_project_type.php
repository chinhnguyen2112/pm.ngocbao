<div class="main_sidebar">
    <div class="main_top">
        <div class="add_project">
            <a href="/loai-du-an/">
                <div class="img_add_project"><img src="/images/add_red.svg" alt="Thêm dự án"></div>
                <p>Danh sách loại dự án</p>
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
                <input type="text" id="id" name="id" value="<?= (isset($id) && $id > 0) ? $id : 0 ?>" hidden>
                <div class="main_add_project">
                    <div class="this_add_project w_50">
                        <p class="title_input">Tên loại dự án <span>*</span></p>
                        <input type="text" name="name" id="name" placeholder="Nhập" value="<?= (isset($project_type)) ? $project_type['name'] : ''; ?>">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Doanh thu <span>*</span></p>
                        <input type="text" class="input_num" name="price" id="price" placeholder="Nhập" value="<?= (isset($project_type)) ? $project_type['price'] : ''; ?>">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Trạng thái <span>*</span></p>
                        <select name="status" id="status">
                            <option value="">Chọn trạng thái</option>
                            <option <?= (isset($project_type) && $project_type['status'] == 1) ? 'selected' : ''; ?> value="1">Đang hoạt động</option>
                            <option <?= (isset($project_type) && $project_type['status'] == 2) ? 'selected' : ''; ?> value="2">Tạm dừng hoạt động</option>
                        </select>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">File mẫu <span>*</span></p>
                        <input type="url" placeholder="Nhập file mẫu" name="file_ex" id="file_ex" value="<?= (isset($project_type)) ? $project_type['file_ex'] : ''; ?>">
                    </div>
                    <div class="this_add_project sl_2_multiple ">
                        <p class="title_input">Thương hiệu <span>*</span></p>
                        <div>
                            <select name="list_brand[]" id="list_brand[]" class="select2" multiple>
                                <option value="" data-file="">Chọn Thương hiệu</option>
                                <?php
                                $list = explode(',', $project_type['list_brand']);
                                foreach ($list_brand as $val) { ?>
                                    <option <?= (isset($project_type) &&  in_array($val['id'], $list)) ? 'selected' : '' ?> value="<?= $val['id'] ?>"><?= $val['brand'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="list_brand[]" class="error"></label>
                    </div>
                    <div class="this_add_project">
                        <p class="title_input">Chiết khấu <span>*</span></p>
                        <div class="list_discount w_100">
                            <div class="btn_add_index">
                                <div class="add_discount">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <rect x="1.75098" y="7.96454" width="14.4975" height="2.07107" rx="1.03553" fill="white" />
                                        <rect x="7.96484" y="16.2488" width="14.4975" height="2.07106" rx="1.03553" transform="rotate(-90 7.96484 16.2488)" fill="white" />
                                    </svg>
                                    <p>Tạo mới</p>
                                </div>
                            </div>
                            <div class="this_add_project w_50">
                                <p class="title_input">Tên giá</p>
                            </div>
                            <div class="this_add_project w_50">
                                <p class="title_input">Số tiền</p>
                            </div>
                            <?php if (isset($project_type)) {
                                $data_discount = json_decode($project_type['data_discount']);
                                foreach ($data_discount as $key => $val) { ?>
                                    <div class="list_discount_2">
                                        <div class="this_add_project w_50 inp_index">
                                            <input type="text" placeholder="Nhập" class="name_discount" value="<?= $val->name ?>">
                                            <p class="error error_name"></p>
                                        </div>
                                        <div class="this_add_project w_50 inp_index">
                                            <input type="text" placeholder="Nhập" class="input_num val_discount" value="<?= $val->number ?>">
                                            <p class="error error_val"></p>
                                        </div>
                                        <div class="del_index" onclick="del_index(this)" <?= $key == 0 ? 'hidden' : '' ?>>
                                            <img src="/images/del2.svg" alt="xóa">
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="list_discount_2">
                                    <div class="this_add_project w_50 inp_index">
                                        <input type="text" placeholder="Nhập" class="name_discount" value="">
                                        <p class="error error_name"></p>
                                    </div>
                                    <div class="this_add_project w_50 inp_index">
                                        <input type="text" placeholder="Nhập" class="input_num val_discount" value="">
                                        <p class="error error_val"></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="job_type_2" style="display:none;">
                        <select class="job_type select2" onchange="updateSelectOptions(this)">
                            <option value="" data-file="">Chọn</option>
                            <?php foreach ($job_type as $val) { ?>
                                <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project">
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
                            <?php if (isset($project_type)) {
                                $data_job_type = json_decode($project_type['job_type']);
                                foreach ($data_job_type as $key => $val) {?>
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
                            } else { ?>
                                <div class="list_job_type_2">
                                    <div class="this_add_project w_50 inp_index data_job_type">
                                        <p class="title_input">Loại công việc</p>
                                        <select class="job_type select2" onchange="updateSelectOptions(this)">
                                            <option value="" data-file="">Chọn</option>
                                            <?php foreach ($job_type as $val2) { ?>
                                                <option <?= $val['job_type'] == $val2['id'] ? 'selected' : '' ?> value="<?= $val2['id'] ?>"><?= $val2['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <p class="error error_name"></p>
                                    </div>
                                    <div class="this_add_project w_50 inp_index data_discount">
                                        <p class="title_input">Số lượng</p>
                                        <input type="text" class="input_num number" placeholder="Nhập">
                                        <p class="error error_val"></p>
                                    </div>
                                    <div class="del_index" onclick="del_index(this)">
                                        <img src="/images/del2.svg" alt="xóa">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="this_add_project  box_index">
                        <div class="status_index active">
                            <p class="title_input">Index(<span>i</span>)</p>
                            <div class="list_data_index">
                                <div class="data_index">
                                    <input type="checkbox" data-val="1" <?= (isset($project_type) && $project_type['status_index'] == 0) ? '' : 'checked' ?> class="inp_status_index">
                                    <p>Có</p>
                                </div>
                                <div class="data_index">
                                    <input type="checkbox" data-val="0" <?= (isset($project_type) && $project_type['status_index'] == 0) ? 'checked' : '' ?> class="inp_status_index">
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
                            <?php if (isset($project_type) && $project_type['status_index'] == 1 && $project_type['data_index'] != '') {
                                $data_index = json_decode($project_type['data_index']);
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
        padding: 8px 10px;
    }

    .select2-container .select2-search--inline .select2-search__field {
        padding: 1px 10px;
    }

    .sl_job_type .error {
        position: absolute;
        top: 77px;
    }

    .sl_job_type {
        position: relative;
        margin-bottom: 10px;
    }

    .sl_job_type .select2-search__field {
        padding: 1px !important;
    }
</style>