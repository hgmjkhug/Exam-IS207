<?php
include("conn.php");
?>
<form method='POST'>
    <label for='TenKH'>Tên khách hàng: </label>
    <select name='TenKH' id='TenKH'>
        <option disabled selected>-- Chọn khách hàng --</option>

        <?php
        $selectTenKH = "SELECT TenKH FROM khachhang";
        $result = $conn->query($selectTenKH);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . htmlspecialchars($row['TenKH'], ENT_QUOTES) . "'>" . htmlspecialchars($row['TenKH']) . "</option>";
            }
            $result->free_result();  // Free the result set
        } else {
            echo "<option value=''>No customers found</option>";
        }
        ?>
    </select><br>

    <label for='MaHD'>Mã hóa đơn: </label>
    <input type='text' name='MaHD' placeholder='Mã hóa đơn'><br>

    <label for='TenHD'>Tên hóa đơn: </label>
    <input type='text' name='TenHD' placeholder='Tên hóa đơn'><br>

    <label for='TongTien'>Tổng tiền: </label>
    <input type='text' name='TongTien' placeholder='Tổng tiền'><br>

    <input type='submit' name='submit' value='Thêm'>
</form>
<?php
if (isset($_POST["submit"]) && $_POST["submit"] == "Thêm") {
    $TenKH = isset($_POST["TenKH"]) ? $_POST["TenKH"] : '';
    $MaHD = isset($_POST["MaHD"]) ? $_POST["MaHD"] : '';
    $TenHD = isset($_POST["TenHD"]) ? $_POST["TenHD"] : '';
    $TongTien = isset($_POST["TongTien"]) ? $_POST["TongTien"] : '';

    if ($TenKH && $MaHD && $TenHD && $TongTien) {
        // Retrieve MaKH based on the selected TenKH
        $getMaKHQuery = "SELECT MaKH FROM khachhang WHERE TenKH = '$TenKH'";
        $maKhResult = $conn->query($getMaKHQuery);

        if ($maKhResult && $maKhResult->num_rows > 0) {
            $maKhRow = $maKhResult->fetch_assoc();
            $MaKH = $maKhRow['MaKH'];

            // Insert into hoadon table
            $sql = "INSERT INTO hoadon (MaKH, MaHD, TenHD, TongTien) VALUES ('$MaKH','$MaHD', '$TenHD', '$TongTien')";

            if ($conn->query($sql) === TRUE) {
                echo "Thêm thành công!";
            } else {
                echo "Thêm thất bại: " . $conn->error;
            }
        } else {
            echo "Không tìm thấy thông tin khách hàng";
        }

        // Free the result set
        $maKhResult->free_result();
    } else {
        echo "Vui lòng nhập đầy đủ thông tin";
    }
}

$conn->close();
?>