<div class="main_sidebar">
        <div class="main_top">
            <div class="right_top">
                <?php if (check_role() == 5) { ?>
                    <div class="money">
                        <p><?= number_format($_SESSION['user']['money']) ?> đ</p>
                    </div>
                <?php } ?>
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
        <div class="main_img">
            <img class="image_main" src="/images/logo.png" alt="">
        </div>
    </div>
</div>
</div>
<style>.main_img {
    height: calc(100vh - 100px);
    display: flex;
    justify-content: center;
    align-items: center;
}
    .main {
        margin-left: 40px;
        margin-right: 20px;
        width: calc(100% - 360px);
    }

    .main_top {
        background: #fff;
        box-shadow: 0px 4px 20px 0px #2F8FE812;
        padding: 20px 24.5px 20px 24.5px;
        border-radius: 0px 0px 10px 10px;
        display: flex;
        justify-content: space-between;
    }

    .right_top {
        display: flex;
        margin-left: auto;
    }

    .money {
        padding: 7px 20px;
        background: #ED1E250F;
        border-radius: 29px;
        height: min-content;
        margin-right: 15px;
    }

    .money p {
        font-size: 23px;
        font-weight: 600;
        line-height: 32.68px;
        color: #ED1E25;
    }

    .profile {
        display: flex;
        align-items: center;
    }

    .avatar {
        width: 45px;
        margin-right: 15px;
    }

    .nav_profile {
        display: none;
        position: absolute;
        width: 186px;
        right: 0;
        padding: 8px 0;
        border-radius: 10px;
        box-shadow: 0px 4px 20px 0px #2F8FE812;
        background: #fff;
    }

    .name_role {
        font-size: 14px;
        font-weight: 400;
        line-height: 19.07px;
        color: #ED1E25;
        margin-bottom: 7px;
    }

    .name {
        font-size: 16px;
        font-weight: 600;
        line-height: 18.78px;
        color: #260944;
    }

    .box_profile {
        position: relative;
        cursor: pointer;
    }

    .nav_profile a {
        padding: 8px 16px 8px 16px;
        display: flex;
        font-size: 15px;
        font-weight: 400;
        line-height: 20.43px;
        color: #260944;
    }

    .nav_profile a img {
        width: 18px;
        height: 18px;
        margin-right: 10px;
    }

    .box_profile:hover .nav_profile {
        display: block;
    }

    .nav_profile a:hover {
        background: #FFF7F7;
    }
</style>