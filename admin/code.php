
<?php 
include 'database.php';
session_start();
if(!isset($_SESSION["id"]) && !isset($_SESSION["user1"]))
{
  echo "<script>window.open('../index.php','_self')</script>";
}
?>








<?php

 date_default_timezone_set('Asia/Calcutta'); //date and time india based

include('database.php');

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{

        //$previousmonth = $_POST['previousmonth'];
        // $currentdate = $_POST['currentdate'];
        // $currenttime = $_POST['currenttime'];

       // echo $previousmonth;

    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);

        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $category = $row['0'];
                $subcategory = $row['1'];
                $brand = $row['2'];
                $pname = $row['3'];

                $pqty = $row['4'];
                $mrp = $row['5'];

                $date = date ('Y-m-d', strtotime($date));

                $date = $row['6'];

            
               



                $studentQuery = "INSERT INTO productlist (category,subcategory,brand,pname,pqty,
mrp,date) VALUES ('$category','$subcategory','$brand','$pname','$pqty',
'$mrp','$date')";
                $result = mysqli_query($con, $studentQuery);
                $msg = true;
            }
            else
            {
                $count = "1";

            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <i class='uil uil-check me-2'></i>
                            <p style='font-size:14px;font-weight:bold;'>Successfully Imported</p>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>                                      
                                        
                    </div>";
            header('Location: UploadExcelFile.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: UploadExcelFile.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <i class='uil uil-check me-2'></i>
                            <p>Invalid File Format</p>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>                                      
                                        
                    </div>

                    ";
        header('Location: UploadExcelFile.php');
        exit(0);
    }
}
?>
