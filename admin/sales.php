<?php
include 'database.php';


if (isset($_GET['type'])) {
    $type = $_GET['type'];

    switch ($type) {
        case 'category':
            $result = $con->query("SELECT DISTINCT category FROM productlist");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['category'] . "'>" . $row['category'] . "</option>";

            }
            break;

            case 'category':
            $result = $con->query("SELECT DISTINCT category FROM productlist");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['pid'] . "'>" . $row['pid'] . "</option>";
                
            }
            break;

        case 'subcategory':
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
                $result = $con->query("SELECT DISTINCT subcategory FROM productlist WHERE category = '$category'");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['subcategory'] . "'>" . $row['subcategory'] . "</option>";
                }
            }
            break;

        case 'brand':
            if (isset($_GET['subcategory'])) {
                $subcategory = $_GET['subcategory'];
                $result = $con->query("SELECT DISTINCT brand FROM productlist WHERE subcategory = '$subcategory'");
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

        case 'mrp':
            if (isset($_GET['pname'])) {
                $pname = $_GET['pname'];
                $result = $con->query("SELECT DISTINCT mrp FROM productlist WHERE pname = '$pname'");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['mrp'] . "'>" . $row['mrp'] . "</option>";

                }
            }
            break;

            case 'pqty':
            if (isset($_GET['pname'])) {
                $pname = $_GET['pname'];
                $result = $con->query("SELECT DISTINCT pqty FROM productlist WHERE pname = '$pname'");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['pqty'] . "'>" . $row['pqty'] . "</option>";

                }
            }
            break;
    }
}

$con->close();
?>



