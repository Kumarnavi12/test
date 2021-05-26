<?php
if(isset($_POST['submit'])) {
 $conn=mysqli_connect('localhost', 'root', '', 'mysql');
    $product_id=$_POST['products'];
    $name=$_POST['name'];
    $phno=$_POST['phno'];
	
if(empty($_POST['timeline_of_purchase'])) {
     $timeline_of_purchase=0;
} else {
    $timeline_of_purchase=$_POST['timeline_of_purchase'];		
}

 if(empty($_POST['stt'])) {
     $state=0;
} else {
$state=$_POST['stt'];
}
if(empty($_POST['externalcode'])) {
    $externalcode=0;
} else {
  $externalcode=$_POST['externalcode'];
}
		
date_default_timezone_set('Asia/Kolkata');
$date=date('y-m-d H:i:s');
		
	$sql="INSERT INTO `poducts`(product_id,name, phno, timeline_of_purchase,state, externalcode,date)VALUES
		 ('" .$product_id."','" .$name."','".$phno."' ,'" .$timeline_of_purchase."','".$state."','".$externalcode."','".$date."')";
		 
	$output = mysqli_query($conn, $sql);
		  
    
    if (!empty($output)) {
        $msg="successfully inserted!!";
    } else {
            $Err="something went wrong";
    }
}

?>