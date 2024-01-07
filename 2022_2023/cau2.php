<html>
<body>
<form method="post">
<?php
include "connect.php";
$str = "SELECT MaKH, TenKH  FROM khachhang";
$rs = $conn->query($str);
echo "Tên khách hàng: ";
echo "<select name='MaKH'>";
echo "<option>Chọn Tên khách hàng</option>";
while ($row = $rs->fetch_row()) {
    echo "<option value='$row[0]'>" . $row[1] . "</option>";
}
echo "</select>";
?>
<table>
<tr>
    <td>Mã hóa đơn</td>
    <td><input type="text" name="MaHD"></td>
</tr>
<tr>
    <td>Tên hóa đơn</td>
    <td><input type="text" name="TenHD"></td>
</tr>
<tr>
    <td>Tổng tiền</td>
    <td><input type="text" name="TongTien"></td>
</tr>
</table>
<button id="Submit" value="Thêm">Thêm</button>
</form>
<div id="result"></div>
</body>
</html>

<?php
include "connect.php";
$MaKH = isset($_POST['MaKH']) ? $_POST['MaKH'] : '';
$MaHD = isset($_POST['MaHD']) ? $_POST['MaHD'] : '';
$TenHD = isset($_POST['TenHD']) ? $_POST['TenHD'] : '';
$TongTien = isset($_POST['TongTien']) ? $_POST['TongTien'] : '';

if (!empty($MaKH) && !empty($MaHD) && !empty($TenHD) && !empty($TongTien)) {
    $str = "INSERT INTO hoadon VALUES ('$MaHD', '$TenHD', '$MaKH', '$TongTien')";
    $rs = $conn->query($str);
} 
?>
