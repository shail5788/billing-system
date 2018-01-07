<?php
    error_reporting(0);
    session_start();
         if(!isset($_SESSION['user']))
         {
          
          header('Location:login.php');
         
         }
?>


<?php 
        include_once("db/connect.php");
        include_once('resource/api_function.php');

          $db=new database($con);   //object of query builder
          $api=new apiFunction($db,$con); // object apiFunction class


      $str="select DISTINCT pin from customer ";
      $row=$con->query($str);

        
      $employee="select emp_id,emp_name from employee where emp_type='4' ";
      $erow=$con->query($employee);



?>
  <?php include('include/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php
    include("navbar/super-adminheader.php");
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Location Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin Tool</li>
        <li class="active">Location Managent </li>
      </ol>
    </section>
<div class="clr-20"></div>
    <!-- Main content -->
     <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
     <script type="text/javascript" src="js/location_management.js"></script>
    <section class="content">
     
      <div class="row">
         
        <div class="container">
        <form>
        <div class="row" >
          <div class="col-md-2">
              <input type="text" name="area" id="area" placeholder="Add Zone" class="form-control">    
          </div>
          <div class="col-sm-4">
              <input type="text" name="locality" id="locality" placeholder="Add Ward" class="form-control">
          </div>
          <div class="col-sm-4">
            <input type="text" name="add_pin" id="add_pin" class="form-control" placeholder="Add Road">
          </div>
          <div class="col-md-2 col-md-offset-0">
              <button type="button" class="col-md-12 btn btn-warning" id="assign_area" name="submit">Add Location  </button>
          </div>
        </div>
        </form>
        <div class="clr-20"></div>
        <div class="clr-20"></div>
       
        <div class="col-md-12" id="reslt"></div>
        <div class="col-md-12 bg bg-white border-right border-bottom" id="locationData">


        </div>
 
       <div class="col-md-12" id="reslt"></div>
       
        <div class="clr-20"></div>
       
      </div>
     
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
<div class="modal fade" tabindex="-1" role="dialog" id="location_detail">
            <div class="modal-dialog" role="document" style="width: 35%;margin-top:340px;">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title "> <span class='glyphicon glyphicon-edit'></span>
                        Edit Location Detail </h4>
                     </div>
                      <div class="modal-body">
                        <div class="row locationData">
                          <div class="col-md-12  ldetail table-responsive"
                           style="margin:auto;" id="ldetail">
                           <table class="table table-responsive table-bordered ">
                              <tr>
                                <td><label>Zone</label><input type="text" name="zone" id="zone" class="form-control"></td>
                                <td><label>Ward</label><input type="text" name="ward" id="ward" class="form-control"></td>
                                <td><label>Road</label><input type="text" name="road" id="road" class="form-control"></td>
                                <input type="hidden" id="id">
                              </tr>  
                           </table>
                         </div>
                     </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-primary " id="changeLocaiton" >Update Location </button>
                </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
