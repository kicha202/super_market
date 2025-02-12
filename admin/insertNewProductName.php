<?php

require 'database.php';

if(isset($_POST['save_newProduct']))
{
    $category = mysqli_real_escape_string($con, $_POST['category']);

    $subcategory = mysqli_real_escape_string($con, $_POST['subcategory']);

    $brand = mysqli_real_escape_string($con, $_POST['brand']);

    $pname = mysqli_real_escape_string($con, $_POST['pname']);

    $pqty = mysqli_real_escape_string($con, $_POST['pqty']);

    $mrp = mysqli_real_escape_string($con, $_POST['mrp']);

    $date = mysqli_real_escape_string($con, $_POST['date']);
    
    

    if($category == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }


    $check=mysqli_query($con,"select * from productlist  where  category='$category' and  subcategory='$subcategory' and brand='$brand' and pname='$pname' and pqty='$pqty' and mrp='$mrp' and date='$date' ");
    $checkrows=mysqli_num_rows($check);
    if($checkrows>0) {

         $res = [
            'status' => 200,
            'message' => '<p style="color:red;font-weight:bold;font-size:12px;text-align:center;">Already Registered!!!, try different varietyname</p>'
        ];
        echo json_encode($res);
        return;

         }else{

    $query = "INSERT INTO productlist (category,subcategory,brand,pname,pqty,mrp,date) VALUES ('$category','$subcategory','$brand','$pname','$pqty','$mrp','$date')";
    $query_run = mysqli_query($con, $query);



    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => '<p style="color:white;font-weight:bold;font-size:15px;text-align:center;">Created Success</p>'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Created'
        ];
        echo json_encode($res);
        return;
    }
}
}
?>