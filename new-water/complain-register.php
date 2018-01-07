<?php
    error_reporting(0);
    session_start();
   if(!isset($_SESSION['user']))
   {
          
          header('Location:login.php');
         
   }

  if(!empty($_SESSION['message'])) 
  {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
  }
?>

   <?php include_once('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Left side column. contains the logo and sidebar -->
  <?php 
          if($_SESSION['type']==1)
            include("navbar/super-adminheader.php");
          elseif($_SESSION['type']==2)
            include("navbar/admin-header.php");
          else if($_SESSION['type']==4)
            include("navbar/complainheader.php");
          
   ?>
  <style type="text/css">
  #names{
     position:absolute;
     z-index: 999;
     width: 628px;
     margin-left:0px;
  }
    .getName{
       background: #ECF0F1;
       list-style: none;
       padding: 0px; 
    }
    
   .getName li
    {
        
         padding: 5px;
         
         cursor: pointer;
         
         background: white;
    }
    .getName li:hover{
       
       background: #F9690E;
       
       color:white;
    }

  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Compain Register</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Complain Management</li>
        <li class="active">Complain Register</li>
      </ol>
    </section>
      <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
     
     <?php 
          
   include('db/connect.php');
   $customer_id=$_POST['customer_id'];
   $mobile=$_POST['Mobile'];
   if($customer_id!='')
   {
       
       $query1="Select * from customer where (customer_id='$customer_id' OR mobile='$mobile') AND isActive='1'";
       $row=$con->query($query1);
       $result=$row->fetch_assoc();
       if($row->num_rows==0)
       {
                echo "<script type='text/javascript'>alert('Customer is Deactivated ');</script>";
       }

   }
  
   

?>
<div class="clr-20"></div>
  <section>
    <div class="row">
      <form method="post" action="#">
      <div class="alert alert-success width float-left" id="update" role="alert" data-toggle="modal">
          <span><?php echo $message;?></span>
          <span class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></span>
            
          </div>
 <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
 <script type="text/javascript" src="js/auto-complete.js"></script>

          <script type="text/javascript">
        $(document).ready(function(){
          $("#update").hide();
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
        <div class="col-md-12">
         
          <div class="col-sm-6">
            <input type="text" name="customer_id" id='customer_id' class="form-control" placeholder="Please enter Customer Id *" >
            <div class="names" id="names" style="z-index:9999;"></div>
            </div>

          <div class="col-sm-4">
            <input type="text" name="Mobile" class="form-control" placeholder="Mobile No*">
            </div>
            <div class="col-sm-2">
            <button type="submit" class="col-md-12 btn btn-warning" name="submit">Find Customer <span class="glyphicon glyphicon-send"></span></button>
          </div>
           
        </div> </form>
        <div class="clr-20"></div>
        <form method="post" action ="complain_registering.php">
        <div class="col-md-12" style="margin-bottom:10px;">
           <input type="hidden" name="customer_id1" id="customer_id1" value="<?php echo $result['customer_id']?>">
            <div class="col-sm-4">
            <input type='text' name='name' id="name" class='form-control' placeholder='Name *' value='<?php echo $result['customer_fullname']; ?>'>
            </div>
            <div class="col-sm-4">
            <input type="text" name="address" id="address" class="form-control" placeholder="Address*" required data-error="address is required." value='<?php echo $result['address']; ?>'>
            </div>
            <div class="col-sm-4">
            <input type="text" name="location" id="location" class="form-control" placeholder="Location*" required data-error="address is required." value='<?php echo $result['location']; ?>'>
            </div>
           
            
            
            
        </div>

        <div class="col-md-12" style="margin-bottom:10px;">
           
            <div class="col-sm-4">
            <input type="text" name="city" id="city" class="form-control" placeholder="City*" value='<?php echo $result['city']; ?>'>
            </div>

              <div class="col-sm-4">
            <select class="form-control" id="sel1" name="complain_type" required="required" data-error="Select Your Gender" name="gen">
                  <option value="0">Type Of Problem </option>
                  <option value="meter" >Meter </option>
                  <option value="water">Water Supply</option>
                  <option value="Insufficient Head">Insufficient Head</option>
                  <option value="Contamination">Contamination</option>
                  <option value="water leakage">Water leakage</option>
              </select>
          </div>
            <div class="col-sm-4">
            <input type="text" name="discript" class="form-control" placeholder="Discription Of the problem *" required data-error="Last Name is required.">
            </div>
           
        </div>

        <div class="col-md-12" style="margin-bottom:10px;">

        <div class="col-sm-3">
            <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact No*" required data-error="address is required." value='<?php echo $result['mobile']; ?>'>
            </div>
             <div class="col-sm-3">
               <div class="form-group">
                <div class='input-group date' id='datetimepicker1' name='date1'>
                    <input type='text' name="date2" class="form-control" placeholder="Date of Register"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
              <script>
           $(function () {
                var date = new Date();
                date.setDate(date.getDate()-1);

                $('#datetimepicker1').datepicker({
                 
                   startDate: date  
                });
            });
            </script>
            </div>
            <div class="col-sm-3">
            <input type="text" name="pin" id="pin" class="form-control" placeholder="Pin No*" required data-error="address is required." value='<?php echo $result['pin']; ?>'>
            </div>
            <div class="col-md-3">
              
              <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No" required />
            </div>
            </div>

        <div class="col-md-12" style="margin-bottom:10px;">
          <div class="col-md-12">
          <button type="submit" class="col-md-12 btn btn-warning" name="submit" >Register Complain <span class="glyphicon glyphicon-send"></span></button>
          </div>
        </div>
      </form>
 

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
