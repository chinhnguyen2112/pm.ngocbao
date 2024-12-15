<div class="main_sidebar">
    <div class="main_top">
        <div class="add_project">
            <a href="/don-gia/">
                <div class="img_add_project"><img src="/images/add_red.svg" alt="Thêm dự án"></div>
                <p>Danh sách Đơn Giá</p>
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
                    <div class="this_add_project">
                        <p class="title_input">Khách hàng <span>*</span></p>
                        <div>
                            <select name="customer_id" id="customer_id" class="<?= isset($unit_price) ? '' : 'select2' ?>">
                                <option <?= isset($unit_price) ? 'hidden' : '' ?> value="" data-file="">Chọn khách hàng</option>
                                <?php foreach ($customer as $val) { ?>
                                    <option <?= (isset($unit_price) && $unit_price['customer_id'] == $val['id']) ? 'selected' : 'hidden' ?> value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <label for="customer_id" class="error"></label>
                    </div>
                    <div class="project_type_2" style="display:none;">
                        <select class="project_type select2" onchange="updateSelectOptions(this)">
                            <option value="" data-file="">Chọn</option>
                            <?php foreach ($project_type as $val) { ?>
                                <option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="this_add_project">
                        <p class="title_input">Doanh thu <span>*</span></p>
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
                            <?php if (isset($list_revenue)) {
                                foreach ($list_revenue as $val) { ?>
                                    <div class="list_discount_2">
                                        <div class="this_add_project w_50 inp_index">
                                            <p class="title_input">Loại dự án</p>
                                            <select class="project_type select2" onchange="updateSelectOptions(this)">
                                                <option value="" data-file="">Chọn</option>
                                                <?php foreach ($project_type as $val2) { ?>
                                                    <option <?= $val['project_type'] == $val2['id'] ? 'selected' : '' ?> value="<?= $val2['id'] ?>"><?= $val2['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <p class="error error_name"></p>
                                        </div>
                                        <div class="this_add_project w_50 inp_index data_discount">
                                            <p class="title_input">Số tiền</p>
                                            <select class="val_discount select2">
                                                <option value="">Chọn</option>
                                                <?php $data_dicount = json_decode($val['list_select']['data_discount']);
                                                foreach ($data_dicount as  $val3) { ?>
                                                    <option <?= ($val3->number == $val['revenue']) ? 'selected' : '' ?> value="<?= $val3->number ?>"><?= $va3->name . ' ' . number_format($val3->number) ?> vnđ</option>
                                                <?php } ?>
                                            </select>
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
                    <div class="this_add_project w_100">
                        <p class="title_input">Trạng thái <span>*</span></p>
                        <select name="status" id="status">
                            <option value="">Chọn trạng thái</option>
                            <option <?= (isset($unit_price) && $unit_price['status'] == 1) ? 'selected' : ''; ?> value="1">Đang hoạt động</option>
                            <option <?= (isset($unit_price) && $unit_price['status'] == 2) ? 'selected' : ''; ?> value="2">Tạm dừng hoạt động</option>
                        </select>
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
    .del_index {
        top: 35px;
    }

    .this_add_project .select2-selection.select2-selection--multiple {
        border-radius: 8px;
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