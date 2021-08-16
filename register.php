<?php
    session_start();

    include "db_connect.php";
    
    if(isset($_POST['UserName']) 
    && isset($_POST['PassWord']) 
    && isset($_POST['Email'])
    && isset($_POST['Name'])
    && isset($_POST['Gender'])
    && isset($_POST['PhoneNumber'])
    && isset($_POST['DateOfBirth'])
    && isset($_POST['Address'])) {
        
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $UserName = validate($_POST['UserName']);
        $Password = validate($_POST['PassWord']);
        $Email = validate($_POST['Email']);
        $Name = validate($_POST['Name']);
        $Gender = validate($_POST['Gender']);
        $PhoneNumber = validate($_POST['PhoneNumber']);
        $DateOfBirth = validate($_POST['DateOfBirth']);
        $Address = validate($_POST['Address']);

        if(empty($UserName)) {
            header("Location: account.php?error=Tên đăng nhập là bắt buộc");
            exit();

        } else if(empty($Email)) {
            header("Location: account.php?error=Email là bắt buộc");
            exit();

        } else if(empty($Password)) {
            header("Location: account.php?error=Mật khẩu là bắt buộc");
            exit();

        } else if(empty($Name)) {
            header("Location: account.php?error=Tên người dùng là bắt buộc");
            exit();

        } else if(empty($Gender)) {
            header("Location: account.php?error=Giới tính là bắt buộc");
            exit();

        } else if(empty($PhoneNumber)) {
            header("Location: account.php?error=Số điện thoại là bắt buộc");
            exit();

        } else if(empty($DateOfBirth)) {
            header("Location: account.php?error=Ngày sinh là bắt buộc");
            exit();

        } else if(empty($Address)) {
            header("Location: account.php?error=Địa chỉ là bắt buộc");
            exit();

        } else {

            $check_UserName = "SELECT * FROM customer WHERE UserName = '$UserName'";
            $check_result = mysqli_query($conn, $check_UserName);

            if(mysqli_num_rows($check_result) === 1) {
                header("Location: account.php?error=Tên đăng nhập đã tồn tại");
                exit();
            }

            $sql = "INSERT INTO customer
                    VALUES ('$UserName', '$Password', '$Email', '$Name', '$Gender', '$PhoneNumber', '$DateOfBirth', '$Address')";
            $result = mysqli_query($conn, $sql);

            if($result) {
                $sql_login = "SELECT * FROM customer WHERE UserName = '$UserName'";
                $login_result = mysqli_query($conn, $sql_login);
                
                $row = mysqli_fetch_assoc($login_result);
                $_SESSION['UserName'] = $row['UserName'];
                $_SESSION['Name'] = $row['Name'];

                $cart = "SELECT * FROM cart WHERE UserName = '$UserName'";
                $cart_result = mysqli_query($conn, $cart);
                $countRecord = 0;
                while($row = mysqli_fetch_row($cart_result)){
                    $countRecord += $row[4];
                };
                $_SESSION['cartCount'] = $countRecord;


                header("Location: index.php");

            } else {
                header("Location: account.php?error=Thông tin không hợp lệ");
                exit();
            } 
        }
    }

    mysqli_close($conn);

?>