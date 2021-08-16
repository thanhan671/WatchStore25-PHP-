<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sacle=1, maximun-scale=1">
    <title>WS25 Admin</title>
    <link rel="shortcut icon" type="image/png" href="Images/icon.png">
    <link rel = "stylesheet" href = "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/account.css">
</head>
<body>
<?php
if(isset($_SESSION['UserName'])) {
    ?>
    <div>
    <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <div class="logo">
                    <a href="index.php"><img src="Images/logo.png" width="130px" alt="logo.png"></a>
                </div>
                
            </div>
            <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" class="active"><span class="las la-igloo"></span>
                    <span>Danh Mục</span></a>
                </li>
                
                <li>
                    <a href="product.php"><span class="las la-clipboard-list"></span>
                    <span>Sản Phẩm</span></a>
                </li>

                <li>
                    <a href="customer.php"><span class="las la-users"></span>
                    <span>Khách Hàng</span></a>
                </li>
        
                <li>
                    <a href="order.php"><span class="las la-shopping-bag"></span>
                    <span>Đơn Hàng</span></a>
                </li>
            </ul>
            </div>
        </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here"/>
            </div>
            <div class="user-wrapper">
                <img src="Images/user.png" width="30px" height="30px" alt="user.png">
                <div>
                        <div>
                            <div>Xin chào <?php echo $_SESSION['UserName']?></div>
                            <a style="color: red;" href="logout.php">Đăng xuất</a>
                        </div>
                </div>
            </div>
        </header>
        <main>
            <div class="cards">

                <div>
                    <div class="card-single">
                        <div>
                            <h2>Sản Phẩm</h2>
                        </div>
                        <div>
                            <span class="las la-clipboard-list"></span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="color-table-if" width="100%">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td>Mã Sản Phẩm </td>
                                    <td>Tên Sản Phẩm</td>
                                    <td>Số Lượng</td>
                                    <td>Giá</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("db_connect.php");
                            $kq = mysqli_query($conn,"SELECT * FROM product ORDER BY PurchaseDate DESC LIMIT 10");
                                 while($row = mysqli_fetch_row($kq)){
                                     echo "
                                    <tr>
                                        <td class='imgsp'><img src='../Images/$row[7]' width='100%' id='ProductImg'></td>
                                        <td>$row[0]</td>
                                        <td>$row[1]</td>
                                        <td>$row[4]</td>
                                        <td>$row[5]VNĐ</td>
                                        <td class='fixbutton'><a class='detail' name='edit_btn' href=edit.php?IDProduct=$row[0]>Sửa</a></td>
                                        <td class='fixbutton'><a class='detail' href=delete.php?IDProduct=$row[0]>Xóa</a></td>
                                    </tr>
                                    ";
                                 };

                                 mysqli_close($conn);

                                ?>
                            </tbody>
                        </table>
                        </div>
                        <br>
                            <a href="product.php" class="detail">Xem tất cả!!</a>
                                        
                    </div>
                </div>

                <div>
                    <div class="card-single">
                        <div>
                            <h2>Khách Hàng</h2>
                        </div>
                        <div>
                            <span class="las la-users"></span>
                        </div>
                        
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="color-table-if" width="100%">
                            <thead>
                                <tr>
                                    <td>Họ Và Tên</td>
                                    <td>Số Điện Thoại</td>
                                    <td>Địa Chỉ</td>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
                    include("db_connect.php");
                        $kq=mysqli_query($conn,"SELECT * FROM customer LIMIT 10");
                        while($row=mysqli_fetch_row($kq)){
                            echo "
                                <tr>
                                <td><span class='status purple'></span> $row[0]</td>
                                <td>$row[3]</td>
                                <td>$row[5]</td>
                                <td>$row[7]</td>
                                <td><a class='detail' href='#'>Chi Tiết</a></td>
                                </tr>
                            ";
                        };

                        mysqli_close($conn);

                        ?>
                            </tbody>
                        </table>
                        </div>
                        <br>
                            <a href="customer.php" class="detail">Xem tất cả!!</a>
                                        
                    </div>
                </div>

                <div>
                    <div class="card-single">
                        <div>
                            <h2>Đơn Hàng</h2>
                        </div>
                        <div>
                            <span class="las la-shopping-bag"></span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="color-table-if" width="100%">
                            <thead>
                                <tr>
                                    <td>Mã đơn hàng</td>
                                    <td>Sản phẩm</td>
                                    <td>Số Lượng</td>
                                    <td>Ngày đặt hàng</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                        include("db_connect.php");
                        $kq=mysqli_query($conn,"SELECT * FROM order_product ORDER BY StartDate DESC LIMIT 10");
                        while($row = mysqli_fetch_row($kq)){
                            echo"
                            <tr>
                            <td><span class='status pink'></span>OD $row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                            <td><a class='detail' style='margin-left : 30px' href='detailorder.php?IDOrderProduct=$row[0]'>Chi Tiết</a></td>
                            </tr>
                            ";
                        };

                        mysqli_close($conn);
                        
                        ?>
                            </tbody>
                        </table>
                        
                        </div>
                        <br>
                            <a href="order.php" class="detail">Xem tất cả!!</a>
                                        
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
    <?php
}
else {
    ?>
    <div class="adminMessage">Bạn cần đăng nhập bằng <a class="accountAdmin" href="account.php"><b>TÀI KHOẢN ADMIN</b></a> để tiếp tục</div>
    <div class="adminMessage"><a class="accountAdmin" href="../index.php"><b>Nhấn vào đây</b></a> để trở về trang chủ</div>
    <?php
}
?>
</body>
</html>
