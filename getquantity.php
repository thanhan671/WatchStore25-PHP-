<?php
    session_start();
    include "db_connect.php";

    if(isset($_GET['id']) || $_REQUEST['id']) {

        $id = $_GET['id'];

        $sql = "SELECT * FROM product WHERE IDProduct = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        echo json_encode(array('SoLuong' => $row["Inventory"]));
    }
    else {
        header("Location: product-detail.php?error=Lấy ID thất bại");
        exit();
    }

    mysqli_close($conn);
    
?>