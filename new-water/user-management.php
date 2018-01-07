<?php
    //error_reporting(0);

    session_start();
   if(!isset($_SESSION['user']))
         {
          header('Location:login.php');
         }
?>
<?php include "include/header.php"; ?>
 
 <?php
     if($_SESSION['type']==1)
     include('navbar/super-adminheader.php');
    ?>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Employee search </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Employee</li>
        <li class="active"> Employee Search</li>
      </ol>
    </section>
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
     <!-- @ js code for searching --> 
    <script type="text/javascript" src="js/user-management.js"></script> 

<div class="clr-20"></div>
  <section>
    <div class="row">
      <div class="col-md-12">
            <div class="col-sm-4">
            <input type="text" name="emp_id" id='emp_id' class="form-control" placeholder="Employee Id *">
            </div>
            <div class="col-sm-4">
            <input type="text" name="consumer_name" id='consumer_name' class="form-control" placeholder="Enter Employee Name ">
            </div>
            <div class="col-sm-4">
            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Please Enter mobile No. " required="required" data-error="Last Name is required.">
            </div>
           <div id='msag'></div>
        </div>
        <div class="clr-20"></div>
         <div class="clr-20"></div>

        <div class="col-md-12" id="result">
            
        </div>
        
    </div>


    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>

   <div class="modal fade" tabindex="-1" role="dialog" id="cunsumer_detail">
            <div class="modal-dialog" role="document" style="width: 70%;margin-top:80px; ">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title "> <span class='glyphicon glyphicon-edit'></span>
                        Employee Full Detail  </h4>
                     </div>
                      <div class="modal-body">
                        <div class="row data_content">
                          <div class="col-md-12  detail table-responsive"
                           style="margin:auto;">
                           <div class="col-md-8 col-md-offset-2 msg">
                                
                           </div>
                         </div>
                     </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary " id="modal-product-update">Save changes</button>
                   </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
