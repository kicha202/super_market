<?php
include 'database.php';


$id = $_POST['id'];
$date = $_POST['date'];
$time = $_POST['time'];
$category = $_POST['category'];
$subcategory = $_POST['subcategory'];
$brand = $_POST['brand'];
$pname = $_POST['pname'];
$qty = $_POST['qty'];

$mrp = $_POST['mrp'];
$amt = $_POST['amt'];









for($i = 0;$i < count($pname); $i++){

		$check=mysqli_query($con,"select * from issuesstock where id='$id[$i]' and date='$date[$i]' and time='$time[$i]' and category='$category[$i]' and subcategory='$subcategory[$i]' and brand='$brand[$i]' and pname='$pname[$i]' and qty='$qty[$i]' and mrp='$mrp[$i]' and amt='$amt[$i]' ");
	
	$checkrows=mysqli_num_rows($check);
	if($checkrows>0) {
		echo "Already Registered!!!!";
	}else {

		$sql = "INSERT INTO issuesstock (id,date,time,category,subcategory,brand,pname,qty,mrp,amt)
		VALUES ('$id[$i]','$date[$i]','$time[$i]','$category[$i]','$subcategory[$i]','$brand[$i]','$pname[$i]','$qty[$i]','$mrp[$i]','$amt[$i]')";	
		$insert = $con->query($sql);

		
	}
}

	 for($i = 0;$i < count($pname); $i++){
		$sql = "UPDATE productlist SET pqty =pqty - '$qty[$i]'  where category = '$category[$i]' and subcategory= '$subcategory[$i]' and brand = '$brand[$i]' and pname='$pname[$i]' ";	
		//$sql1 = "UPDATE purchasepro SET pqty = pqty - qty WHERE pid = ?";	
		$insert = $con->query($sql);


}



if($insert == true)
{
	echo "1";	
}
else{
	echo "0";	
}
?>

