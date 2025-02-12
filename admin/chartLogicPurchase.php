<?php
require 'database.php';

$filterpurchase = $_GET['filterpurchase'] ?? 'date'; // date, month, or year

$query = "";

if ($filterpurchase === 'date') {
    $query = "
        SELECT DATE(date) as date, SUM(pqty) as qty,pname
        FROM productlist
        GROUP BY pname
        ";
} elseif ($filterpurchase === 'month') {
    $query = "
        SELECT DATE(date) as date, SUM(pqty) as qty,pname
        FROM productlist
        GROUP BY pname
        ";
} elseif ($filterpurchase === 'year') {
    $query = "
        SELECT DATE(date) as date, SUM(pqty) as qty,pname
        FROM productlist
        GROUP BY pname
        ";
}

$result = $con->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>
