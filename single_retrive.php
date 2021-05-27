<?php
 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');

$data = json_decode(file_get_contents("php://input"), true);

$client_id = $data['cid'];

 include 'config.php';
 $sql="SELECT * FROM client WHERE id = {$client_id}";
 $result = mysqli_query($conn,$sql) or die ("failed to execute query".mysqli_querry_error());
 if (mysqli_num_rows($result) > 0) {
    ( $row = mysqli_fetch_all($result, MYSQLI_ASSOC));
    
     echo json_encode($row);

    

 }else{
    echo json_encode(array('message'=> 'no records found','status'=>false));
}
?>
