<?php
    session_start();
    include "db_connect.php";

    if(isset($_POST['IDProduct']) && isset($_POST['SoLuongMua'])) {

        $IDProduct = $_POST['IDProduct'];
        $SoLuongMua = $_POST['SoLuongMua'];

        if(isset($_SESSION['UserName'])) {
            $sql_product = "SELECT * FROM product WHERE IDProduct = '$IDProduct'";
            $result_product = mysqli_query($conn, $sql_product);
            $row_product = mysqli_fetch_assoc($result_product);

            $cannotbuying = false;

            if($row_product) {
                $IDTypeProduct = $row_product["IDTypeProduct"];
                $NameProduct = $row_product["Name"];
                $Inventory = $row_product["Inventory"];
                $QuantityBuying = $SoLuongMua;
                $UnitPrice = $row_product["Amount"];
                $Img = $row_product["Img"];
                $UserName = $_SESSION["UserName"];

                //check số lượng trong kho và tổng số lượng mua
                if($SoLuongMua <= $Inventory) {
                    $sql_cart = "UPDATE cart
                    SET QuantityBuying = '$SoLuongMua'
                    WHERE IDProduct = '$IDProduct' AND UserName = '$UserName'";
                    $result_cart = mysqli_query($conn, $sql_cart);
                }
                else {
                    $sql_cart = "UPDATE cart
                    SET QuantityBuying = '$Inventory'
                    WHERE IDProduct = '$IDProduct' AND UserName = '$UserName'";
                    $result_cart = mysqli_query($conn, $sql_cart);

                    $cannotbuying = true;
                }
            }

                $cart = "SELECT * FROM cart WHERE UserName = '$UserName'";
                $cart_result = mysqli_query($conn, $cart);

                $countRecord = 0;
                $ThanhTien = 0;
                while($row = mysqli_fetch_row($cart_result)){
                    $countRecord += $row[4];
                    $ThanhTien += $row[4] * $row[5];
                };

                $_SESSION['cartCount'] = $countRecord;
                echo json_encode(array('isLogin' => true, 'cannotbuying' => $cannotbuying, 'cartCount' => $countRecord, 'ThanhTien' => $ThanhTien));
        }
        else {
            echo json_encode(array('isLogin' => false));
        }
    }
    else {
        echo '<div class="alert alert-danger">
        <strong>Danger!</strong> Thêm sản phẩm vào giỏ hàng thất bại.
      </div>';
    }

    mysqli_close($conn);
    
?>