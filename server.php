<?php
// Set the content type header to JSON
header('Content-Type: application/json');

// Database connection details
include('conn.php');

// Query to retrieve data from the database (replace with your actual query)
$sql = "SELECT TenKH FROM khachhang";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch data and prepare a response
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Send the response back to the client as JSON
    echo json_encode(array( 'data' => $data));
} else {
    echo json_encode(array('message' => 'No data found'));
}

// Close the database connection
$conn->close();
?>
