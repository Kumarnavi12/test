$(document).ready(function(){
	$("#namePhnoTimeline").hide();
	$("#submit").hide();
	$("#excode").hide();
	$("#state").hide();
	
$("#product").change(function(){
if($('#product').find(":selected").val()==='product1'){
		   $("#namePhnoTimeline").show();
		   $("#submit").show();
		   $("#excode").hide();
		   $("#state").hide();
		   $("#nameErr").hide();
		   $("#phnoErr").hide();
}  else if($('#product').find(":selected").val()==='product2'){
		   $("#namePhnoTimeline").show();
		   $("#submit").show();
		   $("#excode").show();
		   $("#state").hide();
		   $("#nameErr").hide();
		   $("#phnoErr").hide();
		   $("#excodeErr").hide();
} else if ($('#product').find(":selected").val()==='product3') {
		   $("#namePhnoTimeline").show();
		   $("#submit").show();
		   $("#excode").hide();
		   $("#state").show();
		   $("#nameErr").hide();
		   $("#phnoErr").hide();
           $("#stateErr").hide();		         		 
}
});
		    var error_name=true;
            var error_phno=true;
		    var error_externalcode=true;
		  
		  function check_name(){
             var names=$("#name").val();
		     if (names.length=='') {
			     $("#nameErr").show();
			     $("#nameErr").html('Name is required!!');
			     $("#nameErr").focus();
			     error_name=false;
			     return false;
		    } else {
			     $("#nameErr").hide();
		    }
		    var regex = /^[a-zA-Z ]*$/;
            if (!regex.test(names)) {
                 $("#nameErr").show();
			     $("#nameErr").html('it allow only alphabets and white spaces!!');
			     $("#nameErr").focus();
			     error_name=false;
			     return false;
            } else {
                 $("#nameErr").hide();
        }
         }
		 
		 function check_phno(){
	       var phnos=$("#phno").val();
          if (phnos.length=='') {
			 $("#phnoErr").show();
			 $("#phnoErr").html('Phone number is required!!');
			 $("#phnoErr").focus();
			 error_phno=false;
			 return false;
		  } else {
			  $("#phnoErr").hide();
		  }
            if (phnos.length!=10) {
			 $("#phnoErr").show();
			 $("#phnoErr").html('It allows only 10 numbers!!');
			 $("#Errs").focus();
			 $("#phno").css("border-color","red");
			 error_phno=false;
			 return false;
		  } else {
			  $("#phnoErr").hide();
			  $("#phno").css("border-color","");
		  }		  
		       var regex1 = /^[6789][0-9]{9}/;
          if (!regex1.test(phnos)) {
			 $("#phnoErr").show();
			 $("#phnoErr").html('invalide number!!');
			 $("#phnoErr").focus();
			 error_phno=false;
			 return false;
		  } else {
			  $("#phnoErr").hide();
		  }
         }
		  function check_externalcode(){
	       var externalcode=$("#ex").val();
          if (externalcode.length=='') {
			 $("#excodeErr").show();
			 $("#excodeErr").html('Externalcode is required!!');
			 $("#excodeErr").focus();
			 error_externalcode=false;
			 return false;
		  } else {
			  $("#excodeErr").hide();
		  }	
		    var regex2 = /^[a-zA-Z0-9]+$/;
          if (!regex2.test(externalcode)) {
			 $("#excodeErr").show();
			 $("#excodeErr").html('invalide externalcode!!');
			 $("#excodeErr").focus();
			 error_externalcode=false;
			 return false;
		  } else {
			  $("#excodeErr").hide();
		  }
         }
		 
		 function check_state () {
		var states=$("#sts").val();
		if (states.length=='') {
			 $("#stateErr").show();
			 $("#stateErr").html('State is required!!');
			 $("#stateErr").focus();
			 error_state=false;
			 return false;
		  } else {
			  $("#stateErr").hide();
		  }
 
		 }
		 
		 $("#btn").click(function (){
			    error_name=true;
                error_phno=true;
				error_externalcode=true;
				error_state=true;
				
				check_name();
				check_phno();
			if($('#product').find(":selected").val()==='product2'){
				check_externalcode();
			}
			if($('#product').find(":selected").val()==='product3'){
				check_state();
			}
			 if((error_name==true) && (error_phno==true) && (error_externalcode==true) && (error_state==true)) {
				 return true;
			 } else {
				 return false;
			 } 
		 });	
});