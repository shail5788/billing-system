<?php
      error_reporting(0);
      session_start();
          if(!isset($_SESSION['user']))
         {
          header('Location:login.php');

         }

          if(!empty($_SESSION['message']))
          {
                 $message=$_SESSION['message'];
                 unset($_SESSION['message']);
          }  

        include_once("db/connect.php");
        include_once('resource/api_function.php');
        
        $db=new database($con);   //object of query builder
        
        $api= new apiFunction($db,$con); // object apiFunction class

        $data=$api->gettingDataforApproval('temp_table',5);  
      

?> 
<?php include "include/header.php"; ?>
<?php include("navbar/super-adminheader.php");?>
<style type="text/css">
  .hiddenRow {
    padding: 0 !important;

}
.table-condensed>tbody>tr>td
  {
      padding: 8px;
  }
.table-hover1:hover {
  background: #F9600A;

}
</style>
<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src="js/approving.js"></script>
<script type="text/javascript" src="js/notification.js"></script>

<script type="text/javascript" >
$(document).ready(function(){
   
      $('.accordian-body').on('show.bs.collapse', function () {
          $(this).closest("table")
              .find(".collapse.in")
              .not(this)
              .collapse('toggle')
      })
  });
</script>
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <section class="content-header">
      <h1>
        Dashboard
        <small>Email Notification </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Admin Tool</li>
        <li class="active">Email Notification</li>
      </ol>
    </section>
  <div class="clr-20"></div>
  <div class="clr-20"></div>
  <div class="clr-20"></div>
<section>
<div class="row">
 <div class="col-md-12">
     <div class="col-md-3">
        <input type="text" class="form-control" id="customer_id" placeholder="Customer Id">
     </div>
     <div class="col-md-3">
        <input type="text" class="form-control" id="meter_id" placeholder="Meter Id">
     </div>
 </div>
<div class="clr-20"></div>
  <div class="col-md-12 searchResult" style="display: none;">
      <h3>Shailendra verma </h3>   
 </div>
 <div class="col-md-12" id="approvalResult">
  <table class="table table-condensed " style="border-collapse:collapse;
  background: white; width: 100%; ">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Operation</th>
            <th>Reject</th>
            
        </tr>
    </thead>
    <tbody>
    <?php  $i=0;
       foreach ($data as $key => $value):  $i++ ;?>
       
       
      
    
    
        <tr  class="accordion-toggle table-hover1" >
            <td><?php echo $value['customer_id'] ?></td>

            <td><?php echo $value['customer_fullname'] ?></td>
            
            <td data-toggle='collapse' data-target='#demo<?php echo $i; ?>' class='seen'>
              
              <a href="#" id='seeData' class="<?php echo $value['customer_id'] ?>" Ide="<?php echo $value['customer_id'] ?>" Ide1="<?php echo $value['id'] ?>"><span class="glyphicon glyphicon-eye-open" style="margin-top: 10px;"></span> See </a>|

                 <a href="#" id="approve1" class="<?php echo $value['customer_id'] ?>" Ide="<?php echo $value['customer_id'] ?>" Ide1="<?php echo $value['id'] ?>"><span class="glyphicon glyphicon-ok" style="margin-top: 10px;"></span>Approve</a>
            
            </td>
            <td class="text-success"><span class="glyphicon glyphicon-remove-sign"></span> <a href="#" class="<?php echo $value['customer_id'] ?>" Ide="<?php echo $value['customer_id'] ?>" id="reject">Reject</a></td>
            
        </tr>
        
        <tr >
            <td colspan="6" class="hiddenRow">
                <div class='col-md-10 col-md-offset-2 accordian-body collapse result' id='demo<?php echo $i; ?>' style='margin-left: 100px;'> 
              

                </div> 
             </td>
        </tr>


   <?php endforeach ?>     
        
    </tbody>
</table>
</div></div>
</section>
    <!-- /.content -->
</div>
   <?php include "include/footer.php"; ?>
