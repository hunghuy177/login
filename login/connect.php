<?php
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn new mysqli ('localhost' 'root', '', 'test');
    if ($conn->connect_error) {
        die('Kết nối bị lỗi: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into registration(userName,email,password) values(?,?,?)");
        $stmt->bind_param("sss", $userName, $email, $password);
        if ($stmt->execute()) {
            echo "Đăng Ký Thành Công!";
        } else {
            echo "Lỗi trong quá trình đăng ký.";
        }
        $stmt->close();
        $conn->close();
    }
?>
