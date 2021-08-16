<?php
    session_start();
    include "db_connect.php";

    if(isset($_SESSION['UserName'])) {
        $UserName = $_SESSION['UserName'];

        //insert vào bảng order_product
        $cart = "SELECT * FROM cart WHERE UserName = '$UserName'";
        $cart_result = mysqli_query($conn, $cart);

        $ThanhTien = 0;
        $currentDate = date("Y-m-d");
        while($row = mysqli_fetch_row($cart_result)){ 
            $ThanhTien += $row[4] * $row[5];
        };
        
        $order = "INSERT INTO order_product(UserName, Status, StartDate, UpdateDate, NoteOrder, Total)
        VALUES ('$UserName', 'Pending', '$currentDate', '$currentDate', 'My Note', '$ThanhTien')";
        $order_result = mysqli_query($conn, $order);

        //insert vào bảng detail_order
        $lastId = "SELECT * FROM order_product ORDER BY IDOrderProduct DESC LIMIT 1";
        $lastId_result = mysqli_query($conn, $lastId);
        $lastRow = mysqli_fetch_assoc($lastId_result);

        $IDOrderProduct = $lastRow['IDOrderProduct'];
        
        $cart = "SELECT * FROM cart WHERE UserName = '$UserName'";
        $cart_result = mysqli_query($conn, $cart);
        while($row = mysqli_fetch_row($cart_result)){
            $TotalAmount = $row[4] * $row[5];
            $orderDetail = "INSERT INTO detail_order(IDOrderProduct, IDProduct, TotalProduct, Amount, Discount, TotalAmount)
            VALUES ('$IDOrderProduct', '$row[1]', $row[4], $row[5], '0', '$TotalAmount')";
            $orderDetail_result = mysqli_query($conn, $orderDetail);
        };

        //Xóa giỏ hàng
        $cart_remove = "DELETE FROM cart WHERE UserName = '$UserName'";
        $result_remove = mysqli_query($conn, $cart_remove);
        $_SESSION['cartCount'] = 0;

        echo '<div style="font-size: 20px; text-align: center; padding: 100px; background-color: #DCDCDC">
        Đơn hàng của bạn là #'.$IDOrderProduct.'. <a href="index.php" style="text-decoration: none;">Nhấn vào đây</a> để trở về trang chủ.</div>';
    }
    else {
        header("Location: account.php");
    }

    mysqli_close($conn);
    
?>