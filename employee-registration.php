<?php
    error_reporting(0);
    session_start();
   if(!isset($_SESSION['user']))
         {
          header('Location:login.php');
         }
?>
<?php 

        if(!empty($_SESSION['message'])) {
   $message = $_SESSION['message'];
  unset($_SESSION['message']);
}


   include("db/connect.php");
    // $str="select DISTINCT area from area";
    // $row=$con->query($str);

?>
<?php include "include/header.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php
       include('navbar/super-adminheader.php');
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Employee Registration </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Admin Tool</li>
        <li class="active">User Management</li>
      </ol>
    </section>
<div class="clr-20"></div>
  <section>
    <div class="row">
      <form method="post" action="employee_registration_process.php" enctype="multipart/form-data">
     <div class="alert alert-success width float-left" id="update" role="alert" data-toggle="modal">
          <span><?php echo $message;?></span>
          <span class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></span>
            
          </div>
          <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
          <script type="text/javascript">
        $(document).ready(function(){
          //$("#update").hide();
          var msg="<?php echo $message; ?>";
           if(msg=="")
           {
           $("#update").hide(); 
           }
           else{
            $("#update").show();}

    $(".close").click(function(){
        $("#update").hide();
    });
    });
          </script>
        <div class="col-md-12" style="margin-bottom:10px;">
           
            <div class="col-sm-4">
            <input type="text" name="ename" class="form-control" placeholder="Please enter Servier Name *">
            </div>
            <div class="col-sm-4">
           <div class='input-group date' id='datetimepicker5'>
                    <input type='text'  name='dob' class="form-control" placeholder="Enter DOB"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            
               <script type="text/javascript">
            $(function () {
                $('#datetimepicker5').datepicker({
                    
                    
                });
            });
        </script>

            <div class="col-sm-4">
            <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name='doj' class="form-control" placeholder="Date of Join"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <script>
           $(function () {
                $('#datetimepicker1').datepicker({
                    
                    
                });
            });
            </script>
        </div> 
<div class="clr-20"></div>
<div class="col-md-12" style="margin-bottom:10px;">
            
            <div class="col-sm-3">
              <select name="gender" class="form-control">
                 <option value="">Select Gender</option>
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
              </select>
            </div>
            <div class="col-sm-3">
            <input type="text" name="address1" class="form-control" placeholder="Please Enter Adress Line-1">
            </div>
            <div class="col-sm-3">
            <input type="text" name="address2" class="form-control" placeholder="Please Enter Adress Line-2">
            </div>
            <div class="col-sm-3">
            <input type="text" name="city" class="form-control" placeholder="Please Enter City" required data-error="Last Name is required.">
            </div>
      </div>
<div class="clr-20"></div>
<div class="col-md-12" style="margin-bottom:10px;">
            <div class="col-sm-3">
            <input type="text" name="state" class="form-control" placeholder="Please Enter State *" required data-error="Last Name is required.">
            </div>
            <div class="col-sm-3">
            <input type="text" name="pin" class="form-control" placeholder="Please Pin No.">
            </div>
            <div class="col-sm-3">
            <input type="text" name="contact_no" class="form-control" placeholder="Please Contact No.">
            </div>
            <div class="col-sm-3">
            <input type="text" name="email" id="email" class="form-control" placeholder="Email Address .">
            </div>

           
            
            
        </div>
<div class="clr-20"></div>
<div class="col-md-12" style="margin-bottom:10px;">
<div class="col-sm-3">
           <select class="form-control" id="sel1" name="emptype" required data-error="Select ID Proof">
                  <option value="0"> Type of Employee</option>
                  <option value="2">Admin</option>
                  <option value="3">Employee</option>
                  <option value="5" >Service Men</option>
                  <option value="6">Meter Reader</option>
                  

              </select>
            </div>
<div class="col-sm-3">
        <script type="text/javascript">
        $(document).ready(function(){
          
               $("#sel1").change(function(){

                  var etype=$("#sel1").val();
                 
                  if(etype=="5")
                  {
                     $("#area").removeAttr("disabled");
                  }
                  else{
                    $("#area").prop('disabled', 'disabled');
                  } 

                  if(etype=="6")
                  {
                  	$("#mtype").removeAttr("disabled");
                    $("#device").show();
                    $("#device1").show();
                  }
                  else{
                  	$("#mtype").prop('disabled', 'disabled');
                    $("#device").hide();
                    $("#device1").hide();
                  }
          });

        });
          

        </script>
          <!--  chaubeytk@gmail.com 9506523550 <input type="text" name="area" class="form-control" placeholder="Please Enter Assign Area Pin ">-->
          <input type="text" name="area" id="area" class="form-control" placeholder="Zone" disabled>
          
            </div>
            <div class="col-md-3">
            	 <select id='mtype' name="mtype" class="form-control" disabled>
            	 	<option value="0">Select Meter Reader Type</option>
            	 	<option value="Domestic">Domestic</option>
            	 	<option value="Comercial">Comercial</option>
            	    <option value="Industry Type">Industry Type</option>
                  <option value="Non-Comercial">Others</option>
                  
            	 </select>

            </div>
            <div class="col-sm-3">
            <span>Image Upload</span>
            <input type="file" name="picture" class="" placeholder="Upload Photo" required="required" >
            </div>
            </div>
            <div class="clr-20"></div>
         <div class="col-md-12" id="device" style="display: none;">
            <div class="col-md-2">
               <input type="text" name="device_type1" id="device_type" class="form-control" placeholder="Enter Device Type">
            </div>  
             <div class="col-md-2">
               <input type="text" name="device_brand1" id="device_brand" class="form-control" placeholder="Enter Device Brand">
            </div>  
             <div class="col-md-2">
               <input type="text" name="sr_no1" id="sr_no" class="form-control" placeholder="Enter Device Serial No">
            </div> 
            <div class="col-md-2">
               <input type="text" name="device_type2" id="device_type1" class="form-control" placeholder="Enter Device Type">
            </div>  
             <div class="col-md-2">
               <input type="text" name="device_brand2" id="device_brand1" class="form-control" placeholder="Enter Device Brand">
            </div>  
             <div class="col-md-2">
               <input type="text" name="sr_no2" id="sr_no1" class="form-control" placeholder="Enter Device Serial No">
            </div>

         </div>
         <div class="clr-20"></div>
         <div class="col-md-12" id="device1" style="display: none;">
           <div class="col-md-2">
               <input type="text" name="device_type3" id="device_type2" class="form-control" placeholder="Enter Device Type">
            </div>  
             <div class="col-md-2">
               <input type="text" name="device_brand3" id="device_brand2" class="form-control" placeholder="Enter Device Brand">
            </div>  
             <div class="col-md-2">
               <input type="text" name="sr_no3" id="sr_no2" class="form-control" placeholder="Enter Device Serial No">
            </div> 
            <div class="col-md-2">
               <input type="text" name="device_type4" id="device_type3" class="form-control" placeholder="Enter Device Type">
            </div>  
             <div class="col-md-2">
               <input type="text" name="device_brand4" id="device_brand3" class="form-control" placeholder="Enter Device Brand">
            </div>  
             <div class="col-md-2">
               <input type="text" name="sr_no4" id="sr_no3" class="form-control" placeholder="Enter Device Serial No">
            </div>

         </div>
         <div class="clr-20"></div>
        <div class="col-md-12" style="margin-bottom:10px;">

          <button type="submit" class="col-md-12 btn btn-warning" name="submit" >Register Employee <span class="glyphicon glyphicon-send"></span></button>
        </div>
      </form>
    </div>

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
