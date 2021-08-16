<?php
include_once('db_connect.php');

if(isset($_REQUEST['IDProduct']) and $_REQUEST['IDProduct']!=""){
    $IDProduct=$_GET['IDProduct'];

    $sql = "DELETE FROM product WHERE iDProduct='$IDProduct'";

    mysqli_query($conn,$sql) or die('Xóa dữ liệu thất bại !');

    header('Location: product.php');
    }

    mysqli_close($conn);
    
?>