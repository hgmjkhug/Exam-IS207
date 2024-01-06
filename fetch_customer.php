<?php
include("conn.php");

if (isset($_GET['cusNumber'])) {
    $cusNumber = (int)$_GET['cusNumber'];

    // Adjust your SQL query to join khachhang and hoadon tables
    $sql = "SELECT k.MaKH, k.TenKH, SUM(h.TongTien) as TongTien
        FROM khachhang k
        JOIN hoadon h ON k.MaKH = h.MaKH
        GROUP BY k.MaKH
        ORDER BY TongTien DESC LIMIT $cusNumber";


    $result = $conn->query($sql);

    $customers = array();

    while ($row = $result->fetch_assoc()) {
        $customers[] = $row;
    }

    // Close the database connection
    $conn->close();

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($customers);
}
?>
