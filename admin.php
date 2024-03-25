<?php

//Kết nối mySQLi
require("sql_connect.php");

// Lấy dữ liệu nhân viên
//$sql = "SELECT * FROM nhanvien ORDER BY Ma_NV ASC";
$sql = "SELECT nv.Ma_NV, nv.Ten_NV, nv.Phai, nv.Noi_Sinh, pb.Ten_Phong, nv.Luong
FROM nhanvien nv
INNER JOIN phongban pb ON nv.Ma_Phong = pb.Ma_Phong
ORDER BY nv.Ma_NV ASC";
$result = mysqli_query($connection, $sql);

// Tạo bảng HTML
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>";
echo "<th colspan='7'>THÔNG TIN NHÂN VIÊN</th>";
echo "</tr>";
echo "<tr>";
echo "<th>Mã Nhân Viên</th>";
echo "<th>Tên Nhân Viên</th>";
echo "<th>Giới Tính</th>";
echo "<th>Nơi Sinh</th>";
echo "<th>Tên Phòng</th>";
echo "<th>Lương</th>";
echo "<th>Action</th>";
echo "</tr>";

// Hiển thị danh sách nhân viên
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
  $i++;
  echo "<tr>";
  echo "<td>" . $row["Ma_NV"] . "</td>";
  echo "<td>" . $row["Ten_NV"] . "</td>";
  echo "<td>";
  if ($row["Phai"] == "NAM") {
    echo "<img src='man.png' width='50' height='50'>";
  } else {
    echo "<img src='woman.png' width='50' height='50'>";
  }
  echo "</td>";
  echo "<td>" . $row["Noi_Sinh"] . "</td>";
  echo "<td>" . $row["Ten_Phong"] . "</td>";
  echo "<td>" . $row["Luong"] . "</td>";
  echo "<td><a href='edit.php?Ma_NV=" . $row["Ma_NV"] . "'>Sửa</a> | <a href='delete.php?Ma_NV=" . $row["Ma_NV"] . "'>Xóa</a> | <a href='add.php?Ma_NV=" . $row["Ma_NV"] . "'>Thêm</a> </td>";
  echo "</tr>";

  // Phân trang
  if ($i % 5 == 0) {
    echo "<tr><td colspan='6'><a href='?page=" . ($i / 5 + 1) . "'>Trang tiếp theo</a></td></tr>";
  }
}

echo "</table>";

// Đóng kết nối
mysqli_close($connection);

?>
