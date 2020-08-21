<?php

require('config.php');
if (isset($_POST['submit_find_blood'])){

    $city = $_POST['city'];
    $bloodtype = $_POST['blood-type'];

    $sql_blood_donor = "SELECT * FROM blood_donor WHERE city='$city' and bloodtype='$bloodtype' ";
    $result_blood_donor = mysqli_query($conn, $sql_blood_donor) or die(mysqli_error($conn));

    //$count = mysqli_num_rows($result);
    $count_blood_donor = mysqli_num_rows($result_blood_donor);

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Find Blood</title>
    <link rel="stylesheet" type="text/css" href="views/blood/styles/find-blood.css">
</head>
<body>
	<div id="find-blood">
        <form action="" method="POST" onsubmit="return false">


            <label for="city">City:</label>
            <input type="text" id="city" name="city">


            <label for="blood-type">Blood Type:</label>
            <select class="blood-type" id="blood-type" name="blood-type">
                <option>A+</option>
                <option>A-</option>
                <option>B+</option>
                <option>B-</option>
                <option>O+</option>
                <option>O-</option>
                <option>AB+</option>
                <option>AB-</option>
            </select>
            <input type="submit" name="btn_find_blood" id="btn_find_blood" value="Find Blood" onclick="return function1();">
        </form>

        <div id="show-blood-donor">
            <br>
            <h3>Blood Donor Details</h3>
            <br>
            <table class="table table-stripped table-bordered text-center" id="blood-donor-details">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                    <th>Blood Type</th>
                    <th>Contact Number</th>
                    <th>Email</th>                       
                </thead>

                <tbody id="response-blood-donor">
                    <?php  
                            if(isset($count_blood_donor) && $count_blood_donor > 0){
                                while($rows_blood_donor = mysqli_fetch_array($result_blood_donor)){
                    ?>
                                    <tr>
                                        <td><?php echo $rows_blood_donor['f_name'];?></td>
                                        <td><?php echo $rows_blood_donor['l_name'];?></td>
                                        <td><?php echo $rows_blood_donor['city'];?></td>
                                        <td><?php echo $rows_blood_donor['bloodtype'];?></td>
                                        <td><?php echo $rows_blood_donor['contact_number'];?></td>
                                        <td><?php echo $rows_blood_donor['email'];?></td>                                          
                                    </tr> 
                            
                            <?php

                                }
                            }
                            else{
                                echo "No Donor found";
                            }
                        ?>
                </tbody>


            </table>
        </div>
    </div>
    <script type='text/javascript'>
        function function1(){
            var city       =document.getElementById("city").value;
            var blood_type =document.getElementById("blood-type").value;
            var response   =confirm("Are you sure? option1="+city+" option2="+blood_type);
            return response;
         }
    </script>

</body>
</html>