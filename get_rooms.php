<?php
include("conn.php");

if (isset($_GET['MaHD'])) {
    $selectedInvoice = $_GET['MaHD'];

    $selectedInvoice = $conn->real_escape_string($selectedInvoice);

    $selectRooms = "SELECT p.MaPhong, p.LoaiPhong
                    FROM phong p
                    JOIN thue t ON p.MaPhong = t.MaPhong
                    WHERE t.MaHD = '$selectedInvoice'";

    $resultRooms = $conn->query($selectRooms);

    $rooms = array();

    if ($resultRooms) {
        while ($row = $resultRooms->fetch_assoc()) {
            $rooms[] = $row;
        }
        $resultRooms->free_result();  // Free the result set
    }

    header('Content-Type: application/json');
    echo json_encode($rooms);
} else {
    echo json_encode(array('error' => 'Invalid request'));
}

$conn->close();
?>
