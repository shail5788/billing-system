<?php
    error_reporting(0);

     session_start();
     if(!isset($_SESSION['user']))
     {
            header('Location:login.php');
     }
     $message=$_GET['msg'];
    
     



include_once 'include/header.php'; 
?>
   
 
 <?php
     if($_SESSION['type']==1)
      include('navbar/super-adminheader.php');
    else if($_SESSION['type']==2)
      include('navbar/admin-header.php');
      ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Amendments </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Connection</li>
        <li class="active">  Amendments</li>
      </ol>
    </section>
  <?php
        include('db/connect.php');
      
        
           $customer_id1=isset($_POST['customer-id'])?$_POST['customer-id']:1;
           $meter_id=isset($_POST['meter-id'])?$_POST['meter-id']:'1';
           // echo $meter_id; 
          
           $qery="select * from customer where customer_id='$customer_id1' OR meter_id='$meter_id'";
           $row=$con->query($qery);
           $result=$row->fetch_assoc();
           
?>
       
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

<div class="clr-20"></div>
  <section>

    <div class="row">
      <div class="col-md-12">
       <div class="alert alert-success width float-left" id="update" role="alert" data-toggle="modal">
          <span><?php echo $message;?></span>
          <span class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></span>
            
          </div>
         
      
            
          </div>
            <div class="col-sm-4">
              <form method="post" action "#">

            <input type="text" name="customer-id" id="customer-id" class="form-control" placeholder="Customer Id *">
            </div>
            <div class="col-sm-4">
            <input type="text" name="meter-id" class="form-control" placeholder="Please Enter Meter Id">
            </div>
            <div class="col-sm-2">
            <input type="text" name=Bill No" class="form-control" placeholder="Please Enter Bill No. *"  >
            </div>

           <div class="col-sm-2">
            <input type="submit" name="Find" class="col-md-12 btn btn-warning" value="Find">
            </div>
           </form>
        
        <div class="clr-20"></div>
      <form method="post" action="updating_process.php" name='Myform' id='Myform'>
        <div class="col-md-12" >
          <div class="col-md-1">
             
              <input type="text" name="fi" class="form-control" value='<?php echo $result['fi'];?>' required data-error="First Name is required.">
          </div>
          <div class="col-sm-3">
            <input type="text" name="fname" class="form-control" value='<?php echo $result['C_name'];?>' required data-error="First Name is required.">
            </div>
            <div class="col-sm-3">
            <input type="text" name="mname1" class="form-control" value='<?php echo $result['C_mid_name'];?>'>
            </div>
            <div class="col-sm-3">
            <input type="text" name="lname2" class="form-control" value='<?php echo $result['C_lname'];?>' placeholder="Please enter your Last Name *" required data-error="Last Name is required.">
            </div>
            <div class="col-sm-2">
            
              <input type="text" name="gen" class="form-control" value='<?php echo $result['gender'];?>' placeholder="gender *" required data-error="First Name is required.">
          </div>
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
          <div class="col-md-2">
         
              <input type="text" name="relation" class="form-control" value='<?php echo $result['relation_type'];?>' placeholder="relation *" required data-error="First Name is required.">
          </div>
          
            <div class="col-sm-6">
            <input type="text" name="rel_name" class="form-control" value='<?php echo $result['r_name'];?>' placeholder="Enter Name" required data-error="Enter number of faimly member is required.">
            </div>
            <div class="col-sm-4">
            <input type="text" name="no_of_family" class="form-control" value='<?php echo $result['no_of_family_m'];?>' placeholder="Family member" required data-error="Enter number of faimly member is required.">
            </div>
             
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
          <div class="col-md-4">
            <input type="text" name="adharNo" class="form-control" value='<?php echo $result['adhar_no'];?>' placeholder="Enter Adhar Card No." required data-error="Enter Adhar Card No. is required.">
              
          </div>
          
            <div class="col-sm-4">
            
              <input type="text" name="idProof" class="form-control" value='<?php echo $result['idproof'];?>' placeholder="EnterId Proof" required data-error="Enter Adhar Card No. is required.">
            </div>
            <div class="col-sm-4">
           <input type="text" name="addressProof" class="form-control"  value='<?php echo $result['addressproof'];?>' placeholder="Address proof" >
            </div>
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
        <div class="col-md-4">
            <input type="text" name="c_type" class="form-control" value='<?php echo $result['type_of_customer'];?>' placeholder="Customer type" >
           
          </div>
          <div class="col-md-4">
            <input type="text" name="customer_id" class="form-control" value='<?php echo $result['customer_id'];?>' placeholder="Customer id" >
              
          </div>
          
            
           <div class="col-md-4">
            <input type="text" name="meterA" class="form-control" value='<?php echo $result['meter_id'];?>' placeholder="Meter Id Allocator" required>
              
          </div>
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
          <div class="col-md-4">
            <input type="text" name="address" class="form-control" value='<?php echo $result['address'];?>' placeholder="Enter Your Address line-1" required data-error="Enter Address is required.">
              
          </div>
           <div class="col-md-4">
            <input type="text" name="mname" class="form-control" placeholder="Enter Your Address line-2" >
              
          </div>
           <div class="col-sm-4">
           <input type="text" name="pid" class="form-control" value='<?php echo $result['pid'];?>' placeholder="PID NO" required data-error="Enter Location is required.">
            </div>
          
            
           
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
        
         <div class="col-md-4">
            <input type="text" name="city" class="form-control" value='<?php echo $result['city'];?>' placeholder="Enter Your City" required data-error="Enter City is required.">
              
          </div>

          <div class="col-sm-4">
           <input type="text" name="state" class="form-control" value='<?php echo $result['state'];?>' placeholder="Enter Your State" required data-error="Enter State is required.">
            </div>
          
            <div class="col-sm-4">
           <input type="text" name="pin" class="form-control" value='<?php echo $result['pin'];?>' placeholder="Enter Your Pin Code" required data-error="Enter Pin Code is required.">
            </div>
           
            
        </div>
         <div class="clr-20"></div>
        <div class="col-md-12">
         <div class="col-sm-4">
           <input type="text" name="mname" class="form-control" placeholder="Enter Your State" >
            </div>
          <div class="col-sm-4">
           <input type="text" name="mobile" class="form-control" value='<?php echo $result['mobile'];?>' placeholder="Enter Your Mobile No." required data-error="Enter Mobile No. is required.">
            </div>
            <div class="col-sm-4">
           <input type="text" name="landline" class="form-control" value='<?php echo $result['landline_no'];?>' placeholder="Enter Your Landline No.">
            </div>
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
         <div class="col-sm-4">
           <input type="text" name="zone" class="form-control" placeholder="Zone" value='<?php echo $result['area']; ?>' >
            </div>
          <div class="col-sm-4">
           <input type="text" name="ward" class="form-control" value='<?php echo $result['location'];?>' placeholder="Enter Your Ward." >
            </div>
            <div class="col-sm-4">
           <input type="text" name="road" class="form-control" value='<?php echo $result['road'];?>' placeholder="Road.">
            </div>
            
        </div>

         <div class="clr-20"></div>
        <div class="col-md-12">

          <button type="submit" class="col-md-12 btn btn-warning" name='update' >Update </button>
        </div>
       
      </form>
    </div>

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
