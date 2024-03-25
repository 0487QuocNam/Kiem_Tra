<?php

//Kết nối mySQLi
require("sql_connect.php");

// Khởi tạo session
session_start();

// Lấy dữ liệu đăng nhập
$username = $_POST["Username"];
$password = $_POST["Password"];

// Kiểm tra tài khoản
$sql = "SELECT * FROM taikhoan WHERE Username = '$username' AND Password = '$password'";
$result = mysqli_query($connection, $sql);

// Xử lý kết quả
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);

  // Lưu thông tin user vào session
  $_SESSION["User_id"] = $row["ID"];
  $_SESSION["Username"] = $row["Username"];
  $_SESSION["Role"] = $row["Role"];

  // Kiểm tra role
if ($_SESSION["Role"] == "user") {
    header("Location: list.php");
  } else if ($_SESSION["Role"] == "admin") {
    header("Location: admin.php");
}
else {
  echo "Đăng nhập thất bại!";
}
}

?>
