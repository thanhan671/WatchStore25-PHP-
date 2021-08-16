<?php
    session_start();

    include "db_connect.php";
    if(isset($_POST['UserName']) && isset($_POST['PassWord'])) {
        
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $UserName = validate($_POST['UserName']);
        $Password = validate($_POST['PassWord']);

        if(empty($UserName)) {
            header("Location: account.php?error=Tên đăng nhập là bắt buộc");
            exit();

        } else if(empty($Password)) {
            header("Location: account.php?error=Mật khẩu là bắt buộc");
            exit();

        } else {
            $sql = "SELECT * FROM customer WHERE UserName = '$UserName' and PassWord = '$Password'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if($UserName === $row['UserName'] && $Password === $row['PassWord']) {
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
                }
            } else {
                header("Location: account.php?error=Sai tài khoản đăng nhập hoặc mật khẩu");
                exit();
            }
            
        }
    }
    else {
        header("Location: account.php?error");
        exit();
    }

    mysqli_close($conn);
    
?>