$(document).ready(function(){
    $("#load-doctor-data").click(function(){                
        $("#show-doctor-details").show();
        $("#show-patient-details").hide();
        $("#show-statistics").hide();
    });

    $(document).on('click', '.doctor_edit_data', function(){  
        var doctor_id = $(this).attr("id");  
        $.ajax({  
            url:"views/admin/fetch-full-doctor-details.php",  
            method:"POST",  
            data:{doctor_id:doctor_id},  
            dataType:"json",  
            success:function(data){  
                $('#f_name').val(data.f_name); 
                $('#l_name').val(data.l_name);
                $('#email').val(data.email);
                $('#contact_number').val(data.contact_number);
                $('#gender').val(data.gender);    
                $('#doctor_id').val(data.doctor_id);  
                $('#insert').val("Update");  
                $('#add_data_Modal').modal('show');  
            }  
        });  
    });  
    $('#update_form').on("submit", function(event){  
        event.preventDefault();  
        if($('#f_name').val() == "")  
        {  
            alert("First name is required");  
        }  
        else if($('#l_name').val() == "")  
        {  
            alert("Last name is required");  
        }  
        else if($('#email').val() == '')  
        {  
            alert("Email is required");  
        }
        else if($('#contact_number').val() == '')  
        {  
            alert("Contact number is required");  
        }  
        else  
        {  
            $.ajax({  
                url:"views/admin/update-doctor-data.php",  
                method:"POST",  
                data:$('#update_form').serialize(),  
                beforeSend:function(){  
                    $('#insert').val("Inserting");  
                },  
                success:function(data){  
                    $('#insert_form')[0].reset();  
                    $('#add_data_Modal').modal('hide');  
                    $('#employee_table').html(data);  
                }  
            });  
        }  
    });


    $(document).on('click', '.doctor_view_data', function(){  
        var doctor_id = $(this).attr("id");  
        if(doctor_id != '')  
        {  
            $.ajax({  
                url:"views/admin/doctor-details.php",  
                method:"POST",  
                data:{doctor_id:doctor_id},  
                success:function(data){  
                    $('#employee_detail').html(data);  
                    $('#dataModal').modal('show');  
                }  
            });  
        }            
    });
});