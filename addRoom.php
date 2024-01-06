<?php
include("conn.php");

$MaPhong = isset($_GET["MaPhong"]) ? $_GET["MaPhong"] : '';
$TenPhong = isset($_GET["TenPhong"]) ? $_GET["TenPhong"] : '';
$TinhTrang = isset($_GET["TinhTrang"]) ? $_GET["TinhTrang"] : '';
$LoaiPhong = isset($_GET["LoaiPhong"]) ? $_GET["LoaiPhong"] : '';

echo "<form action='' method='GET'>";
echo "Mã phòng: ";
echo "<input type='text' name='MaPhong' placeholder='Mã phòng'><br>";

echo "Tên phòng: ";
echo "<input type='text' name='TenPhong' placeholder='Tên phòng'><br>";

echo "Tình trạng: ";
echo "<select name='TinhTrang'>
        <option value='Trống' " . ($TinhTrang === 'Trống' ? 'selected' : '') . ">Trống</option>
        <option value='Đã đặt' " . ($TinhTrang === 'Đã đặt' ? 'selected' : '') . ">Đã đặt</option>
      </select><br>";

echo "Loại phòng: ";
echo "<select name='LoaiPhong'>
        <option value='Đơn' " . ($LoaiPhong === 'Đơn' ? 'selected' : '') . ">Phòng đơn</option>
        <option value='Đôi' " . ($LoaiPhong === 'Đôi' ? 'selected' : '') . ">Phòng đôi</option>
      </select><br>";
echo "<input type='submit' name='submit' value='Thêm'></form>";

if (isset($_GET["submit"]) && $_GET["submit"] == "Thêm") {
    if ($MaPhong && $TenPhong && $TinhTrang && $LoaiPhong) {
        $sql = "INSERT INTO phong (MaPhong, TenPhong, TinhTrang, LoaiPhong) VALUES ('$MaPhong', '$TenPhong', '$TinhTrang', '$LoaiPhong')";
        if ($conn->query($sql) == TRUE) {
            echo "Thêm thành công";
        } else {
            echo "Thêm thất bại: " . $conn->error;
        }
    } else {
        echo "Vui lòng nhập đầy đủ thông tin";
    }
}
