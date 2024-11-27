<div class="main_sidebar">
        <div class="main_top">
            <div class="add_project">
                <a href="/cong-viec-qa/">
                    <div class="img_add_project"><img src="/images/add_red.svg" alt="Thêm dự án"></div>
                    <p>Danh sách công việc</p>
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
                        <p class="title_input">Mã dự án <span>*</span></p>
                        <select name="project_id" id="project_id">
                            <option value="">Chọn mã dự án</option>
                            <?php foreach($projects as $val){ ?>
                                <option data-index="<?= $val['status_index'] ?>"  value="<?= $val['id'] ?>"><?= project_id($val['id']) ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Loại công việc <span>*</span></p>
                        <select name="job_type" id="job_type">
                            <option value="">Chọn loại công việc</option>
                            <?php foreach($job_type as $val){ ?>
                                <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">File công việc <span></span></p>
                        <input type="url" placeholder="Nhập file công việc" name="file">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Số lượng</p>
                        <input type="text" class="input_num" placeholder="Nhập..." name="num_job_type">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">CTV thực hiện</p>
                        <select name="ctv" id="ctv">
                            <option value="">Chọn ctv thực hiện</option>
                            <?php foreach($ctv as $val){ ?>
                                <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                <?php } ?>
                        </select>
                        <p class="error"></p>
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Deadline CTV</p>
                        <input type="datetime-local" name="deadline" id="deadline">
                        <p class="error"></p>
                    </div>
                    <div class="this_add_project w_100">
                        <p class="title_input">Mức độ ưu tiên</p>
                        <input type="number" placeholder="Nhập mức độ ưu tiên" value="0" name="z_index">
                    </div>
                    <div class="this_add_project w_50">
                        <p class="title_input">Ghi chú cho CTV</p>
                        <textarea style="height: 120px;" name="note_ctv" ></textarea>
                    </div>  
                    <div class="this_add_project w_50" >
                        <p class="title_input">Thông tin công việc <span>*</span></p>
                        <textarea style="height: 120px;" name="info" ></textarea>
                    </div>
                    <div class="this_add_project  w_50">
                        <div class="status_index">
                            <p class="title_input">QA</p>
                            <div class="list_data_qa" data-val="1">
                                <div class="data_index">
                                    <input type="checkbox" data-val="1" checked class="inp_status_qa"id="checkbox4">
                                    <label for="checkbox4" class="checkmark"></label>
                                    <p>Có</p>
                                </div>
                                <div class="data_index">
                                    <input type="checkbox" data-val="0" class="inp_status_qa"id="checkbox3">
                                    <label for="checkbox3" class="checkmark"></label>
                                    <p>Không</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="this_add_project  w_50 check_status_index" style="display: none;">
                    <div class="status_index">
                            <p class="title_input">Index</p>
                            <div class="list_data_index" data-val="1">
                                <div class="data_index">
                                    <input type="checkbox" data-val="1" checked class="inp_status_index"id="checkbox1">
                                    <label for="checkbox1" class="checkmark"></label>
                                    <p>Có</p>
                                </div>
                                <div class="data_index">
                                    <input type="checkbox" data-val="0" class="inp_status_index"id="checkbox2">
                                    <label for="checkbox2" class="checkmark"></label>
                                    <p>Không</p>
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