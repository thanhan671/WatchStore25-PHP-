<?php
    session_start();
    include "db_connect.php";

    if(isset($_POST['IDProduct'])) {
        $IDProduct = $_POST['IDProduct'];

        if(isset($_SESSION['UserName'])) {
                $UserName = $_SESSION['UserName'];
                $cart_remove = "DELETE FROM cart WHERE IDProduct = '$IDProduct' AND UserName = '$UserName'";
                $result_remove = mysqli_query($conn, $cart_remove);

                $cart = "SELECT * FROM cart WHERE UserName = '$UserName'";
                $result = mysqli_query($conn, $cart);

                $countRecord = 0;
                $ThanhTien = 0;
                while($row = mysqli_fetch_row($result)){
                    $countRecord += $row[4];
                    $ThanhTien += $row[4] * $row[5];
                };

                $_SESSION['cartCount'] = $countRecord;
                echo json_encode(array('isLogin' => true, 'cartCount' => $countRecord, 'ThanhTien' => $ThanhTien));
        }
        else {
            echo json_encode(array('isLogin' => false));
        }
    }
    else {
        echo '<div class="alert alert-danger">
        <strong>Danger!</strong> Xóa sản phẩm thất bại.
      </div>';
    }

    mysqli_close($conn);

?>