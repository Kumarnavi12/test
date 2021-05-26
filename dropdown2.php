<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("#form1").hide();
	$("#form2").hide();
	$("#form3").hide();
	$("#form4").hide();
  $("#hide").click(function(){
     if($('#hide').find(":selected").val()==='product1'){
		   $("#form1").show();
		   $("#form2").show();
		   $("#form3").hide();
		   $("#form4").hide();
		   
	 } else if($('#hide').find(":selected").val()==='product2'){
		 $("#form1").show();
		   $("#form2").show();
		   $("#form3").show();
		   $("#form4").hide();
		 
	 } else if ($('#hide').find(":selected").val()==='product3') {
		$("#form1").show();
		 $("#form2").show();
		 $("#form3").hide();
		 $("#form4").show();
	 }
  });
});
</script>
</head>
<style>
  .error {
       color: #FF0000;
	   align-items:right;
  }
  .message {
       color: #800080;
  }

  .aa {
	   width:800px;
	   margin:30px auto;
	   font:cambria,"Hoefler Text","Liberation Serif",Times,"Times New Roman",Serif;
	   border-radius:10px;
	   border 2px solid #CCC;
	   padding:25px 25px 25px;
	   margin-top:35px;
	   align-items:center;
   } 

  input[type=text] {
	   width:99%;
	   padding:10px;
	   margin-top:8px;
	   border:1px solid #CCC;
	   padding-left:5px;
	   font-size:16px;
	   font-family:cambria,"Hoefler Text","Liberation Serif",Times,"Times New Roman",Serif;
  }
  inpt[type=submit] {
	    width:100%;
		background-color:#009
		color:2px solid #06F;
		padding:10px;
		font-size:20px;
		curser:pointer;
		border-radius:2px;
		margin-bottom:5px;
		align:center;
  }

  select[type=select] {
	    width:99%;
	    padding:10px;
	    margin-top:8px;
	    border:1px solid #CCC;
	    padding-left:5px;
	    font-size:16px;
	    font-family:cambria,"Hoefler Text","Liberation Serif",Times,"Times New Roman",Serif;
  }
  .pure-form input.ng-dirty.ng-invalid {
  border-color: #e9322d;
}
</style>
<body>
<div class="aa">
<select id="hide" >
<option value="">--select--</option>
<option value="product1">product1</option>
<option value="product2">product2</option>
<option value="product3">product3</option>
</select><br><br>
<form  method="post">
<div  id="form1">
<div class="col-xs-10">
<p><div class="col-sm-2">Name:<span class="error">* </span required></div>
<div class="col-sm-4">
<input type="text" id="name"  name="name"  placeholder="Name" />
</div>
<div  class="col-sm-6">
<span id="p1" class="error"> </span>
</div></p>
</div>
<div class="col-xs-10">
</div>
<div class="col-xs-10">
<p><div class="col-sm-2">Phone Number:<span class="error">* </span required></div>
<div class="col-sm-4">
<input type="text" id="phno" name="phno"  placeholder="Phone Number" />
</div>
<div  class="col-sm-6">
<span id="p2" class="error"> </span>
</div></p>
</div>
<div class="col-xs-10">
</div>
<div class="col-xs-10">
<p><div class="col-sm-2">timeline-of-purchase:</div>
<div class="col-sm-4">
<select id="ok" name="timeline_of_purchase" type="select">
<option value="">--select-time-line-of-purchase--</option>
 <option  value="With-in-a-day">with-in-a-day</option>
<option value="With-in-a-weak">with-in-a-weak</option>
<option value="With-in-a-month">with-in-a-month</option>
</select>
</div></p>
</div>
</div>
<div  id="form3">
 <p><div class="col-xs-10">
        <div class="col-sm-2">external-code:<span class="error">* </span required></div>
        <div class="col-sm-4">
            <input id="ex" type="text" name="externalcode" placeholder="External Code" class="form-control"> 
        </div>
		<div  class="col-sm-6">
   <span id="p3" class="error">*</span>
</div>
    </div></p><br>
</div>
<div  id="form4">
       <p><div class="col-xs-10">
        <div class="col-sm-2">states:<span class="error">* </span required></div>
        <div class="col-sm-4">
            <select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" type="select" value="stt"></select>
            <script language="javascript">print_state("sts");</script>					  
        </div>
			<div  class="col-sm-6">
   <span id="p4" class="error"> </span>
</div>
    </div></p><br>
</div>
<div id="form2">
<p><div class="col-xs-10">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
             <input type="submit" value="submit" class="btn-primary" name="submit" >
        </div>
	</div></p>
</div>
</form>
</div>
</body>
</html>
