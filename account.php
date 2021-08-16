<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Account - WS25</title>
    <link rel="shortcut icon" type="image/png" href="Images/icon.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="loginStyle.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="Images/logo.png" alt="logo.png" width="125px"></a>
            </div>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Tìm kiếm" />
            </div>
            <nav>
                <ul id="MenuItems"><b>
                        <li><a href="productsman.php">Nam</a></li>
                        <li><a href="productswoman.php">Nữ</a></li>
                        <li><a href="#">Dịch vụ</a></li>
                        <li><a href="#">Liên hệ</a></li>
                        <?php
                        if(isset($_SESSION['UserName']) && isset($_SESSION['Name'])) {
                            ?>
                                <li>
                                    <div>
                                        <div>Xin chào <?php echo $_SESSION['Name']?></div>
                                        <a style="color: red;" href="logout.php">Đăng xuất</a>
                                    </div>
                                </li>
                            <?php
                        }
                        else {
                            ?>
                                <li><a href="account.php">Tài khoản</a></li>
                            <?php
                        }
                    ?>
                </ul></b>
            </nav>
            <a href="cart.php"><img src="Images/cart.png" alt="cart.png" width="30px" height="30px">
                <img src="Images/menu.png" class="menu-icon" alt="menu.png" onclick="menutoggle()">
                <?php
                    if(isset($_SESSION['cartCount'])) {
                        ?>
                            <span class='badge badge-warning' id='lblCartCount'><?php echo $_SESSION['cartCount']?></span>
                        <?php
                    }
                    else {
                        ?>
                            <span class='badge badge-warning' id='lblCartCount'>0</span>
                        <?php
                    }
                ?>
            </a>
        </div>
    </div>
    <!--------account-page--------->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="Images/anh1.png" width="100%">
                </div>

                <div class="col-2">
                    <div class="form-container" style="height: 600px;">
                        <div class="form-btn">
                            <span onclick="login()">Đăng nhập</span>
                            <span onclick="register()">Đăng ký</span>
                            <hr id="Indicator">
                        </div>
                        <?php if(isset($_GET['error'])) {
                        ?>
                        <div class="login-error"><?php echo $_GET['error'] ?></div>
                        <?php
                    } ?>
                        <form id="LoginForm" action="login.php" method="POST">
                            <input name="UserName" type="text" placeholder="Tên đăng nhập">
                            <input name="PassWord" type="password" placeholder="Mật khẩu">
                            <button type="submit" class="btn">Đăng nhập</button>
                            <a href="#">Quên mật khẩu</a>
                        </form>

                        <form id="RegForm" action="register.php" method="POST">
                            <input name="UserName" type="text" placeholder="Tên đăng nhập">
                            <input name="PassWord" type="password" placeholder="Mật khẩu">
                            <input name="Email" type="email" placeholder="Email">
                            <input name="Name" type="text" placeholder="Họ và Tên">
                            <input name="Gender" type="text" placeholder="Giới tính">
                            <input name="PhoneNumber" type="text" placeholder="Số điện thoại">
                            <input name="DateOfBirth" type="date" placeholder="Ngày sinh">
                            <input name="Address" type="text" placeholder="Địa chỉ">
                            <button type="submit" class="btn">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------footer--------->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Gọi theo hotline:</h3>
                    <p>19001010</p>
                    <pre>69/68 Đặng Thùy Trâm, P. 13 
Q. Bình Thạnh, TP. HCM
<b>Số điện thoại: </b>+84 27 6969 6969
<b>Địa chỉ email: </b>lienhe@ws25.com
                </pre>
                </div>
                <div class="footer-col-2">
                    <img src="Images/logo.png">
                </div>
                <div class="footer-col-3">
                    <h3>Hướng dẫn</h3>
                    <ul>
                        <li>Thông tin liên hệ</li>
                        <li>Hỏi đáp - Góp ý</li>
                        <li>Chính sách đổi hàng</li>
                        <li>Chính sách bảo hành</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Theo dõi chúng tôi tại:</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                        <li>Twitter</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="copyright-col-1">
                    <p class="copyright">Copyright 2021 - WS25 Team</p>
                    <p class="copyright">Góp ý & Khiếu nại : ceo@ws25.com</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--------js for toggle menu--------->
    <script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px";
        }
    }
    </script>
    <!--------js for toggle Form--------->
    <script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

    function login() {

        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";
    }

    function register() {

        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
    }
    </script>
</body>

</html>