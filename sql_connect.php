<?php

// Thay đổi các giá trị sau cho phù hợp với cấu hình của bạn
$host = "localhost";
$username = "root";
$password = "";
$database = "ql_nhansu";

// Tạo kết nối
$connection = mysqli_connect($host, $username, $password, $database);

// Kiểm tra kết nối
if (!$connection) {
  die("Kết nối thất bại !!!" . mysqli_connect_error());
}

//echo ("Kết nối thành công");

?>
