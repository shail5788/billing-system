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
        <li class="active"> Employee</li>
        <li class="active">  Amendments</li>
      </ol>
    </section>
  <?php
        include('db/connect.php');
      
        
           $emp_id=$_POST['emp_id'];
           $mobile=$_POST['mobile'];
           
           $qery="select * from employee where emp_id='$emp_id' OR contactNo='$mobile'";
           $row=$con->query($qery);
           $result=$row->fetch_assoc();
           
           // print_r($result);
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
         <div class="col-md-12">
         <div class="alert alert-success width float-left" id="update" role="alert" data-toggle="modal">
          <span><?php echo $message;?></span>
          <span class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></span>
          </div>
         </div>
      </div>
          <div class="col-md-12">
          <form method="post" action ="#">
            <div class="col-sm-4">
              <input type="text" name="emp_id" id="emp_id" class="form-control" placeholder="Employee Id *">
            </div>
            <div class="col-sm-4">
            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No ">
            </div>
            <div class="col-sm-2">
            <input type="text" name=Bill No" class="form-control" placeholder="Please Enter Bill No. *">
            </div>

           <div class="col-sm-2">
            <input type="submit" name="Find" class="col-md-12 btn btn-warning" value="Find">
            </div>
           </form>
           </div>
        
         <div class="clr-20"></div>
         <div class="clr-20"></div>
         <div class="clr-20"></div>
          
      <form method="post" action="employee-info-updating.php" name='Myform' id='Myform'>
        <div class="col-md-12" >
         
          <div class="col-sm-3">
            <input type="text" name="emp_id" class="form-control" value='<?php echo $result['emp_id'];?>' required data-error=" required.">
            </div>
            <div class="col-sm-3">
            <input type="text" name="emp_name" class="form-control" value='<?php echo $result['emp_name'];?>'>
            </div>
            <div class="col-sm-3">
            <input type="text" name="mobile" class="form-control" value='<?php echo $result['contactNo'];?>' placeholder=" Mobile No" >
            </div>
            <div class="col-sm-3">
            
              <input type="text" name="gender" class="form-control" value='<?php echo $result['gender'];?>' placeholder="gender *" required data-error="First Name is required.">
          </div>
        </div>
        <div class="clr-20"></div>
        
       
        
       
        <div class="col-md-12">
          <div class="col-md-3">
            <input type="text" name="address" class="form-control" value='<?php echo $result['address'];?>' placeholder="Enter Your Address line-1" required data-error="Enter Address is required.">
              
          </div>
           <div class="col-md-3">

            <input type="text" name="dob" class="form-control" placeholder="Date Of Birth" value="<?php echo $result['dob'] ?>">
              
          </div>
           <div class="col-sm-3">
           <input type="text" name="doj" id="doj" class="form-control" value='<?php echo $result['doj'];?>' placeholder="Enter Your Location" required data-error="Date Of Join ">
            </div>
            <div class="col-md-3">
              <input type="text" name="area" id="area" class="form-control" value='<?php echo $result['assign_area'];?>' placeholder="zone" required data-error="Zone">
            </div>
          
            
           
            
        </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
        
         <div class="col-md-3">
            <input type="text" name="city" class="form-control" value='<?php echo $result['city'];?>' placeholder="Enter Your City" required data-error="Enter City is required.">
              
          </div>

          <div class="col-sm-3">
           <input type="text" name="state" class="form-control" value='<?php echo $result['state'];?>' placeholder="Enter Your State" required data-error="Enter State is required.">
            </div>
          
            <div class="col-sm-3">
           <input type="text" name="pin" class="form-control" value='<?php echo $result['pin'];?>' placeholder="Enter Your Pin Code" required data-error="Enter Pin Code is required.">
            </div>
             <div class="col-sm-3">
               <input type="text" name="email" class="form-control" value='<?php echo $result['emailId'];?>' placeholder="Email Id " required >
            </div>
            
            
        </div>
       
        <div class="clr-20"></div>
         <div class="clr-20"></div>
        <div class="col-md-12">
          <div class="col-md-12">
          <button type="submit" class="col-md-12 btn btn-warning" name='update' >Update </button>
          </div>
        </div>
       
      </form>
    </div>

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
