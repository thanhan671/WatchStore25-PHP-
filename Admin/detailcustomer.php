
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sacle=1, maximun-scale=1">
    <title>Customer Details - WS25</title>
    <link rel="shortcut icon" type="image/png" href="Images/icon.png">
    <link rel = "stylesheet" href = "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="style.css">
</head>
<main>
        <hr />
        <div class="recent-grid">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h3>Khách Hàng</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%">
                            <?php
                        $id = $_GET['UserName'];

                        include("db_connect.php");
                        
                        $sql = ("SELECT * FROM customer WHERE UserName = '$id'");
                        $kq = mysqli_query($conn,$sql);

                        while($row = mysqli_fetch_row($kq)){
                            echo "
                                <tr>
                                    <td>Tên Khách Hàng:</td>
                                    <td>$row[3]</td>
                                </tr>
                                <tr>
                                    <td>Số Điện Thoại:</td>
                                    <td>$row[5]</td>
                                </tr>
                                <tr>
                                    <td>Địa Chỉ:</td>
                                    <td>$row[7]</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>$row[2]</td>
                                </tr>
                                <tr>
                                    <td>Ngày Sinh:</td>
                                    <td>$row[6]</td>
                                </tr>
                                ";
                        };

                        mysqli_close($conn);

                        ?>
                            </table>
                            <div style="margin-top: 10px">
                                <a href ="customer.php"><img src="Images/back.png" alt="back.png" width="30px" height="30px"></img></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
