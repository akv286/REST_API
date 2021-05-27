<?php
 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods ,Authorization ');

$data = json_decode(file_get_contents("php://input"), true);

$search_value = $data['search'];
 
 include 'config.php';
 $sql=" SELECT * FROM client   WHERE firstname LIKE '%$search_value%'";

 $result = mysqli_query($conn,$sql) or die ("failed to execute query".mysqli_querry_error());
 if (mysqli_num_rows($result) > 0) {
    ( $row = mysqli_fetch_all($result, MYSQLI_ASSOC));
    
     echo json_encode($row);

 }else{
    echo json_encode(array('message'=> 'no records found','status'=>false));
}
?>
