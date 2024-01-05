<html>
<head>
 <meta charset="UTF-8">
 <script src="jquery.js"></script>
 <script>
 $(document).ready(function() {
 $("#Submit").click(function() {
 var makh = $("#makh").val();
 var tenkh = $("#tenkh").val();
 var diachi = $("#diachi").val();
 var sdt = $("#sdt").val();
 $.post("demoQues1.php", {
 makh: makh,
 tenkh: tenkh, 
 diachi: diachi,
 sdt:sdt
 },
 function(data, status) {
 if (status == "success") {
 $("#iddiv").html("Thêm thành công."); 
 }
 else
 {
 $("#iddiv").html("Thêm thất bại.");
 }
 }
 )
 });
 });
 </script>
</head>
<body>
 <table>
 <tr>
 <td>Mã khách hàng</td>
 <td><input type="text" id="makh"></td>
 </tr>
 <tr>
 <td>Họ tên khách hàng</td>
 <td><input type="text" id="tenkh"></td>
 </tr>
 <tr>
 <td>Địa chỉ</td>
 <td><input type="text" id="diachi"></td>
 </tr>
 <tr>
 <td>Điện thoại</td>
 <td><input type="text" id="sdt"></td>
 </tr>
 </table>
 <button id="Submit" value="Thêm">Them</button>
 <div id="iddiv"></div>
</body>
</html>
<?php
 include "conn.php";
 $MaKH = $_POST['makh'];
 $TenKH = $_POST['tenkh'];
 $DiaChi = $_POST['diachi'];
 $SDT = $_POST['sdt'];
 $str="insert into khachhang values ('$MaKH','$TenKH','$DiaChi','$SDT')";
 $rs=$connect->query($str);
?>
