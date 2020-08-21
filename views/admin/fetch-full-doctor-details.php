<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "das");  
 if(isset($_POST["doctor_id"]))  
 {  
      $query = "SELECT * FROM doctor WHERE id = '".$_POST["doctor_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>