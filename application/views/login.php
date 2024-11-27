<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập</title>
    <link rel="shortcut icon" href="/images/favicon.png" />
    <link rel="stylesheet" href="/assets/css/font.css">
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="/assets/css/sweetalert.css">
</head>

<body>
    <style>
        * {
            font-family: 'Mulish', sans-serif;
        }

        .main_content {
            height: 100vh;
        }

        .box_login {
            width: 100%;
            max-height: 50%;
            overflow-y: auto;
        }

        .box_lg {
            width: 510px;
            margin: auto;
            margin-top: 5%;
        }

        .logo {
            display: block;
            margin: auto;
            margin-bottom: 15px;
        }

        .title_login span {
            font-size: 32px;
            font-weight: 700;
            line-height: 37.57px;
            text-align: center;
            display: block;
        }

        .form_inp input {
            width: -webkit-fill-available;
            padding: 20px 16px 20px 16px;
            border-radius: 10px;
            border: 1px solid #B1B5C3;
            font-size: 16px;
            font-weight: 400;
            line-height: 21.79px;
        }

        .form_inp {
            position: relative;
        }

        .div_mr {
            margin-top: 20px;
        }

        button.btn_login {
            background: #ED1E25;
            width: 100%;
            padding: 16px 10px;
            border-radius: 5px;
            box-shadow: 0px 4px 20px 0px #2F8FE826;
            font-size: 18px;
            font-weight: 600;
            line-height: 21.13px;
            text-align: center;
            color: #fff;
        }

        .redirect_lg {
            font-size: 18px;
            font-weight: 400;
            line-height: 27px;
            text-align: left;
            margin-top: 5px;
        }

        a.link_lg {
            color: #fd4d2c;
            font-weight: 600;
            text-decoration: unset;
        }

        .form_login {
            background: #FFFFFF;
            box-shadow: 0px 4px 20px 0px #757FEF3D;
            padding: 20px;
            margin: 20px 0;
            border-radius: 10px;
        }

        .name_inp {
            font-size: 16px;
            font-weight: 600;
            line-height: 21.79px;
            text-align: left;
            margin-bottom: 15px;
        }

        .name_inp span {
            color: red;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .forgot_pass {
            font-size: 15px;
            font-weight: 600;
            line-height: 20.43px;
            text-align: center;
            color: #EF7575;
            display: block;
            margin: auto;
            margin-bottom: 20px;
        }

        .sweet-alert {
            box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.3);
            width: 400px;
            margin-left: -218px;
        }

        @media (min-width: 568px) and (max-width: 991.98px) and (max-height: 599px) {
            .box_lg {
                width: 73vh;
                margin-top: 0vh;
                padding: 2vh;
            }

            .title_login {
                font-size: 5vh;
                margin-bottom: 2vh;
                line-height: 7.2vh;
            }

            .form_inp {
                margin: 1vh 0;
            }

            .form_inp input {
                height: 8vh;
            }

            button.btn_login {
                font-size: 4vh;
                padding: 1vh;
            }

            .redirect_lg {
                margin-top: 1vh;
                font-size: 4vh;
            }
        }

        @media only screen and (max-width: 540px) {
            .box_lg {
                width: 90%;
                padding: 10px 10px;
            }

            .title_login {
                margin-bottom: 10px;
            }
        }
    </style>
    <div class="content-box">
        <div class="container_login">
            <div class="img_login">
                <div class="box_login">
                    <div class="box_lg">
                        <form id="register">
                            <img src="/images/logo.png" alt="logo" class="logo">
                            <div class="title_login"><span>Đăng nhập</span></div>
                            <div class="redirect_lg">
                                <span>Bạn chưa có tài khoản ? <a class="link_lg" href="#">Đăng ký ngay!</a></span>
                            </div>
                            <div class="content_login">
                                <div class="form_login">
                                    <div class="form_inp">
                                        <p class="name_inp">Tên đăng nhập <span>*</span></p>
                                        <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập/email">
                                    </div>
                                    <div class="form_inp div_mr">
                                        <p class="name_inp">Mật khẩu <span>*</span></p>
                                        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                                    </div>
                                </div>
                                <div class="form_inp">
                                    <a class="forgot_pass" href="#">Quên mật khẩu?</a>
                                </div>
                                <div class="form_inp">
                                    <button class="btn_login">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <script>
        $("#register").validate({
            onclick: false,
            rules: {
                "username": {
                    required: true,
                },
                "password": {
                    required: true,
                },
            },
            messages: {
                "username": {
                    required: "Nhập tên đăng nhập/email.",
                },
                "password": {
                    required: 'Nhập nhật khẩu.',
                },
            },
            submitHandler: function(form) {
                var data = new FormData();
                data.append('username', $('#username').val());
                data.append('password', $('#password').val());
                $.ajax({
                    url: '/login',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    data: data,
                    success: function(response) {
                        if (response.status == 0) {
                            swal({
                                title: "Có lỗi xảy ra",
                                text: response.msg,
                                type: "error",
                            });
                        } else {
                            window.location.reload();
                        }
                    },
                    error: function(xhr) {
                        alert('Thất bại');

                    }
                });
                return false;
            }
        });
    </script>
</body>

</html>