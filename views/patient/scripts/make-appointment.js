$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});

function disable_if_me(){
	document.getElementById("for_patient_fname").disabled = true;
	document.getElementById("for_patient_lname").disabled = true;
	document.getElementById("for_patient_age").disabled = true;
	document.getElementById("for_patient_gender").disabled = true;
	document.getElementById("for_patient_blood_type").disabled = true;
	document.getElementById("for_patient_number").disabled = true;
}
function enable_if_other(){
	document.getElementById("for_patient_fname").disabled = false;
	document.getElementById("for_patient_lname").disabled = false;
	document.getElementById("for_patient_age").disabled = false;
	document.getElementById("for_patient_gender").disabled = false;
	document.getElementById("for_patient_blood_type").disabled = false;
	document.getElementById("for_patient_number").disabled = false;
}