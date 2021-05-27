<?php
 
header('Content-Type: application/json');
header('Acc ess-Control-Allow-Origin:*');
 include 'config.php';
 $sql="SELECT * FROM client";
 $result = mysqli_query($conn,$sql) or die ("failed to execute query".mysqli_querry_error());
 if (mysqli_num_rows($result) > 0) {
    ( $row = mysqli_fetch_all($result, MYSQLI_ASSOC));
    
     echo json_encode($row);

    

 }else{
    echo json_encode(array('message'=> 'no records found','status'=>false));
}
?>
