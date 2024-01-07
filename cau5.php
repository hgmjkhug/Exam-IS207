<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
Tên khách hàng <select class="makh">
    <?php
        include "connect.php";
        $str = "SELECT MaKH, TenKH FROM khachhang";
        $rs = $conn->query($str);
        echo "<option>Chọn tên khách hàng</option>";
        while($row = $rs->fetch_row())
           {
               echo "<option value ='".$row[0]."'>".$row[1]."</option>";
           }
    ?>
</select>

Mã hoá đơn <select class="mahd">

</select>

<div class="divTable">
    
</div>
<script>
    $(document).ready(function(){
        $('.makh').change(function(){
            var id = $('.makh').val();
            $.post("cau5_1.php", {id: id}, function(data, status){
                if(status === 'success') {
                    $('.mahd').html(data);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.mahd').change(function(){
            var id1 = $('.makh').val();
            var id2 = $('.mahd').val();
            $.post("cau5_2.php", {id1: id1 , id2: id2}, function(data, status){
                if(status === 'success') {
                    $('.divTable').html(data);
                }
            });
        });
    });
</script>
