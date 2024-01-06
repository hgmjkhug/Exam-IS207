<?php
include("conn.php");

// Lấy danh sách tên khách hàng từ database
$selectTenKH = "SELECT TenKH FROM khachhang";
$resultTenKH = $conn->query($selectTenKH);
$customers = array();

if ($resultTenKH) {
    while ($row = $resultTenKH->fetch_assoc()) {
        $customers[] = $row['TenKH'];
    }
    $resultTenKH->free_result();  // Giải phóng bộ nhớ
} else {
    echo "<option value=''>No customers found</option>";
}

// Lấy danh sách mã hóa đơn ứng với tên khách hàng được chọn
if (isset($_GET['TenKH'])) {
    $selectedCustomer = $conn->real_escape_string($_GET['TenKH']);
    $selectMaHD = "SELECT h.MaHD FROM hoadon h
                    JOIN khachhang k ON h.MaKH = k.MaKH
                    WHERE k.TenKH = '$selectedCustomer'";

    $resultMaHD = $conn->query($selectMaHD);
    $invoices = array();

    if ($resultMaHD) {
        while ($row = $resultMaHD->fetch_assoc()) {
            $invoices[] = $row['MaHD'];
        }
        $resultMaHD->free_result();  // Giải phóng bộ nhớ
    }
} else {
    $invoices[] = '';  // Chọn mặc định
}

$conn->close();
?>

<html>
    <form method='GET'>
        <label for='TenKH'>Tên khách hàng: </label>
        <select name='TenKH' id='TenKH'>
            <option disabled selected>-- Chọn khách hàng --</option>

            <?php
            foreach ($customers as $customer) {
                $selected = ($_GET['TenKH'] ?? '') == $customer ? 'selected' : '';
                echo "<option value='" . htmlspecialchars($customer, ENT_QUOTES) . "' $selected>" . htmlspecialchars($customer) . "</option>";
            }
            ?>
        </select><br>

        <label for='MaHD'>Mã hóa đơn: </label>
        <select name='MaHD' id='MaHD'>
            <option disabled selected>-- Chọn mã hóa đơn --</option>

            <?php
            foreach ($invoices as $invoice) {
                $selected = ($_GET['MaHD'] ?? '') == $invoice ? 'selected' : '';
                echo "<option value='" . htmlspecialchars($invoice, ENT_QUOTES) . "' $selected>" . htmlspecialchars($invoice) . "</option>";
            }
            ?>
        </select><br>

        <!-- Remove the submit button -->

        <!-- Use JavaScript to trigger form submission automatically -->
        <script>
            document.getElementById('TenKH').addEventListener('change', function() {
                this.form.submit();
            });
        </script>
    </form>
</html>
