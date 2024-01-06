<?php
include("conn.php");

echo "<form id='customerForm' method='GET'>";
$cusNumber = isset($_GET['cusNumber']) ? $_GET['cusNumber'] : '';
echo "<label for='cusNumber'>Số lượng khách hàng</label>";
echo "<input type='text' name='cusNumber' id='cusNumber' value='$cusNumber'>";
echo "</form>";

echo " <b id='enteredNumber'></b> khách hàng có tổng tiền thuê nhiều nhất";
?>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <table border='1' cellspacing='0' cellpadding='10' id='customerTable'>
        <tr>
            <th>
                STT
            </th>
            <th>
                Mã khách hàng
            </th>
            <th>
                Tên khách hàng
            </th>
            <th>
                Tổng tiền thuê
            </th>
        </tr>
    </table>

 <script>
    $(document).ready(function() {
    $('#customerForm').submit(function(e) {
        e.preventDefault();

        // Serialize the form data
        var formData = $('#customerForm').serialize();

        // Render the number of customers to the page
        $('#enteredNumber').text($('#cusNumber').val());

        // Make an AJAX request
        $.ajax({
            url: 'fetch_customer.php',
            method: 'GET',
            data: formData,
            dataType: 'json',
            success: function(data) {
                // Update the table with the received data
                updateTable(data);
            },
            error: function(xhr, status, error) {
                console.error("Error: " + status + " - " + error);
            }
        });
    });

    // Trigger form submission on pressing Enter key
    $('#cusNumber').keyup(function(e) {
        if (e.key === "Enter") {
            $('#customerForm').submit();
        }
    });

    function updateTable(data) {
        // Clear existing table rows
        $('#customerTable tr:not(:first)').remove();

        // Populate the table with the received data
        $.each(data, function(index, customer) {
            var row = '<tr>' +
                '<td>' + (index + 1) + '</td>' +
                '<td>' + customer.MaKH + '</td>' +
                '<td>' + customer.TenKH + '</td>' +
                '<td>' + customer.TongTien + '</td>' +
                '</tr>';
            $('#customerTable').append(row);
        });
    }
});

 </script>
</body>

</html>