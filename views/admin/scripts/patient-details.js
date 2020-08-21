$(document).ready(function(){
    $("#load-patient-data").click(function(){
        $("#show-patient-details").show();
        $("#show-doctor-details").hide();
        $("#show-statistics").hide();
    });

    

    $(document).on('click', '.patient_edit_data', function(){  
        var patient_id = $(this).attr("id");  
        $.ajax({  
            url:"views/admin/fetch-full-patient-details.php",  
            method:"POST",  
            data:{patient_id:patient_id},  
            dataType:"json",  
            success:function(data){  
                $('#f_name_patient').val(data.f_name); 
                $('#l_name_patient').val(data.l_name);
                $('#email_patient').val(data.email);
                $('#contact_number_patient').val(data.contact_number);
                $('#gender_patient').val(data.gender);    
                $('#doctor_id_patient').val(data.doctor_id);  
                $('#insert_patient').val("Update");  
                $('#add_data_Modal').modal('show');  
            }  
        });  
    });  
    $('#update_form').on("submit", function(event){  
        event.preventDefault();  
        if($('#f_name_patient').val() == "")  
        {  
            alert("First name is required");  
        }  
        else if($('#l_name_patient').val() == "")  
        {  
            alert("Last name is required");  
        }  
        else if($('#email_patient').val() == '')  
        {  
            alert("Email is required");  
        }
        else if($('#contact_number_patient').val() == '')  
        {  
            alert("Contact number is required");  
        }    
        else  
        {  
            $.ajax({  
                url:"views/admin/update-patient-data.php",  
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


    $(document).on('click', '.patient_view_data', function(){  
        var patient_id = $(this).attr("id");  
        if(patient_id != '')  
        {  
            $.ajax({  
                url:"views/admin/patient-details.php",  
                method:"POST",  
                data:{patient_id:patient_id},  
                success:function(data){  
                    $('#patient_detail_view').html(data);  
                    $('#patient_dataModal').modal('show');  
                }  
            });  
        }            
    });
});