<html>
<body>
<form method="post">
    <table>
        <tr>
            <td>Mã khách hàng</td>
            <td><input type="text" name="MaKH"></td>
        </tr>
        <tr>
            <td>Họ và Tên khách hàng</td>
            <td><input type="text" name="TenKH"></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" name="SDT"></td>
        </tr>
        <tr>
            <td>Căn cước công dân</td>
            <td><input type="text" name="CCCN"></td>
        </tr>
    </table>
    <button id="Submit" value="Thêm">Thêm</button>
</form>
<div id="iddiv"></div>
</body>
</html>

<?php
include "connect.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the POST variables are set
    $MaKH = isset($_POST['MaKH']) ? $_POST['MaKH'] : '';
    $TenKH = isset($_POST['TenKH']) ? $_POST['TenKH'] : '';
    $SDT = isset($_POST['SDT']) ? $_POST['SDT'] : '';
    $CCCN = isset($_POST['CCCN']) ? $_POST['CCCN'] : '';

    // Check if the connection is successful
    if ($conn) {
        $str = "INSERT INTO khachhang VALUES ('$MaKH','$TenKH','$SDT','$CCCN')";
        $rs = $conn->query($str);
    } 
}
?>