<?php
 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods ,Authorization ');

$data = json_decode(file_get_contents("php://input"), true);

$client_id = $data['cid'];
$fname = $data['fname'];
$lname = $data['lname'];
$email = $data['email'];

 include 'config.php';
 $sql="UPDATE client SET  firstname='$fname',lastname='$lname',email='$email'   WHERE id = $client_id";
 $result = mysqli_query($conn,$sql) or die ("failed to execute query".mysqli_querry_error());
 if (mysqli_query($conn,$sql)) {

    echo json_encode(array('message'=> 'Record updated','status'=>true));

 }else{
    echo json_encode(array('message'=> 'Record not updated','status'=>false));
}
?>
