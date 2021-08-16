<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sacle=1, maximun-scale=1">
    <title>Edit Products - WS25</title>
    <link rel="shortcut icon" type="image/png" href="img/icon.png">
    <link rel = "stylesheet" href = "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <div class="logo">
                    <a href="index.php"><img src="Images/logo.png" width="130px" alt=""></a>
                </div>
                
            </div>
            <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" ><span class="las la-igloo"></span>
                    <span>Danh Mục</span></a>
                </li>
                
                <li>
                    <a href="product.php" class="active"><span class="las la-clipboard-list"></span>
                    <span>Sản Phẩm</span></a>
                </li>

                <li>
                    <a href="customer.php"><span class="las la-users"></span>
                    <span>Khách Hàng</span></a>
                </li>
        
                <li>
                    <a href="order.php"><span class="las la-shopping-bag"></span>
                    <span>Đơn Hàng</span></a>
                </li>
            </ul>
            </div>
        </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here"/>
            </div>
            <div class="user-wrapper">
                <img src="Images/user.png" width="30px" height="30px" alt="user.png">
            </div>
        </header>
        <main>
        <?php
            include('db_connect.php');
            $id=$_GET['IDProduct'];
            $kq=mysqli_query($conn, "SELECT * from product where IDProduct =$id ");
            $row=mysqli_fetch_assoc($kq);

            mysqli_close($conn);
        ?>
<h1 style="margin-bottom: 15px">Cập nhật sản phẩm</h1>
            <div class="fixtablesp">
            <form method="POST">
            <input type="hidden" name="" id="" value="<?php $_GET['IDProduct']?>">
            <label>Tên sản phẩm: <input class="form-control" name="Name" type="text" value="<?php echo $row['Name']; ?>"  style="width: 500px; margin-bottom: 10px; margin-left :22px;"></label><br>
            <label>Loại sản phẩm: <input class="form-control" name="IDType" type="number" value="<?php echo $row['IDTypeProduct']; ?>" style="width: 500px; margin-bottom: 10px; margin-left: 20px;" readonly></label><br>
            <label>Chi tiết sản phẩm: <input class="form-control" name="Detail" type="text" value="<?php echo $row['Detail']; ?>" style="width: 500px; margin-bottom: 10px;"></label><br>
            <label>Số lượng: <input class="form-control" name="Inven" type="text" value="<?php echo $row['Inventory']; ?>"  style="width: 500px; margin-bottom: 10px; margin-left: 58px;" readonly></label><br>
            <label>Giá: <input class="form-control" name="Amount" type="number" value="<?php echo $row['Amount']; ?>" style="width: 500px; margin-bottom: 10px; margin-left: 100px;"></label><br>
            <label>Nhà sản xuất: <input class="form-control" name="IDManu" type="number" value="<?php echo $row['IDManufacturer']; ?>" style="width: 500px; margin-bottom: 10px; margin-left: 30px" readonly></label><br>
            <label>Hình ảnh: <input class="form-control" name="Img" type="text" value="<?php echo $row['Img']; ?>" style="width: 500px; margin-bottom: 10px; margin-left: 60px"></label><br>
            <input type="submit" name='update' class="detail" style="margin-bottom: 20px;" value="Cập Nhật"></input>
            <a class="detail" href="product.php">Trở về</a>
        </form> 
        <?php
    if(isset($_POST['update'])){
        $id= $_GET["IDProduct"];
        $name = $_POST['Name'];
        $amount = $_POST['Amount'];
        $img = $_POST['Img'];
        $detail = $_POST['Detail'];

        $command1 = "update product set Name='$name', Amount='$amount', Img='$img', Detail='$detail' where IDProduct='$id'";
        
        mysqli_query($conn,$command1) or die("Cập nhật không thành công !");
		header("Location: product.php");
        exit();
        
        mysqli_close($conn);
    }
	
?>
</div>
            </div>
        </main>
    </div>
</body>
</html>
