<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Product Detail New - WS25</title>
    <link rel="shortcut icon" type="image/png" href="Images/icon.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                <ul id="MenuItems"><b>
                        <li><a href="productsman.php">Nam</a></li>
                        <li><a href="productswoman.php">Nữ</a></li>
                        <li><a href="">Dịch vụ</a></li>
                        <li><a href="">Liên hệ</a></li>
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
            <a href="cart.php"><img src="Images/cart.png" width="30px" height="30px">
                <img src="Images/menu.png" class="menu-icon" onclick="menutoggle()">
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
    <!-----------------single product details----------->
    <div id='message'></div>
    <div class="small-container single-product">
        <div class="row">
            <?php

        $IDProduct = $_GET["IDProduct"];
        include("db_connect.php");
        $sql = "SELECT * FROM product WHERE IDProduct = $IDProduct";
        $kq = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_row($kq)){

            $amount = number_format($row[5],0,",",".");

            echo "
            <div class='col-2'>
            <img src='images/iconnew.png' width=70px>
                <img src='Images/$row[7]' width='100%' id='ProductImg'>
            </div>
        <div class='col-2'>
            <h1>$row[1]</h1>
            <h4>$amount VNĐ</h4>
            <select>
                <option>Chọn màu</option>
                <option>Đen</option>
                <option>Bạc</option>
                <option>Xám</option>
            </select>
            <input type='number' value='1' min='1' name='quantityItemName'>
            <a href='#' class='btn' onclick='AddtoCart(this)' itemid='$row[0]'>Thêm vào giỏ</a>
            <h3>Chi tiết sản phẩm <i class='fa fa-indent'></i></h3>
            <br>
            <p>$row[3]</p>
        </div>
    </div>
            ";
        }; 
    ?>
        </div>
        <!--------testimonial---------->
        <div class="testimonial">
            <div class="small-container">
                <h1>Đánh giá</h1>
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Đồng hồ giá tốt, nhân viên tư vấn nhiệt tình, chế độ hậu mãi tuyệt vời. Chắc chắn tôi sẽ giới
                            thiệu bạn bè mình đến mua sắm tại WS25
                        </p>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="Images/Cus1.png">
                        <h3>Văn Hùng</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Tôi ủng hộ những người đặt lợi ích của khách hàng làm mục tiêu phấn đấu.
                            Vì vậy, tôi đã ủng hộ và lựa chọn WS25.
                        </p>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="Images/Cus2.png">
                        <h3>Trịnh Phú</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Anh ấn tượng với đội ngũ nhân viên kỹ thuật ở đây với sự tận tâm, chuyên nghiệp.
                            Anh gửi lời chúc mừng và hi vọng WS25 luôn luôn lớn mạnh
                        </p>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="Images/Cus3.png">
                        <h3>Thanh Hoài</h3>
                    </div>
                </div>
            </div>
        </div>
        <!----------title-------------->
        <div class="small-container">
            <div class="row row-2">
                <h2>Sản phẩm liên quan</h2>
                <p>Xem thêm</p>
            </div>
        </div>
        <!----------product-------------->
        <div class="small-container">
            <div class="row">
                <div class="col-4">
                    <img src="Images/SanPham2.png">
                    <h4>G-Shock GA-400-1BDR – Nam – Quartz (Pin) – Dây Cao Su</h4>
                    <div class="ratting">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>4.230.000đ</p>
                </div>
                <div class="col-4">
                    <img src="Images/SanPham3.png">
                    <h4>Daniel Wellington DW00100148 – Nam – Quartz (Pin) – Dây Vải – Mặt Số 40mm</h4>
                    <div class="ratting">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>4.600.000đ</p>
                </div>
                <div class="col-4">
                    <img src="Images/SanPham4.png">
                    <h4>Casio AE-1200WHD-1AVDF – Nam – Kính Nhựa – Quartz (Pin) – Dây Kim Loại</h4>
                    <div class="ratting">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <p>7.140.000đ</p>
                </div>
                <div class="col-4">
                    <img src="Images/SanPham5.png">
                    <h4>Doxa D173TCM – Nam – Kính Sapphire – Automatic (Tự Động) – Dây Kim Loại</h4>
                    <div class="ratting">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <p>36.940.000đ</p>
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
    <!--------js for product--------->
    <script>
    var ProductImg = document.getElementById("ProductImg");
    var SmallImg = document.getElementsByClassName("small-img");
    SmallImg[0].onclick = function() {
        ProductImg.src = SmallImg[0].src;
    }
    SmallImg[1].onclick = function() {
        ProductImg.src = SmallImg[1].src;
    }
    SmallImg[2].onclick = function() {
        ProductImg.src = SmallImg[2].src;
    }
    SmallImg[3].onclick = function() {
        ProductImg.src = SmallImg[3].src;
    }
    </script>

<script type="text/javascript">

    function AddtoCart(item) {
        var itemId = $(item).attr("itemid");
        var quantityItem = $("input[name=quantityItemName]").val();
        var cartCount = $('#lblCartCount').text();

        async function getSoLuong() {
            await $.ajax({
                async: true,
                type: 'GET',
                data: { id: itemId},
                url: 'getquantity.php',
                success: function (response) {
                    const data = JSON.parse(response);
                    SoLuongConLai = data.SoLuong
                },
                error: function (err) {
                    console.error(err);
                }
            });
            return SoLuongConLai;
        }

        getSoLuong().then(soluong => {
            let SoLuongMua = 0;

            if (soluong > 0) {

                if (quantityItem === "" || quantityItem <= 0) {
                    SoLuongMua = 1;
                    $("input[name=quantityItemName]").val(1);
                }

                else if (parseInt(quantityItem) <= parseInt(soluong)) {
                    SoLuongMua = quantityItem;
                    
                } else {
                    SoLuongMua = soluong;
                    $("input[name=quantityItemName]").val(soluong);
                    alert("Bạn chỉ có thể mua tối đa " + soluong + " sản phẩm.");
                }                

                $.ajax({
                    async: true,
                    type: 'POST',
                    data: { IDProduct: itemId, SoLuongMua: SoLuongMua },
                    url: 'addtocart.php',
                    success: function (response) {
                        const data = JSON.parse(response);
                        if(data.isLogin) {
                            const success = `
                            <div class="alert alert-success" style="text-align: center;">
                            <strong>Thành công !</strong> Đã thêm sản phẩm vào giỏ hàng.
                            </div> `;
                            $('#message').replaceWith(success);

                            if(data.cannotbuying) {
                                alert('Ban chỉ có thể mua tối đa ' + soluong + ' sản phẩm.')
                            }
                            
                            $('#lblCartCount').text(data.cartCount);
                        }
                        else {
                            const error = `
                            <div class="alert alert-warning" style="text-align: center;">
                            <strong>Cảnh báo !</strong> Bạn cần phải <a href="account.php">đăng nhập</a> để mua sản phẩm.
                            </div>`;
                            $('#message').replaceWith(error);
                        }
                },
                    error: function (err) {
                        console.error('err', err);
                    }
                });
            }
            else {
                alert("Sản phẩm này đã hết hàng xin hãy quay lại sau.")
            }
        })
    }
</script>

</body>

</html>