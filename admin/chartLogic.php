<?php
require 'database.php';

$filter = $_GET['filter'] ?? 'date'; // date, month, or year

$query = "";

if ($filter === 'date') {
    $query = "
        SELECT id,DATE(date) as date, SUM(qty) as qty,pname
        FROM issuesstock
        GROUP BY pname
        ";
} elseif ($filter === 'month') {
    $query = "
        SELECT id,DATE_FORMAT(date, '%Y-%m') as date, SUM(qty) as qty,pname
        FROM issuesstock
        GROUP BY pname
        ORDER BY pname";
} elseif ($filter === 'year') {
    $query = "
        SELECT id,YEAR(date) as date, SUM(qty) as qty,pname
        FROM issuesstock
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
