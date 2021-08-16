<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Cart - WS25</title>
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
                <a href="index.php"><img src="Images/logo.png" alt="logo.png" width="125px"></a>
            </div>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Tìm kiếm"/>
            </div>
            <nav>
            <b>
                <ul id="MenuItems">
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
                </ul>
            </b>
            </nav>
            <a href="cart.php"><img src="Images/cart.png" width="30px" height="30px">
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
<!--------cart items detail---------->
<div class="small-container cart-page">
    <?php
        if(isset($_SESSION['UserName']) && isset($_SESSION['Name'])) {
            include ("db_connect.php");
            $UserName = $_SESSION["UserName"];
            $sql = "SELECT * FROM cart WHERE UserName = '$UserName'";
            $kq = mysqli_query($conn, $sql);

            $ThanhTien = 0;

            ?>
                <table>
                    <thead>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </thead>
                    <tbody id='tbody'>
            <?php
            while($row = mysqli_fetch_row($kq)){

                $amount = number_format($row[5],0,",",".");

                $TongTien = $row[5] * $row[4];
                $ThanhTien += $TongTien;

                $TongTienFormat = number_format($TongTien,0,",",".");
                $ThanhTienFormat = number_format($ThanhTien,0,",",".");
                echo "
                    <tr id='$row[1]'>
                        <td style='width: 700px;'>
                            <div class='cart-info' style='flex-wrap: nowrap; padding: 15px;'>
                                <img src='Images/$row[6]'>
                                <div>
                                    <p>$row[3]</p>
                                    <small id='UnitPrice'>Giá: $amount VND</small>
                                    <br>
                                    <a href='#' onclick='RemoveItem(this)' itemid='$row[1]'>Xóa</a>
                                </div>
                            </div>
                            </td>
                        <td><input style='width: 50px;' type='number' value='$row[4]' min='1' name='quantityItemName' itemid='$row[1]' data-content='$row[5]'></td>
                        <td itemid='$row[1]'>$TongTienFormat VND</td>
                    </tr>";
            };
            mysqli_close($conn);
            ?>
                    </tbody>
                </table>
            <?php
            ?>
                <div class="total-price" style='padding-top: 50px; display: flex; justify-content: space-between;'>
                    <?php
                        if(mysqli_num_rows($kq) > 0) {
                            ?><a href='order.php' class='btn btn-primary' style='font-weight: bold;' id='orderButton'>Đặt hàng</a><?php
                        }
                        else {
                            ?><div></div><?php
                        }
                    ?>
                    <table>
                        <tr>
                            <td>Tổng tiền</td>
                            <td id='ThanhTien'><?php echo $ThanhTienFormat ?> VND</td>
                        </tr>
                        <tr>
                            <td>Thuế VAT</td>
                            <td>5%</td>
                        </tr>
                        <tr>
                            <td>Thành tiền</td>
                            <td id='ThanhTien_Thue'><?php echo number_format($ThanhTien + $ThanhTien*0.05,0,",",".") ?> VND</td>
                        </tr>
                    </table>
                </div>
            <?php
        }
        else {
            ?>
                <div style="font-size: 20px; text-align: center; padding: 100px; background-color: #DCDCDC">Vui lòng <a href="account.php" style="color: blue;">đăng nhập</a> để truy cập vào giỏ hàng.</div>
            <?php
        }
    ?>
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

<script type="text/javascript">
    function RemoveItem(item) {
        var itemId = $(item).attr("itemid");

        $.ajax({
            async: true,
            type: 'POST',
            data: { IDProduct: itemId },
            url: 'cart_remove.php',
            success: function (response) {
                const data = JSON.parse(response);
                $('#lblCartCount').text(data.cartCount);
                $('#ThanhTien').text(data.ThanhTien + ' VND');
                $('#ThanhTien_Thue').text(data.ThanhTien + data.ThanhTien*0.05 + ' VND');
                $("#" + itemId).remove();

                if(data.cartCount == 0) {
                    $('#orderButton').replaceWith('<div></div>');
                }
            },
                error: function () {
                    alert(data.Message);
                }
            });
    }

    $(document).ready(function () {
        $("input[name=quantityItemName]").change(function () {
            var itemId = $(this).attr("itemid");
            var quantityItem = this.value;
            var cartCount = $('#lblCartCount').text();
            var UnitPrice = $(this).attr("data-content");

            async function getSoLuong() {
                await $.ajax({
                    async: true,
                    type: 'GET',
                    data: { id: itemId },
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
                        $("input[itemid=" + itemId + "]").val(1);
                    }

                    else if (parseInt(quantityItem) <= parseInt(soluong)) {
                        SoLuongMua = quantityItem;
                        
                    } else {
                        SoLuongMua = soluong;
                        $("input[itemid=" + itemId + "]").val(soluong);
                        alert("Bạn chỉ có thể mua tối đa " + soluong + " sản phẩm.");
                    }                

                    $.ajax({
                        async: true,
                        type: 'POST',
                        data: { IDProduct: itemId, SoLuongMua: SoLuongMua },
                        url: 'editcart.php',
                        success: function (response) {
                            const data = JSON.parse(response);
                            if(data.cannotbuying) {
                                alert('Ban chỉ có thể mua tối đa ' + soluong + ' sản phẩm.')
                            }
                            $('#lblCartCount').text(data.cartCount);
                            $('td[itemid=' + itemId + ']').text(UnitPrice * SoLuongMua + ' VND');
                            $('#ThanhTien').text(data.ThanhTien + ' VND');
                            $('#ThanhTien_Thue').text(data.ThanhTien + data.ThanhTien*0.05 + ' VND');

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
        }) 
    })
</script>

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