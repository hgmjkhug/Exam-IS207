<?php
    include "connect.php";
    $mahd = $_GET["mahd"];
    $maphong = $_GET["maphong"];
    $str = "INSERT INTO thue(MaHD, MaPhong)  VALUES ('$mahd', '$maphong')";

    if ($conn) {
        $rs = $conn->query($str);
    } 
?>
