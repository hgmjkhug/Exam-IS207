<?php
include("conn.php");
?>
<label for='MaHD'>Mã hóa đơn: </label>
<select name='MaHD' id='MaHD'>
    <option value='' disabled selected></option>
    <?php
    $selectMaHD = "SELECT MaHD FROM hoadon";
    $result = $conn->query($selectMaHD);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . htmlspecialchars($row['MaHD'], ENT_QUOTES) . "'>" . htmlspecialchars($row['MaHD']) . "</option>";
        }
        $result->free_result();  // Free the result set
    } else {
        echo "<option value=''>No customers found</option>";
    } ?>
</select><br>
<?php
echo "<b>Danh sách các phòng còn trống</b><br>";
echo "<table border='1' cellspacing='0' cellpadding='10'>";
echo "<tr>
<th>
    STT
</th>
<th>
    Mã phòng
</th>
<th>
    Tên phòng
</th>
<th>
    Chức năng
</th>
</tr>";
echo "<tr>
<td>
    
</td>
<td>
    
</td>
<td>
    
</td>
<td>
    <button onclick=handleAddBtn() name='add' value='Thêm'>Thêm</button>
</td>
</tr>";
echo "</table>";
echo "<b>Danh sách các phòng đã thêm</b><br>";
echo "<table border='1' cellspacing='0' cellpadding='10'>";
echo "<tr>
<th>
    STT
</th>
<th>
    Mã phòng
</th>
<th>
    Tên phòng
</th>
<th>
    Chức năng
</th>
</tr>";
echo "<tr>
<td>
    
</td>
<td>
    
</td>
<td>

</td>
<td>
    <button onclick=handleDelBtn() name='del' value='Xóa'>Xóa</button>
</td>
</tr>";
echo "</table>";
?>
<script>
    function handleDelBtn() {
        document.getElementById("MaHD").value = "a";
    }
</script>