<?php
    include("db_connect.php");

    $name = $_POST['Name'];
    $amount = $_POST['Amount'];
    $inventory = $_POST['Inventory'];
    $img = $_POST['Img'];
    $detail = $_POST['Detail'];
    
       $sql = "INSERT INTO product (Name, Amount, Inventory, Img, Detail)
                    VALUES ('$name', '$amount', '$inventory','$image_url', '$detail')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: product.php");
        exit();
    }
    else {
        header("Location: add.php?error=Thêm sản phẩm thất bại");
        exit();
    
    }
    
    mysqli_close($conn);
?>