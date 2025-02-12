





<?php
// database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve dates from GET request
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

// SQL query to fetch data between dates
$sql = "SELECT date, SUM(qty) as qty,pname,SUM(mrp)As mrp from issuesstock WHERE date BETWEEN ? AND ? GROUP BY date,pname";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Return data as JSON
echo json_encode($data);

// Close the connection
$conn->close();
?>

