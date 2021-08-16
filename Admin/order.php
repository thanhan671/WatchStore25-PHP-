<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sacle=1, maximun-scale=1">
    <title>Order - WS25</title>
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
                    <a href="product.php" ><span class="las la-clipboard-list"></span>
                    <span>Sản Phẩm</span></a>
                </li>

                <li>
                    <a href="customer.php"><span class="las la-users"></span>
                    <span>Khách Hàng</span></a>
                </li>
        
                <li>
                    <a href="order.php" class="active"><span class="las la-shopping-bag"></span>
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
                <table class="color-table-if" width="100%">
                    <thead>
                        <tr>
                            <td>Mã đơn hàng</td>
                            <td>Người đặt</td>
                            <td>Trạng thái</td>
                            <td>Ngày đặt hàng</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("db_connect.php");
                        $kq=mysqli_query($conn,"SELECT * FROM order_product");
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
    </div>

</div>
</main>
    </div>

</body>
</html>