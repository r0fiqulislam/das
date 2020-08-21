<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "das");  
 if(isset($_POST["patient_id"]))  
 {  
      $query = "SELECT * FROM patient WHERE id = '".$_POST["patient_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>