<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Products for Woman - WS25</title>
    <link rel="shortcut icon" type="image/png" href="Images/icon.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="Images/logo.png" width="125px"></a>
            </div>
            <form action='search.php' method='get'>
                <div class="search-wrapper">
                    <input style="margin: 0px 0px 0px 0px;" type="text" name="keyword" placeholder="Tìm kiếm" />
                    <button style="border:none; background-color:rgba(0, 0, 0, 0)" name="submit">
                        <span >
                            <i class="las la-search"></i>
                        </span>
                    </button>
                </div>
            </form>
            <nav>
                <ul id="MenuItems">
                    <b>
                        <li><a href="productsman.php">Nam</a></li>
                        <li><a href="productswoman.php">Nữ</a></li>
                        <li><a href="">Dịch vụ</a></li>
                        <li><a href="">Liên hệ</a></li>
                    <?php
                        if(isset($_SESSION['UserName']) && isset($_SESSION['Name'])) {
                            ?>
                                <li>
                                    <div>
                                        Xin chào <?php echo $_SESSION['Name']?>
                                        <div><a style="color: red;" href="logout.php">Đăng xuất</a></div>
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
                    </b>
                </ul>
            </nav>
            <a href="cart.php"><img src="Images/cart.png" alt="cart.png" width="30px" height="30px">
                <img src="Images/menu.png" alt="menu.png" class="menu-icon" onclick="menutoggle()">
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
  
<div class="small-container">

    <div class="brands">
        <div class="row row-2"><h2>Các hãng đồng hồ phổ biến</h2></div>
        <div class="small-container">
            <div class="row">
                <?php
                include ("db_connect.php");
                $sql = "SELECT * FROM product";
                $kq = mysqli_query($conn,$sql);

                echo "
                <div class='col-5'>
                    <a href=brandlist.php?nsx=1><img src='Images/casio.png' alt='casio.png'></a>
                </div>
                <div class='col-5'>
                    <a href=brandlist.php?nsx=2><img src='Images/DW.png' alt='DW.png'></a>
                </div>
                <div class='col-5'>
                    <a href=brandlist.php?nsx=3><img src='Images/doxa.png' alt='doxa.png'></a>
                </div>
                <div class='col-5'>
                    <a href=brandlist.php?nsx=4><img src='Images/Longines.png' alt='Longines.png'></a>
                </div>
                <div class='col-5'>
                    <a href=brandlist.php?nsx=5><img src='Images/orient.png' alt='orient.png'></a>
                </div>
                <div class='col-5'>
                    <a href=brandlist.php?nsx=6><img src='Images/tissot.png' alt='tissot.png'></a>
                </div>                
                <div class='col-5'>
                    <a href=brandlist.php?nsx=7><img src='Images/fossil.png' alt='fossil.png'></a>
                </div>                
                <div class='col-5'>
                    <a href=brandlist.php?nsx=8><img src='Images/citizen.png' alt='citizen.png'></a>
                </div>                
                <div class='col-5'>
                    <a href=brandlist.php?nsx=9><img src='Images/skagen.png' alt='skagen.png'></a>
                </div>                
                <div class='col-5'>
                    <a href=brandlist.php?nsx=10><img src='Images/movado.png' alt='movado.png'></a>
                </div>
                <div class='col-5'>
                    <a href=brandlist.php?nsx=11><img src='Images/CK.png' alt='CK.png'></a>
                </div>
                <div class='col-5'>
                    <a href=brandlist.php?nsx=12><img src='Images/ogival.png' alt='ogival.png'></a>
                </div>
                ";
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>

    <div class="row row-2">
        <h2>Tất cả sản phẩm nữ</h2>
        <select>
            <option>Sắp xếp mặc định</option>
            <option>Sắp xếp theo giá giảm dần</option>
            <option>Sắp xếp theo giá tăng dần</option>
            <option>Bán chạy</option>
            <option>Giảm giá</option>
        </select>
    </div>

    <div class="row">
        <?php
            include ("db_connect.php");
            $sql = "SELECT * FROM product WHERE IDTypeProduct = 1";
            $kq = mysqli_query($conn,$sql);

            $sodulieu = mysqli_num_rows($kq) or die (mysql_error());
            $sosanpham = 8;
            $sotrang = ceil($sodulieu/$sosanpham);

            if(!isset($_GET["page"]))
                $page = 1;
            else
                $page = $_GET["page"];

            $x = ($page - 1) * $sosanpham;
            $command = "SELECT * FROM product WHERE IDTypeProduct = 1 limit ".$x.",".$sosanpham;
            $result = mysqli_query($conn,$command);

            while($row = mysqli_fetch_row($result)){

                $amount = number_format($row[5],0,",",".");

                echo "
                <div class='col-4'>
                <a href='product-detail.php?IDProduct=$row[0]'><img src='Images/$row[7]'></a>
                <a href='product-detail.php?IDProduct=$row[0]'><h4>$row[1]</h4></a>
                <div class='ratting'>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star-o'></i>
                </div>
                <p><h3>$amount VNĐ</h3></p>
            </div>
                ";
            };
            mysqli_close($conn);
        ?>
    </div>
    <div class="page-btn">
        <?php
        for($i = 1; $i <= $sotrang; $i++)
        {
            if($i == $page)
                echo "<span>$i</span>";
            else
            {
                ?>
                <a href="productswoman.php?page=<?php echo $i ?>">
                    <?php echo "<span>$i</span>" ?>
                </a>
                <?php
            }
        }
        ?>

        <span>&#8594;</span>
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

        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
            else
                {
                    MenuItems.style.maxHeight = "0px";
                }
        }
    </script>

</body>
</html>