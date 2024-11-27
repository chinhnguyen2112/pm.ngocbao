<div class="main_header">
    <div class="data_header">
    <div class="box_header">
        <div class="content_header">
            <img class="logo" src="/images/logo.png" alt="Logo">
            <?php if (check_role() == 5 || check_role() == 4 || check_role() == 3) { ?>
            <div class="menu">
                <div class="title_menu">
                    <div></div>
                    <p>CÔNG VIỆC</p>
                </div>
                <div class="list_menu">
                    <?php if (check_role() == 5) { ?>
                    <a href="/cong-viec-cong-tac-vien/" class="this_menu actived">
                        <img class="img_menu" src="/images/this-menu.svg" alt="menu">
                        <p>Cộng tác viên</p>
                        <img class="active_menu" src="/images/arrow.svg" alt="active">
                    </a>
                    <?php } elseif (check_role() == 4) { ?>
                    <a href="/cong-viec-qa/" class="this_menu actived">
                        <img class="img_menu" src="/images/this-menu.svg" alt="menu">
                        <p>Nhân viên QA</p>
                    </a>
                    <?php } elseif (check_role() == 3) { ?>
                    <a href="/cong-viec-index/" class="this_menu actived">
                        <img class="img_menu" src="/images/this-menu.svg" alt="menu">
                        <p>Nhân viên Index</p>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <?php } else if (check_role() == 6) { ?>
            <div class="menu">
                <div class="title_menu">
                    <div></div>
                    <p>QUẢN LÝ</p>
                </div>
                <div class="list_menu">
                    <a href="/quan-ly-du-an/" class="this_menu">
                        <img class="img_menu" class="img_menu" src="/images/this-menu.svg" alt="menu">
                        <p>Dự án</p>
                    </a>
                </div>
            </div>
            <div class="menu">
                <div class="title_menu">
                    <div></div>
                    <p>TÀI KHOẢN</p>
                </div>
                <div class="list_menu">
                    <a href="/tai-khoan/" class="this_menu">
                        <img class="img_menu" class="img_menu" src="/images/this-menu.svg" alt="menu">
                        <p>Tài khoản</p>
                    </a>
                </div>
            </div>
            <?php } else if (check_role() == 7) { ?>
            <div class="menu">
                <div class="title_menu">
                    <div></div>
                    <p>QUẢN LÝ</p>
                </div>
                <div class="list_menu">
                    <a href="/du-an-khach-hang/" class="this_menu">
                        <img class="img_menu" class="img_menu" src="/images/this-menu.svg" alt="menu">
                        <p>Dự án</p>
                    </a>
                </div>
            </div>
            <?php } else { ?>
            <div class="menu">
                <div class="title_menu">
                    <div></div>
                    <p>QUẢN LÝ</p>
                </div>
                <div class="list_menu">
                    <a href="/quan-ly-du-an/" class="this_menu">
                        <img class="img_menu" class="img_menu" src="/images/this-menu.svg" alt="menu">
                        <p>Dự án</p>
                    </a>
                    <a href="/quan-ly-cong-viec/" class="this_menu"><img class="img_menu" src="/images/this-menu.svg"
                            alt="menu">
                        <p>Công việc</p>
                    </a>
                    <a href="/quan-ly-thu-tien/" class="this_menu"><img class="img_menu" src="/images/this-menu.svg"
                            alt="menu">
                        <p>Thu tiền</p>
                    </a>
                </div>
            </div>
            <div class="menu">
                <div class="title_menu">
                    <div></div>
                    <p>CÀI ĐẶT</p>
                </div>
                <div class="list_menu">
                    <a href="/loai-du-an/" class="this_menu">
                        <img class="img_menu" class="img_menu" src="/images/this-menu.svg" alt="menu">
                        <p>Loại dự án</p>
                    </a>
                    <a href="/thuong-hieu/" class="this_menu">
                        <img class="img_menu" class="img_menu" src="/images/this-menu.svg" alt="menu">
                        <p>Thương hiệu</p>
                    </a>
                    <a href="/don-gia/" class="this_menu">
                        <img class="img_menu" class="img_menu" src="/images/this-menu.svg" alt="menu">
                        <p>Cài đặt đơn giá</p>
                    </a>
                    <a href="/loai-cong-viec/" class="this_menu"><img class="img_menu" src="/images/this-menu.svg"
                            alt="menu">
                        <p>Loại công việc</p>
                    </a>
                    <a href="/thong-tin-nguon-nhan/" class="this_menu"><img class="img_menu" src="/images/this-menu.svg"
                            alt="menu">
                        <p>Thông tin nguồn nhận</p>
                    </a>
                    <a href="/dau-viec-can-index/" class="this_menu"><img class="img_menu" src="/images/this-menu.svg"
                            alt="menu">
                        <p>Đầu việc cần Index</p>
                    </a>
                </div>
            </div>
            <div class="menu">
                <div class="title_menu">
                    <div></div>
                    <p>TÀI KHOẢN</p>
                </div>
                <div class="list_menu">
                    <a href="/tai-khoan/" class="this_menu">
                        <img class="img_menu" class="img_menu" src="/images/this-menu.svg" alt="menu">
                        <p>Tài khoản</p>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="box_export">
        <div class="title_menu" onclick="export_excel()">
            <p>Xuất File</p>
        </div>
    </div></div>
</div>