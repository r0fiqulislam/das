<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
} else {
    echo "You need to login first to view the dashboard";
    header('Location: admin-login');
}
require('config.php');

//show doctor details
$sql = "SELECT * FROM doctor";
$result = mysqli_query($conn, $sql);
$count_doctor = mysqli_num_rows($result);
//show doctor tickets
$sql_doctor_tickets = "SELECT * FROM doctor_tickets";
$result_doctor_tickets = mysqli_query($conn, $sql_doctor_tickets);
$count_doctor_tickets = mysqli_num_rows($result_doctor_tickets);

//show patient details
$sql_patient = "SELECT * FROM patient";
$result_patient = mysqli_query($conn, $sql_patient);
$count_patient = mysqli_num_rows($result_patient);

//show patient tickets
$sql_patient_tickets = "SELECT * FROM patient_tickets";
$result_patient_tickets = mysqli_query($conn, $sql_patient_tickets);
$count_patient_tickets = mysqli_num_rows($result_patient_tickets);
//total ticket count
$total_ticket_count = $count_patient_tickets + $count_doctor_tickets;


?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="views/admin/scripts/doctor-details.js"></script>
    <script src="views/admin/scripts/patient-details.js"></script>

    <!--Custom CSS Link-->
    <link rel="stylesheet" type="text/css" href="views/admin/style/admin-dashboard.css">
    <!--Font Awesome CDN-->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>   

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <!--NAVBAR-->
    <div class="wrapper">
        <div class="sidebar">
            <h2>DAS Admin</h2>
            <ul>
                <!--Dashboard which will be active on Login-->
                <li><a href="admin-dashboard"><i class="fas fa-th"></i>Dashboard</a></li>
                

                <!--Load Patient Data On Click-->
                <li><a href="javascript:void(0);" id="load-patient-data"><i class="fas fa-user"></i>Patients</a></li>


                <!--Load Doctor's Data on Click-->
                <li><a href="javascript:void(0);" id="load-doctor-data"><i class="fas fa-medkit"></i>Doctors</a></li>


                <!--Load Blood Data on Click-->
                <li><a href="javascript:void(0);" id="load-blood-data"><i class="fas fa-tint"></i>Blood</a></li>


                <!--Load Ticket's Data on Click-->
                <li><a href="#" id="tickets-details-load-link"><i class="fas fa-tags"></i>Tickets</a></li>


                <!--Load Settings on Click-->
                <li><a href="#"><i class="fas fa-cog"></i>Settings</button></a></li>


                <!--Logout-->
                
                <li><a href="admin-logout"><i class="fas fa-power-off"></i>LogOut</button></a></li>
                
                

            </ul>
        </div>
        
        <div class="main_content">
            <div class="header">Welcome!! Have a nice day, <?php echo  $_SESSION['admin_username'] . "#".$_SESSION['admin_id']."!";?></div>



            <!--Start of Dash-->
            <div id="show-statistics">
                <section class="statistics">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="box">
                            <i class="fa fa-users fa-fw bg-primary"></i>
                            <div class="info">
                              <h3><?php echo $count_patient; ?></h3> <span>Patients</span>
                              <p>Total registered patients</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="box">
                            <i class="fa fa-medkit fa-fw danger"></i>
                            <div class="info">
                              <h3><?php echo $count_doctor; ?></h3> <span>Doctors</span>
                              <p>Total registered Doctors</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="box">
                            <i class="fa fa-tags fa-fw success"></i>
                            <div class="info">
                              <h3><?php echo $total_ticket_count; ?></h3> <span>Tickets</span>
                              <p>Total tickets filed</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </section>
            </div>
            <!--End of Dash-->
            
            <!--Start of Patient Details-->
            <div id="show-patient-details">
                <h3>Patient Details</h3>
                <br>
                <input type="text" placeholder="Search by first name" name="find_patient" style="margin-left: 25px;">
                <button id="btn_search_patient" name="btn_search_patient"> Search</button>
                
                <br>
                <br>
                <table class="table table-stripped table-bordered text-center" id="patient-details-table">
                    <thead>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Comtact Number</th>
                        <th>Gender</th>
                        <th>View</th>
                        <th>Edit</th>
                        
                    </thead>

                    <tbody id="response-patient">
                        <?php  
                               if($count_patient > 0){
                                    while($rows_patient = mysqli_fetch_array($result_patient)){

                                        ?>
                                        <tr>
                                            <td><?php echo $rows_patient['id'];?> </td>
                                            <td><?php echo $rows_patient['f_name'];?></td>
                                            <td><?php echo $rows_patient['l_name'];?></td>
                                            <td><?php echo $rows_patient['email'];?></td>
                                            <td><?php echo $rows_patient['contact_number'];?></td>
                                            <td><?php echo $rows_patient['gender'];?></td>
                                            <td><input class="patient_view_data" type="button" name="patient_view" value="View" id="<?php echo $rows_patient['id'];?> "></td>
                                            <td><input class="patient_edit_data" type="button" name="patient_edit" value="Edit" id="<?php echo $rows_patient['id'];?> "></td>
                                            
                                        </tr> 
                                        <?php
        

                                    }
                                }
                        ?>
                    </tbody>


                </table>
            </div>

            
            <div id="patient_dataModal" class="modal fade">  
                <div class="modal-dialog">  
                    <div class="modal-content">  
                        <div class="modal-header">  
                                <h4 class="modal-title">Patient Details</h4>  
                        </div>  
                        <div class="modal-body" id="patient_detail_view">  
                            
                        </div>  
                        <div class="modal-footer">  
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div>  
                    </div>  
                </div>  
            </div>




            
            <div id="edit_data_Modal_patient" class="modal fade">  
                <div class="modal-dialog">  
                    <div class="modal-content">  

                        <div class="modal-header"> 
                            <h4 class="modal-title">Update Patient Details</h4>  
                        </div>  

                        <div class="modal-body"> 

                            <form method="post" id="update_form_patient">  
                                <label>Enter First Name</label>  
                                <input type="text" name="f_name" id="f_name_patient" class="form-control" />  
                                <br />  
                                <label>Enter Last Name</label>  
                                <input type="text" name="l_name" id="l_name_patient" class="form-control" />  
                                <br />
                                <label>Enter Email</label>  
                                <input type="text" name="email" id="email_patient" class="form-control" />  
                                <br />  
                                <label>Enter Contact Number</label>  
                                <input type="text" name="contact_number" id="contact_number_patient" class="form-control" />  
                                <br />
                                <label>Select Gender</label>  
                                <select name="gender" id="gender_patient" class="form-control">  
                                    <option value="Male">Male</option>  
                                    <option value="Female">Female</option>  
                                    <option value="Female">Rather not say</option>
                                </select>  
                                <br />    
                                <input type="hidden" name="id_patient" id="id_patient" />  
                                <input type="submit" name="insert_patient" id="insert_patient" value="Insert" class="btn btn-success" />  
                            </form>  
                            </div>  
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                            </div>  
                    </div>  
                </div>  
            </div>
            <!--End of Patient Details-->            


            <!--End of Doctor Details-->
            <div id="show-doctor-details">
                <h3>Doctor Details</h3>
                <br>
                <input type="text" placeholder="Search by first name" name="find_doctor" style="margin-left: 25px;">
                <button id="btn_search_doctor" name="btn_search_doctor"> Search</button>
                
                <br>
                <br>
                <table class="table table-stripped table-bordered text-center" id="doctor-details-table">
                    <thead>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Comtact Number</th>
                        <th>Gender</th>
                        <th>View</th>
                        <th>Edit</th>
                        
                    </thead>

                    <tbody id="response-doctor">
                        <?php  
                               if($count_doctor > 0){
                                    while($rows = mysqli_fetch_array($result)){

                                        ?>
                                        <tr>
                                            <td><?php echo $rows['id'];?> </td>
                                            <td><?php echo $rows['f_name'];?></td>
                                            <td><?php echo $rows['l_name'];?></td>
                                            <td><?php echo $rows['email'];?></td>
                                            <td><?php echo $rows['contact_number'];?></td>
                                            <td><?php echo $rows['gender'];?></td>
                                            <td><input class="doctor_view_data" type="button" name="View" value="View" id="<?php echo $rows['id'];?> "></td>
                                            <td><input class="doctor_edit_data" type="button" name="View" value="Edit" id="<?php echo $rows['id'];?> "></td>
                                            
                                        </tr> 
                                        <?php
        

                                    }
                                }
                        ?> 
                       
                    </tbody>
                    

                </table>
            </div>


            <div id="dataModal" class="modal fade">  
                <div class="modal-dialog">  
                    <div class="modal-content">  
                        <div class="modal-header">  
                                <h4 class="modal-title">Doctor Details</h4>  
                        </div>  
                        <div class="modal-body" id="employee_detail">  
                            
                        </div>  
                        <div class="modal-footer">  
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                        </div>  
                    </div>  
                </div>  
            </div>





            <div id="add_data_Modal" class="modal fade">  
                <div class="modal-dialog">  
                    <div class="modal-content">  

                        <div class="modal-header"> 
                            <h4 class="modal-title">Update Doctor Details</h4>  
                        </div>  

                        <div class="modal-body"> 

                            <form method="post" id="update_form">  
                                <label>Enter First Name</label>  
                                <input type="text" name="f_name" id="f_name" class="form-control" />  
                                <br />  
                                <label>Enter Last Name</label>  
                                <input type="text" name="l_name" id="l_name" class="form-control" />  
                                <br />
                                <label>Enter Email</label>  
                                <input type="text" name="email" id="email" class="form-control" />  
                                <br />  
                                <label>Enter Contact Number</label>  
                                <input type="text" name="contact_number" id="contact_number" class="form-control" />  
                                <br />
                                <label>Select Gender</label>  
                                <select name="gender" id="gender" class="form-control">  
                                    <option value="Male">Male</option>  
                                    <option value="Female">Female</option>  
                                    <option value="Female">Rather not say</option>
                                </select>  
                                <br />    
                                <input type="hidden" name="doctor_id" id="doctor_id" />  
                                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                            </form>  
                            </div>  
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                            </div>  
                    </div>  
                </div>  
            </div> 
            <!--End of Doctor Details-->
            


            <!--Start of Tickets-->
            <div>
                
            </div>            
            <!--End of Tickets--->





            <!--Start of settings-->
            <div>
                
            </div>
            <!--End of Settings--> 

        </div>
    </div>











    
    <script type="text/javascript">


        $("#show-doctor-details").hide();
        $("#show-patient-details").hide();
        $("#show-statistics").show();
    </script>
    

</body>
</html>