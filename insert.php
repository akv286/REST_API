<?php
 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods ,Authorization ');

 /*
  $val1=$_REQUEST['fname'];
  $val2=$_REQUEST['lname'];
  $val3=$_REQUEST['email'];
  
  

$array['fname']="$val1";
$array['lname']="$val2";
$array['email']="$val3"; 


function myjson($array){
    return json_encode($array);
}
 $raw = myjson($array); */

$data = json_decode(file_get_contents("php://input"), true);
//$data = json_decode($raw, true);

$fname = $data['fname'];
$lname = $data['lname'];
$email = $data['email'];

 include 'config.php';
 $sql="INSERT INTO client(firstname,lastname,email)VALUES( '{$fname}','{$lname}','{$email}' )";
 
 if (mysqli_query($conn,$sql)) {
    
    echo json_encode(array('message'=> 'Record inserted','status'=>true));

 }else{
    echo json_encode(array('message'=> 'Record not inserted','status'=>false));
}
?>
