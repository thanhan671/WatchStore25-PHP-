<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Details Order - WS25</title>
    <link href="detailorderstyle.css" rel="stylesheet">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
</head>
<?php
    include("db_connect.php");

    $id = $_GET['IDOrderProduct'];
    $sql = ("SELECT * FROM detail_order d 
    INNER JOIN order_product op ON op.IDOrderProduct=d.IDOrderProduct 
    INNER JOIN product p ON d.IDProduct=p.IDProduct 
    where op.IDOrderProduct=$id");
    $kq = mysqli_query($conn,$sql);

    $ro = mysqli_fetch_assoc($kq);
    $thanhtien = 0;

    mysqli_close($conn);
?>
<body oncontextmenu='return false' class='snippet-body'>
<div class="d-flex flex-column justify-content-center align-items-center" id="order-heading">
    <div class="text-uppercase">
        <p>Chi Tiết Đơn Hàng</p>
    </div>
    <div class="h4"></div>
    <div class="pt-1">
        <p>Đơn hàng <?php echo $id ?> đang ở trạng thái<b class="text-dark"> <?php echo $ro['Status']?> </b></p>
    </div>
    <div class="btn close text-white"> <a href="order.php">&times;</a> </div>
</div>
<div class="wrapper bg-white">
    
        <table class="table table-borderless">
            <thead>
                <tr class="text-uppercase text-muted">
                    <th scope="col" colspan="2">Sản Phẩm</th>
                    <th></th>
                    <th scope="col" class="text-right" >Giá</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
     
        while ($row = mysqli_fetch_assoc($kq)){
            $tong = $row['Amount'] * $row['TotalProduct'];
            $thanhtien += $tong;
            $giaFormat = number_format($row['Amount'],0,",",".");
        echo "
                <tr>
                <td><div class='d-flex justify-content-start align-items-center list py-1'></td>
                <td><div class=''> <input type='number' min='1' value='$row[TotalProduct]' style='width: 30px'></div></td>
                <td><div class='order-item' style='margin-left: 20px'>$row[Name]</div></td>
                    <td class='text-right'><b>$giaFormat VNĐ</b></td>
                </tr>
                ";
        }
        
                ?>
            </tbody>
        </table>
    <div class='pt-2 border-bottom mb-3'></div>
    <div class='d-flex justify-content-start align-items-center py-1 pl-3'>
        <div class='text-muted'>Phí giao hàng</div>
        <div class='ml-auto'> <label>Miễn phí</label> </div>
        
    </div>

    <div class='d-flex justify-content-start align-items-center py-1 pl-3'>
        <div class='text-muted'>Thuế</div>
        <div class='ml-auto'> <label>5%</label> </div>
        
    </div>

    <div class='d-flex justify-content-start align-items-center py-1 pl-3'>
        <div class='text-muted'>Thành Tiền</div>
        <div class='ml-auto'> <label class='text-right'>
            <?php echo number_format($thanhtien,0,",","."); ?> VNĐ</label> 
        </div>
        
    </div>
    <div class='row border rounded p-1 my-3'>
        <div class='col-md-6 py-3'>
            <div class='d-flex flex-column align-items start'> <b>Địa Chỉ Giao Hàng</b>
                <p class='text-justify pt-2'><?php echo $ro['Address'] ?></p>
            </div>
        </div>
    </div>
    <div class='pl-3 font-weight-bold'>Trạng Thái Đơn Hàng</div>
    <div class='d-sm-flex justify-content-between rounded my-3 subscriptions'>
        <div><?php echo $ro['UpdateDate'] ?></div>
        <div>Trạng Thái: <?php echo $ro['Status'] ?></div>
    </div>
</div>
</body>
</html>