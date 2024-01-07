<?php
    include "connect.php";
    $id = $_POST["id"];
    $str = "SELECT MaHD from hoadon WHERE MaKH = '$id'";
    $rs = $conn->query($str);
    echo "<option>Chọn mã hoá đơn</option>";
    while($row = $rs->fetch_row()) {
        echo "<option value ='".$row[0]."'>".$row[0]."</option>";
    }
    echo "</table>";
?>
