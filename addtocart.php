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

                $check_cart = "SELECT * FROM cart WHERE IDProduct = '$IDProduct' AND UserName = '$UserName'";
                $check_cartResult = mysqli_query($conn, $check_cart);
                $row_updateCart = mysqli_fetch_assoc($check_cartResult);                

                if(mysqli_num_rows($check_cartResult) === 1) {
                    $SoLuongMuaTruocDo = $row_updateCart["QuantityBuying"];
                    $TongSoLuongMua = (int)$SoLuongMuaTruocDo + (int)$SoLuongMua;

                    //check số lượng trong kho và tổng số lượng mua
                    if($TongSoLuongMua <= $Inventory) {
                        $sql_cart = "UPDATE cart
                        SET QuantityBuying = '$TongSoLuongMua'
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
                else {
                    $sql_cart = "INSERT INTO cart (IDProduct, IDTypeProduct, NameProduct, QuantityBuying, UnitPrice, Img, UserName)
                    VALUES ('$IDProduct', '$IDTypeProduct', '$NameProduct', '$QuantityBuying', '$UnitPrice', 
                    '$Img', '$UserName')";
                    $result_cart = mysqli_query($conn, $sql_cart);
                }
            }

                $cart = "SELECT * FROM cart WHERE UserName = '$UserName'";
                $cart_result = mysqli_query($conn, $cart);

                $countRecord = 0;
                while($row = mysqli_fetch_row($cart_result)){
                    $countRecord += $row[4];
                };

                $_SESSION['cartCount'] = $countRecord;
                echo json_encode(array('isLogin' => true, 'cannotbuying' => $cannotbuying, 'cartCount' => $countRecord));

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