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
   }

 $customer_id=$_SESSION['customer_id'];
?>
 

 <?php include_once('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
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
        <small>Document Management </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Connection</li>
        <li class="active">Document Management</li>
      </ol>
    </section>

    <div class="clr-20"></div>
  <section>
  
    <div class="row">
      <div class="col-md-12">
      <div class="alert alert-success width float-left" id="update" role="alert" data-toggle="modal">
          <span><?php echo $message;?></span>
          <span class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></span>
            
          </div></div>
          <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
          <script type="text/javascript">
        $(document).ready(function(){
          //$("#update").hide();
          var msg="<?php echo $message; ?>";
           if(msg=="")
           {
             $("#update").hide(); 
           }
           else
           {
              $("#update").show();
           }
              
              $(".close").click(function(){
              $("#update").hide();
          });
        });
          </script>
           
        <div class="clr-20"></div>
        <div class="clr-20"></div>
        <div class="col-md-12">
          <form method="post" action="document_upload_processing.php" enctype="multipart/form-data" id="upload_file">
          <div class="col-md-4">
          <input type="hidden" id="customer_id" name="customer_id" value="<?php echo $customer_id ?>">
            <label>Upload Photograph</label>
            <input type="file" name="picture[]" id="picture" class="form-control" placeholder="Upload Photograph" required="required">
         </div>
         <div class="col-sm-4">
            <label>Upload Id Proof</label>
             <input type="file" name="picture[]" class="form-control" placeholder="Upload Id Proof" required="required">
          </div>
          <div class="col-sm-4">
              <label>Upload Address Proof</label>
             <input type="file" name="picture[]" class="form-control" placeholder="Upload Address Proof" required="required">
          </div>
        <div class="clr-20"></div>
        <div class="col-md-12">
        <div id="gallery"></div>
          <button type="submit" class="col-md-12 btn btn-warning" name='submit' >Upload Document <span class="glyphicon glyphicon-upload"></span></button>
        </div>
       <div class="clr-20"></div>
      </form>
    </div>

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
