<?php
error_reporting(0);
session_start();
   if(!isset($_SESSION['user']))
   {
          header('Location:login.php');
   }

  

          $customer_id=$_SESSION['customer_id'];
       	  include_once("db/connect.php");
          include_once('resource/api_function.php');
          $customer_id=$_SESSION['customer_id'];

          $db=new database($con);   //object of query builder
          $api= new apiFunction($db,$con); // object apiFunction class
          $data=$api->getCustomerInfo($customer_id);
          $doc=$api->getPhoto($customer_id);
          $photo=$doc[0]['doc_path'];


?>
 

 <?php include_once('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
 <?php
     if($_SESSION['type']==1)
        include('navbar/super-adminheader.php');
     else if($_SESSION['type']==2)
        include('navbar/admin-header.php');
 ?>
 <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    </script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard<small>Consumer Detail For Printing </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Connection</li>
        <li class="active">New-Connection-Application-copy </li>
      </ol>
    </section>
	<div class="clr-20"></div>
	<div class="clr-20"></div>
	<div class="clr-20"></div>
	<div class="clr-20"></div>
	<div class="clr-20"></div>
	<div class="clr-20"></div>
	<div class="clr-20"></div>
	<div class="clr-20"></div>
  <section>
   <div class="row">
   
   	<div class="col-md-12 table-responsive" id="Printing">
       
   		 <table class="table table-bordered" style="background: white;width:80%;margin: auto;"> 
           <tr>
           	 <td colspan="6">
             <center> <img src="img/logo/kuidc.png" class="img-responsive"></center><br><br>
           	 	<h3 style="text-align: center;"> KUIDFC & TOWN MUNICIPAL COUNCIL<br>
           	 	<span>Magadi</span></h3><br>
           	 </td>
           </tr>
   		   <tr>
   		   	    <th width="190">Connection No </th>
   		   	    <td width="230"><?php echo $data[0]['customer_id'];?></td>
   		   	    <th width="200">Consumer Name</th>
   		   	    <td width="200"><?php echo $data[0]['customer_fullname'];?></td>
   		   	    <td rowspan="3" colspan="2" width="100">
   		   	    	<img src="<?php echo $photo ?>" width="100" height="120" class='img-responsive' style="margin: auto;">
   		   	    </td>

   		   </tr>
   		    <tr>
   		   	   <th>Father's/Husband Name</th><td><?php echo $data[0]['r_name']; ?></td>
   		   	    <th>No Of Family</th><td><?php echo $data[0]['no_of_family_m']; ?></td>
              
   		   </tr>
   		   <tr>
   		   	    <th>Gender</th><td><?php echo $data[0]['gender']; ?></td>
   		   	    <th>Adhar No</th><td><?php echo $data[0]['adhar_no']; ?></td>
                
   		   </tr>
   		   <tr>
   		   	    <th>Address</th><td><?php echo $data[0]['address']; ?></td>
   		   	    <th>Zone</th><td><?php echo $data[0]['area']; ?></td>
                <th width='100'>City</th><td width="100"><?php echo $data[0]['city']; ?></td>
   		   </tr>
   		   <tr>
   		   	    <th>State</th><td><?php echo $data[0]['state']; ?></td>
   		   	    <th>Land Line No</th><td><?php echo $data[0]['landline_no']; ?></td>
                <th width='100'>Mobile</th><td width="100"><?php echo $data[0]['mobile']; ?></td>
   		   </tr>
   		    <tr>
   		   	    <th>Pin</th><td><?php echo $data[0]['pin']; ?></td>
   		   	    <th>Issued Date</th><td><?php echo $data[0]['issue_date']; ?></td>
                <th width='100'>Meter No</th><td width="100"><?php echo $data[0]['meter_id']; ?></td>
   		   </tr>
           <tr>
   		   	    <th>Address Proof</th><td><?php echo $data[0]['addressproof']; ?></td>
   		   	    <th>ID Proof </th><td><?php echo $data[0]['idproof']; ?></td>
                <th width='100'>Year</th><td width="100"><?php echo $data[0]['year']; ?></td>
   		   </tr>
         <tr>
              <th>PID No</th><td><?php echo $data[0]['pid']; ?></td>
              <th>Ward</th><td><?php echo $data[0]['location']; ?></td>
              <th width='100'>Road</th><td width="100"><?php echo $data[0]['road']; ?></td>
         </tr>


   		  
   		 </table>
   	</div>
   	<div class="clr-20"></div>
   	 <div class="col-md-12">
   	    <div class="col-md-3 col-md-offset-4">
   	      <button class="btn btn-warning btn-block" onclick="printDiv('Printing')"> Click To Print 
   	      <span class="glyphicon glyphicon-print"></span></button>	
   	    </div>
   	 </div>
  </div>
   
  </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
