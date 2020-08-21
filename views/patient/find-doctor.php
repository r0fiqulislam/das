<?php

require('config.php');
if (isset($_POST['submit_find_doctor'])){

    $city = $_POST['city'];
    $doctortype = $_POST['doctor-type'];

    $sql_doctor_donor = "SELECT * FROM doctor WHERE city='$city' and doctortype='$doctortype' ";
    $result_doctor_donor = mysqli_query($conn, $sql_doctor_donor) or die(mysqli_error($conn));

    //$count = mysqli_num_rows($result);
    $count_doctor_donor = mysqli_num_rows($result_doctor_donor);

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Find Doctor</title>
    <link rel="stylesheet" type="text/css" href="views/blood/styles/find-doctor.css">
</head>
<body>
	<div id="find-doctor">
        <form action="" method="POST" onsubmit="return false">


            <label for="city">City:</label>
            <input type="text" id="city" name="city">


            <label for="doctor-type">Doctor Type:</label>
            <select class="doctor-type" id="doctor-type" name="doctor-type">
                <option>Eye specialist</option>
                <option>Orthopedics</option>
                <option>Hepatologist</option>
                <option>Brain Specialist</option>
                <option>Pain Specialist</option>
            </select>
            <input type ="date">
            <input type ="time">
            <input type="time">
            <input type="submit" name="btn_find_doctor" id="btn_find_doctor" value="Find doctor" onclick="return function1();">
        </form>

        <div id="show-doctor">
            <br>
            <h3>Doctor Details</h3>
            <br>
            <table class="table table-stripped table-bordered text-center" id="doctor-details">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                    <th>Doctor Type</th>
                    <th>Contact Number</th>
                    <th>Email</th>                       
                </thead>

                <tbody id="response-doctor">
                    <?php  
                            if(isset($count_doctor) && $count_doctor > 0){
                                while($rows_doctor = mysqli_fetch_array($result_doctor)){
                    ?>
                                    <tr>
                                        <td><?php echo $rows_doctor['f_name'];?></td>
                                        <td><?php echo $rows_doctor['l_name'];?></td>
                                        <td><?php echo $rows_doctor['city'];?></td>
                                        <td><?php echo $rows_doctor['doctortype'];?></td>
                                        <td><?php echo $rows_doctor['contact_number'];?></td>
                                        <td><?php echo $rows_doctor['email'];?></td>                                          
                                    </tr> 
                            
                            <?php

                                }
                            }
                            else{
                                echo "No doctor found";
                            }
                        ?>
                </tbody>


            </table>
        </div>
    </div>
    <script type='text/javascript'>
        function function1(){
            var city       =document.getElementById("city").value;
            var doctor_type =document.getElementById("doctor-type").value;
            var response   =confirm("Are you sure? option1="+city+" option2="+doctor_type);
            return response;
         }
    </script>

</body>
</html>