<?php
 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods ,Authorization ');

$data = json_decode(file_get_contents("php://input"), true);

$client_id = $data['cid'];
 
 include 'config.php';
 $sql="DELETE FROM client WHERE id = {$client_id}";

 $result = mysqli_query($conn,$sql) or die ("failed to execute query".mysqli_query_error());
 if (mysqli_query($conn,$sql)) {

    echo json_encode(array('message'=> 'Record deleted','status'=>true));

 }else{
    echo json_encode(array('message'=> 'Record not deleted','status'=>false));
}
?>