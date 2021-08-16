<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sacle=1, maximun-scale=1">
    <title>Products - WS25</title>
    <link rel="shortcut icon" type="image/png" href="Images/icon.png">
    <link rel = "stylesheet" href = "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <div class="logo">
                    <a href="index.php"><img src="Images/logo.png" width="130px" alt=""></a>
                </div>
                
            </div>
            <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" ><span class="las la-igloo"></span>
                    <span>Danh Mục</span></a>
                </li>
                
                <li>
                    <a href="product.php" class="active"><span class="las la-clipboard-list"></span>
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
                <table class="color-table-if" width="100%">
                    <thead>
                        <tr >
                            <a href="add.php" class="detail">THÊM SẢN PHẨM MỚI</a></tr>
                            <br>
                        <tr>
                            <br>
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
                            $kq = mysqli_query($conn,"SELECT * FROM product ");
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
    </div>
        </div>
    </div>

</div>
</main>
    </div>

</body>
</html>