<!DOCTYPE html>
<html>
<head>
    <title>DropDown</title>
<script>
      var state_arr = new Array("Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar" ,"Chhattisgarh", "Goa", "Gujarat", 
                                "Haryana", "Himachal Pradesh", "Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra",
				                "Manipur","Meghalaya","Mizoram","Nagaland","Odisha","Punjab","Rajasthan","Sikkim","Tamil Nadu",
				                "Telangana","Tripura","Uttarakhand","Uttar Pradesh","West Bengal"
								);
				   
     function print_state(state_id) {
	          var option_str = document.getElementById(state_id);
	          option_str.length=0;
	          option_str.options[0] = new Option('--Select State--','');
	          option_str.selectedIndex = 0;
	            for (var i=0; i<state_arr.length; i++) {
		              option_str.options[option_str.length] = new Option(state_arr[i],state_arr[i]);
	            }
     }
	 setTimeout(function() {  
      $('#Err').hide(); 
 }, 3000);
</script>
<script>
function myFunction() {
document.getElementById('name').value = '';
document.getElementById('phno').value = '';
document.getElementById('timeLine').value = '';
document.getElementById('ex').value = '';
document.getElementById('sts').value = '';
}
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
<body >
<?php
require('dropdowndatabase.php');
global $msg;
global $Err;
?>
<div class="col-xs-10">
<div class="col-sm-2"></div>
<div class="col-sm-4">
<div id="Err"> 
   <p><span class="message"><?php echo $msg;?></span></p>
   <p><span class="error"><?php echo $Err;?></span></p>
</div>
</div>
</div>
<form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" align="left" >
<div class="col-xs-10">
    <div class="col-sm-2"></div>
    <div class="col-sm-4">
       <strong>Products:</strong><br><br>
           <select id="product" name="products" onclick="myFunction();">
               <option value="">--select--</option>
               <option   name="product1" value="product1">product1</option>
               <option name="product2"value="product2">product2</option>
               <option name="product3"value="product3">product3</option>        
           </select><br/><br/>
     </div>
</div>
<div  id="namePhnoTimeline">
 <div class="col-xs-10">
<p><div class="col-sm-2">Name:<span class="error">* </span ></div>
<div class="col-sm-4">
<input type="text" id="name"  name="name"  placeholder="Name" autocomplete="off"/>
</div><br>
<div  class="col-sm-6">
<span id="nameErr" class="error">*</span>
</div></p>
</div>
<div class="col-xs-10">
</div>
<div class="col-xs-10">
<p><div class="col-sm-2">Phone Number:<span class="error">* </span></div>
<div class="col-sm-4">
<input type="text" id="phno" name="phno"  placeholder="Phone Number" autocomplete="off" />
</div><br>
<div  class="col-sm-6">
<span id="phnoErr" class="error"> </span>
</div></p>
</div>
<div class="col-xs-10">
</div>
<div class="col-xs-10">
<p><div class="col-sm-2">timeline-of-purchase:</div>
<div class="col-sm-4">
<select id="timeLine" name="timeline_of_purchase" type="select">
<option value="">--select-time-line-of-purchase--</option>
 <option  value="With-in-a-day">with-in-a-day</option>
<option value="With-in-a-weak">with-in-a-weak</option>
<option value="With-in-a-month">with-in-a-month</option>
</select>
</div></p>
</div><br><br><br>
</div>
<div  id="excode">
    <div class="col-xs-10">
        <div class="col-sm-2"></div>
        <div class="col-sm-4"></div>
    </div>
    <div class="col-xs-10">
        <p><div class="col-sm-2">external-code:<span class="error">* </span required></div>
        <div class="col-sm-4">
            <input id="ex" type="text" name="externalcode" placeholder="External Code" autocomplete="off"> 
        </div><br>
		<div  class="col-sm-6">
   <span id="excodeErr" class="error"> </span>
</div></p>
    </div>
</div>
<div  id="state">
    <div class="col-xs-10">
        <div class="col-sm-2"></div>
        <div class="col-sm-4"></div>
    </div>
    <div class="col-xs-10">
       <p> <div class="col-sm-2">states:<span class="error">* </span ></div>
        <div class="col-sm-4">
            <select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" type="select" value="stt" > </select>
            <script language="javascript">print_state("sts");</script>					  
        </div><br>
			<div  class="col-sm-6">
   <span id="stateErr" class="error"> </span>
</div></p>
    </div>
</div>
<div id="submit">
	<div class="col-xs-10">
	    <div class="col-sm-2"></div>
	    <div class="col-sm-4"></div>
    </div>
	<div class="col-xs-10">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
             <input type="submit" value="submit" class="btn-primary" name="submit"id="btn" >
        </div>
	</div>
</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="dropdown.js" ></script>
</body>
</html> 