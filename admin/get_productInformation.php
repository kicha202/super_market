<?php
include 'database.php';


if (isset($_GET['type'])) {
    $type = $_GET['type'];

    switch ($type) {
        case 'category':
            $result = $con->query("SELECT DISTINCT category FROM categorylist");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['category'] . "'>" . $row['category'] . "</option>";
            }
            break;

        case 'subcategory':
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
                $result = $con->query("SELECT DISTINCT subcategory FROM subcategorylist WHERE category = '$category'");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['subcategory'] . "'>" . $row['subcategory'] . "</option>";
                }
            }
            break;

        case 'brand':
            if (isset($_GET['subcategory'])) {
                $subcategory = $_GET['subcategory'];
                $result = $con->query("SELECT DISTINCT brand FROM brandlist WHERE subcategory = '$subcategory'");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['brand'] . "'>" . $row['brand'] . "</option>";
                }
            }
            break;

        case 'pname':
            if (isset($_GET['brand'])) {
                $brand = $_GET['brand'];
                $result = $con->query("SELECT DISTINCT pname FROM productlist WHERE brand = '$brand'");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['pname'] . "'>" . $row['pname'] . "</option>";
                }
            }
            break;
    }
}

$con->close();
?>



