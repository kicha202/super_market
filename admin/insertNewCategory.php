<?php

require 'database.php';

if(isset($_POST['save_newParty']))
{
    
    $category = mysqli_real_escape_string($con, $_POST['category']);



    if($category == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }


    $check=mysqli_query($con,"select * from categorylist  where  category='$category'");
    $checkrows=mysqli_num_rows($check);
    if($checkrows>0) {

    //echo "Already Registered!!!!";

        $res = [
            'status' => 200,
            'message' => '<p style="color:red;font-weight:bold;font-size:12px;text-align:center;">Already Registered!!!, try different name</p>'
        ];
        echo json_encode($res);
        return;


    }else{

    $query = "INSERT INTO categorylist (category) VALUES ('$category')";
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