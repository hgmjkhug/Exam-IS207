<?php
    include "connect.php";
    $mahd = $_GET["mahd"];
    $maphong = $_GET["maphong"];
    $str = "DELETE FROM thue WHERE MaHD = '$mahd' AND MaPhong = '$maphong'";

    if ($conn) {
        $rs = $conn->query($str);
    } 
?>
