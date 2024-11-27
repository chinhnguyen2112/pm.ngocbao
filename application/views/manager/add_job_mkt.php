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
                <p class="title_page">Thêm thông tin dự án</p>
                <a class="back_site" href="/quan-ly-du-an/">
                    <img src="/images/back.svg" alt="Thêm dự án">
                    <p>Quay lại</p>
                </a>
                <input type="text" name="id" value="<?= $project['id'] ?>" hidden>
                <div class="main_add_project">
                    <div class="this_add_project w_50">
                        <p class="title_input">Loại dự án <span>*</span></p>
                        <select name="project_type" id="project_type" disabled>
                            <option value="">Chọn</option>
                            <?php foreach ($project_type as $val) { ?>
                                <option <?= ($project['project_type'] == $val['id']) ? 'selected' : (($project['status'] == 1) ? 'hidden' : '') ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project  box_job_type">
                        <p class="title_input">Loại công việc</p>
                        <div class="job_type_2" style="display:none;">
                            <select class="job_type select2">
                                <?php foreach ($job_type as $val) { ?>
                                    <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="box_job_type w_100">
                            <div class="btn_add_index">
                                <div class="add_job_type">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <rect x="1.75098" y="7.96454" width="14.4975" height="2.07107" rx="1.03553" fill="white" />
                                        <rect x="7.96484" y="16.2488" width="14.4975" height="2.07106" rx="1.03553" transform="rotate(-90 7.96484 16.2488)" fill="white" />
                                    </svg>
                                    <p>Tạo mới</p>
                                </div>
                            </div>
                            <div class="list_job_type">
                            </div>
                        </div>
                    </div>
                    <div class="this_add_project  box_index <?=($project['status'] == 1)?'bg_success':''?>" >
                            <?php if ($project['status'] == 1) { ?>
                                <div class="nav_success"></div>
                            <?php } ?>
                        <div class="status_index <?= ($project['status_index'] == 1) ? 'active' : '' ?> ">
                            <p class="title_input">Index(<span>i</span>)</p>
                            <div class="list_data_index" data-val="<?= $project['status_index'] ?>">
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