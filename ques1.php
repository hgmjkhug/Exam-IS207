<?php
include("conn.php");

echo "<form method='GET'>";
echo "Mã khách hàng: ";
echo "<input type='text' name='MaKH' placeholder='Mã khách hàng'><br>";

echo "Tên khách hàng: ";
echo "<input type='text' name='TenKH' placeholder='Tên khách hàng'><br>";

echo "Số điện thoại: ";
echo "<input type='text' name='SDT' placeholder='Số điện thoại'><br>";

echo "Căn cước công dân: ";
echo "<input type='text' name='CCCN' placeholder='Căn cước công dân'><br>";
echo "<input type='submit' name='submit' value='Thêm'></form>";

$MaKH = isset($_GET["MaKH"]) ? $_GET["MaKH"] : '';
$TenKH = isset($_GET["TenKH"]) ? $_GET["TenKH"] : '';
$SDT = isset($_GET["SDT"]) ? $_GET["SDT"] : '';
$CCCN = isset($_GET["CCCN"]) ? $_GET["CCCN"] : '';

if (isset($_GET["submit"]) && $_GET["submit"] == "Thêm") {
    if ($MaKH && $TenKH && $SDT && $CCCN) {
        $sql = "INSERT INTO khachhang (MaKH, TenKH, SDT, CCCN) VALUES ('$MaKH', '$TenKH', '$SDT', '$CCCN')";
        if ($conn->query($sql) == TRUE) {
            echo "Thêm thành công";
        } else {
            echo "Thêm thất bại: " . $conn->error;
        }
    } else {
        echo "Vui lòng nhập đầy đủ thông tin";
    }
}
