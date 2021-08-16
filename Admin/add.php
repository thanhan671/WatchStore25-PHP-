<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sacle=1, maximun-scale=1">
    <title>Add Product - WS25</title>
    <link rel="shortcut icon" type="image/png" href="Images/icon.png">
    <link rel = "stylesheet" href = "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <div class="logo">
                    <a href="index.php"><img src="Images/logo.png" width="130px" alt="logo.png"></a>
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
                <img src="Images/user.png"  width="30px" height="30px" alt="user.png">
            </div>
        </header>
        <main>
        <h1 style="margin-bottom: 15px">Thêm sản phẩm</h1>
        <div class="fixtablesp">
                
            <form id="addProduct" action="addProduct.php" method="POST" enctype="multipart/form-data">
                Tên sản phẩm: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-control" name="Name" type="text" placeholder="Nhập vào tên sản phẩm" style="width: 500px; margin-bottom: 30px; ">
                <br>
                Giá:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-control" name="Amount" type="number" placeholder="Nhập vào giá" style="width: 500px; margin-bottom: 30px; ">
                <br>
                Số lượng: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-control" name="Inventory" type="number" min="1" placeholder="Nhập vào số lượng" style="width: 500px; margin-bottom: 30px;">
                <br>
                Hình ảnh: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-control" name="Img" type="text" placeholder="Hình ảnh" style="width: 500px; margin-bottom: 30px;">
                <br>
                Chi tiết sản phẩm &nbsp;&nbsp;&nbsp;<input class="form-control" name="Detail" type="text" placeholder="Nhập thông tin chi tiết" style="width: 500px; margin-bottom: 30px;">
                <br>
                <button type="submit" class="detail" align="center" style="margin-bottom: 20px;">Thêm sản phẩm</button>
                <a class="detail" href="product.php">Trở về</a>
            </form> 
        
               
            </div>
        </main>
    </div>

</body>
</html>