 <?php  
 if(isset($_POST["doctor_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "das");  
      $query = "SELECT * FROM doctor WHERE id = '".$_POST["doctor_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      ';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <h2>'.$row["id"].'</h2>
                <h2>'.$row["f_name"].'</h2>
                
                <h2>'.$row["l_name"].'</h2>
                <h2>'.$row["email"].'</h2>
                <h2>'.$row["contact_number"].'</h2>
                <h2>'.$row["gender"].'</h2>
                 
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
 